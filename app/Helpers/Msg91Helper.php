<?php

namespace App\Helpers;
class Msg91Helper
{

    // to send sms
    public static function send_sms(string $msg_body)
    {

        $curl = curl_init();

        $result_object = new \stdClass();

        $result_object->success = true;
        $result_object->response = 'success';

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $msg_body,
            CURLOPT_HTTPHEADER => array(
                "authkey: 340525AOb9wG0plV95f4f3481P1",
                "content-type: application/JSON",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            $result_object->success = false;
            $result_object->response = $err;
            return $result_object;
        } else {
            //echo $response;
            return $result_object;
        }
    }

    //OTP API 3 Function
    public static function sendOTP($authKey, $mobileNumber, $template_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://api.msg91.com/api/v5/otp?invisible=1&authkey=$authKey&mobile=$mobileNumber&template_id=$template_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public static function verifyOTP($otp, $authKey, $mobileNumber)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://api.msg91.com/api/v5/otp/verify?otp=$otp&authkey=$authKey&mobile=$mobileNumber",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: c567d29b-3cac-b497-23da-57acc0e13fa6",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public static function resendOTP($authKey, $mobileNumber, $retrytype)
    {
        //NB:retrytype    string    Default - Voice, For text it should be text

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.msg91.com/api/v5/otp/retry?authkey=$authKey&mobile=$mobileNumber&retrytype=$retrytype",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 6ed05b71-a43f-2147-01c8-e5913fb33665",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

}
