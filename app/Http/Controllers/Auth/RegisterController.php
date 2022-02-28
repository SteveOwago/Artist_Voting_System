<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'min:12','unique:users'],
            'region_id' => ['required', 'integer'],
            'role_id' => ['required', 'integer'],
            'consent' => ['required','accepted'],
        ],
        [
            'consent.required' => 'Kindly check to accept our conditions',
            'phone.required' => 'Kindly add a valid phone nummber!',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'region_id' => $data['region_id'],
            'role_id' => $data['role_id'],
        ]);

        $region = \DB::table('regions')->where('id',$user->region_id)->value('name');
        $mobile = $user->phone;
        $message = "Thank you $user->name for registering in the Tusker Nexters Platform! You have registered in $region. Please avail yourself for auditions on 30th March 2022 at Nyayo Stadium, 10am. See you then and All the best in the competition! Terms and conditions Apply. Helpline 0721985566";

        $this->sendMessage($mobile,$message);

        return $user;

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
