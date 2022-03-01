<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Vote;
use App\Models\UserCode;
use App\Utility\SendSMS;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'id_number',
        'is_approved',
        'role_id',
        'profile',
        'phase_id',
        'region_id',
        'activity_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $SMSUtility;



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function votes(){
        return $this->hasMany(Vote::class, 'artist_id');
    }
    public function generateCode()
    {
        $code = rand(100000, 999999);

        UserCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );

        $receiverNumber = auth()->user()->phone;
        $message = "2FA login code is ". $code;

        try{


            $headers = [
                    'Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql'
                ];

            $encodMessage = rawurlencode($message);

                $url = 'https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to='.$receiverNumber.'&from=IMS&sms='.$encodMessage.'&response=json&unicode=0&bulkbalanceuser=voucher';

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

            return redirect()->back()->with("error",$e);
        }

    }
}
