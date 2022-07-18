<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Vote;
use DB;
use Illuminate\Support\Facades\URL;
//use App\Models\Region;

class IndexController extends Controller
{
    public function index()
    {

        $artists = User::where('role_id', 2)->where('is_approved', 1)->where('phase_id', 4)->take(10)->get();
        $sportstars = User::where('role_id', 3)->where('is_approved', 1)->where('phase_id', 4)->take(10)->get();
        // $regions = DB::table('regions')->select('name','id')->get();

        return view('vote', compact('artists', 'sportstars'));
    }

    public function vote($id)
    {
        $user = User::findOrFail($id);
        $regions = DB::table('regions')->select('name', 'id')->get();
        return view('voteartist', compact('user', 'regions'));
    }

    public function voteArtist(Request $request)
    {
        // Add Ip Address to the request before validation
        $request->merge(['ip_address' => $request->ip()]);

        // Validate request
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:votes',
                'ip_address' => 'required|string|unique:votes',
                'artist_id' => 'required|integer',
                'region_id' => 'required|integer',
            ],
            //Custom validation messages
            [
                'ip_address.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'email.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'id_number.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'artist_id.required' => 'Kindly select your favourite Artist first before submitting',
                'region_id.required' => 'Kindly select your region',
            ]
        );




        $vote = Vote::create($request->all());



        return back()->with('message', 'Thank You! Vote Submited Sucessfully');
    }

    public function votingArtists()
    {
        $artists =  User::where('role_id', 2)->where('is_approved', 1)->where('phase_id', 4)->take(10)->get();

        return view('voting.artists', compact('artists'));
    }
    public function votingSportstars()
    {
        $sportstars = User::where('role_id', 3)->where('is_approved', 1)->where('phase_id', 4)->take(10)->get();
        return view('voting.sportstars', compact('sportstars'));
    }

    public function checklist()
    {
        $activities = Activity::where('status', 1)->get();
        return view('attendance.checklist', compact('activities'));
    }
    public function show($id)
    {

        // $participants = User::where('activity_id', $id)->where('role_id','!=',1)->where('role_id','!=',4)->where('role_id','!=',5)->get();
        $participants = \DB::table('registration')->select('tableid', 'name', 'msisdn','participant_type','region', 'registration_no', 'datecreated')->get();

        $activityName = \DB::table('activities')->where('id', $id)->value('title');
        $activityID =   \DB::table('activities')->where('id', $id)->value('id');

        return view('attendance.show', compact('participants'), ['activityName' => $activityName, 'activityID' => $activityID]);
    }
    public function checkin(Request $request){
        DB::table('checkins')->updateOrInsert(
            ['user_id'     =>   $request->user_id],
            ['activity_id'   =>   $request->activity_id, 'code' => $request->code,],
        );
        DB::table('users')->insert([
            'name' => $request->name,
            'phone'=> $request->phone,
            'role_id' => $request->role_id,
            'activity_id' => $request->activity_id,
            'created_at' => \Carbon\Carbon::now(),
        ]);
        return back()->with('message', 'User Checked In Successfully.');
    }

    public function sendRegSMS(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:12'
        ]);
        //$regUrl = URL::to('/register');
        $regUrl = 'http://nexters.beer/register';
        $mobile = $request->phone;
        $message = "Thank you for comming to this event. Please use the link provided to register accordingly for this event:  $regUrl";

        $this->sendMessage($mobile, $message);

        return back()->with('message', 'Operation Done!');
    }
    public function sendMessage($mobile, $message)
    {
        try {
            $headers = [
                'Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql'
            ];

            $encodMessage = rawurlencode($message);

            $url = 'https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to=' . $mobile . '&from=EABL&sms=' . $encodMessage . '&response=json&unicode=0&bulkbalanceuser=voucher';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_ENCODING, "");
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true,);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

            $response = curl_exec($ch);
            $res = json_decode($response);
            date_default_timezone_set('Africa/Nairobi');
            $date = date('m/d/Y h:i:s a', time());
            // if($res)
            // {
            //     print_r( "This is test number:".$mobile.", ".$date." \r\n");
            // }
            curl_close($ch);
        } catch (\Exception $e) {

            return redirect()->back()->with('errors', 'Something Went Wrong. Please Check the Supplied Phone Number or Your Network Connectivity Status.');
        }
    }


    // Activate voting
    public function activateVoting($id){
        $outlet = Outlet::findOrFail($id);

        $outlet->status == 1? $outlet->update([
            'status' => 0,
        ]):$outlet->update([
            'status' => 1,
        ]);
        return back()->with('message','Operation Successfull.');
    }
}
