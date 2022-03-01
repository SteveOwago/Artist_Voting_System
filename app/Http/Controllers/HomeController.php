<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Approve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reason;
use App\Models\Vote;
use DB;
use Auth;
use App\Models\Disapprove;
use App\Models\Region;
use App\Utility\SendSMS;
use Illuminate\Validation\Rules\Password;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //Data for homepage dashboard statistics
        $activities = Activity::all()->sortByDesc('id');
        $authuser = User::where('id', \Auth::id())->get();
        $artists = User::where('role_id',2)->sortByDesc('id')->get();
        $sportstars = User::where('role_id',3)->sortByDesc('id')->get();
        $regions = Region::all();
        $finalistsArtists = User::where('role_id', '!=', 1)->where('is_approved', 1)->where('phase_id', 4)->get();
        $votes = Vote::all();
        $reasons = Reason::all();


        return view('home', compact('artists','sportstars', 'authuser', 'finalistsArtists', 'votes', 'reasons','activities','regions'));
    }
    public function artists()
    {
        $artists = User::where('role_id', 2)->sortByDesc('id')->get();
        $reasons = Reason::all();
        return view('artists', compact('artists', 'reasons'));
    }
    public function sportstars()
    {
        $sportstars = User::where('role_id', 3)->get();
        $reasons = Reason::all();
        return view('sportstars', compact('sportstars', 'reasons'));
    }
    public function judges()
    {
        $judges = User::where('role_id', 1)->get();
        return view('judges', compact('judges'));
    }

    public function create_judge()
    {

        return view('create_judge');
    }

    public function add_judge(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'integer', 'min:12', 'unique:users'],
            'password' => ['required', 'string', Password::min(8)->mixedCase()->symbols()->uncompromised(), 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 1,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('message', 'Judge Added Sucessfully');
    }

    public function profile($id)
    {

        $user = User::findOrFail($id);
        $reasons = Reason::all();

        return view('profile', compact('user', 'reasons'));
    }

    public function edit_profile($id)
    {

        $user = User::findOrFail($id);

        return view('edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255',
            'phone' => 'required|integer|min:12',
        ]);


        if($request->hasFile('profile')){
            $validated = $request->validate([
                'profile' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $profile = public_path('profile_pictures/').$user->profile;
            if($profile && $user->profile !== "default.png"){
                File::delete($profile);
            }

            $profile = time().'.'.$request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('profile_pictures'), $profile);

            $user->update(['profile'=>$profile,]);
        }



        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile', [$user->id])->with('message', 'Profile Updated Successfully');
    }

    // Approve Artist/Gamer
    public function approve($id)
    {

        $user = User::findOrFail($id);

        $is_approved = 1;
        if ($user->phase_id <= 4) {
            $level = $user->phase_id;
            $level += 1;
        }else{
            return back()->with('message','Participant is in the Final Stage');
        }

        $user->update([
            'is_approved' => $is_approved,
            'phase_id' => $level,
        ]);
        Approve::create([
            'approved_by' => Auth::id(),
            'artist_id' => $user->id,
        ]);



        $level_name = DB::table('phases')->where('id',$user->phase_id)->value('title');
        $mobile = $user->phone;
        $message = "Congratulations $user->name! You Have qualified for $level_name stage for Tusker Nexters Competition. Stay tuned for details on the next stage. Terms and conditions Apply. Helpline 0721985566.";

        $this->sendMessage($mobile,$message);


        return back()->with('message', 'Artist Approved Successfully');
    }

    // DisApprove Artist/Gamer
    public function disapprove(Request $request, $id)
    {

        $user = User::findOrFail($id);
        if($user->phase_id == 1){
            $is_approved = 0;
        }else{
            $is_approved = 1;
        }

        if ($user->phase_id > 1 ) {
            $level = $user->phase_id;
            $level -= 1;
        }else{
            $level = 1;
        }
        $user->update([
            'is_approved' => $is_approved,
            'phase_id' => $level,
        ]);
        $request->validate([
            'reason_id' => 'required',
        ]);
        Disapprove::create([
            'reason_id' => $request->reason_id,
            'reason' => $request->reason,
            'artist_id' => $id,
            'action_by' => Auth::id(),
        ]);
        // $level_name = DB::table('phases')->where('id',$user->phase_id)->value('title');
        // $mobile = $user->phone;
        // $message = "Hello, $user->name. We are sorry to announce that you have been disqualified for the competition. Thank You $user->name for participatinng in this activity. We wish you all the best in our next and future contests. Stay Tuned!";

        // $this->sendMessage($mobile,$message);

        return back()->with('message', 'Operation Successful');
    }
    public function delete_artist($id)
    {

        $user = User::findOrFail($id);
        //Check if artists has votes
        if ($user->votes()->count() > 0) {
            return back()->with('errors', 'Artist with cannot be deleted. Artist has Votes');
        }

        $user->delete();


        return back()->with('message', 'Operation Successful');
    }
    public function approvalDissaprovalLogs(){

        $approvals = DB::table('approves')->select('artist_id','approved_by','created_at')->orderBy('created_at','desc')->get();

        $disapprovals = DB::table('disapproves')->select('artist_id','action_by','created_at')->orderBy('created_at','desc')->get();

        // $logs = collect([$approvals,$dissaproves]);

        $logs =$disapprovals->merge($approvals)->sortBy('created_at');

        //dd($logs);

        return view('approvals_rejects_log',compact('logs'));
    }

    public function sendMessage($mobile, $message){
        try{
            $headers = [
                    'Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql'
                ];

            $encodMessage = rawurlencode($message);

                $url = 'https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to='.$mobile.'&from=EABL&sms='.$encodMessage.'&response=json&unicode=0&bulkbalanceuser=voucher';

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

            }catch (\Exception $e) {

            return redirect()->back()->with('errors','Something Went Wrong. Please Check the Supplied Phone Number or Your Network Connectivity Status.');
        }
    }
}
