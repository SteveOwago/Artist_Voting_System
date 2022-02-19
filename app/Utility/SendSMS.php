<?php
namespace App\Utility;
use App\Models\User;

class SendSMS
{
    public function sendSMS($mobile_numbers,$message){

        try{


            $headers = [
                    'Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql'
                ];

            $encodMessage = rawurlencode($message);

            foreach($mobile_numbers as $key=>$mobile)
            {
                $url = 'https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to='.$mobile.'&from=IMS&sms='.$encodMessage.'&response=json&unicode=0&bulkbalanceuser=voucher';

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


            }


        }   catch (\Exception $e) {

            return redirect()->back()->with("error",$e);
        }
    }
}

?>
