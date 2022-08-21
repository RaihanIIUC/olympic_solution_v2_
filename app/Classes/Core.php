<?php

namespace App\Classes;

use App\Models\Sms;
use Illuminate\Support\Facades\Log;


class Core
{

    public   function formatHandler($sms)
    {
        $queryData = [
            "version" => "1.0",
            "applicationId" => $sms->applicationId,
            "sourceAddress" => $sms->sourceAddress,
            "message" =>  $sms->message,
            "requestId" => $sms->requestId,
            "created_at" => $sms->created_at,
            "encoding" => "8"
        ];
        return $queryData;
    }


    public   function sendRequest($jsonStream)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(     
           // CURLOPT_URL => 'http:localhost:80/slave_panel/api/sms',

            // CURLOPT_URL => 'http://appmis.olympicbd.com/olympic_panel/api/sms',

            // CURLOPT_URL => 'http://localhost:80/slave_panel/public/api/sms',

            CURLOPT_URL => 'https://www.bdappsandroid.com/demo_panel/public/api/sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => 'UTF-8',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => \json_encode($jsonStream),
            // CURLOPT_HTTPHEADER => array(
            //     'content-Type: application/json'
            // ),
        ));

        $preparedResponse = curl_exec($curl);

        $response = json_decode($preparedResponse, true);

        curl_close($curl);

        print_r($response);

        // Log::error($response);

        return $response;
    }


    public   function StatusUpdateHandler($sendChecker, $sms)
    {
        $statusCode =
            $sendChecker['statusCode'] ?? \null;
        $retry  = ++$sms->retry_count;



        if ($statusCode == 'S1000') {
            // echo 'win';

            return   $sms->update([
                'status' => 1,
                'retry_count' => $retry
            ]);
        } else {
            // echo 'failed';

            return  $sms->update([
                'status' => -1,
                'retry_count' => $retry

            ]);
        }

  
    }


    public static function smsInsertHander($sms)
    {
        $sanitizedData =   self::formatHandler($sms);

        $sendChecker =     self::sendRequest($sanitizedData);

         self::StatusUpdateHandler($sendChecker, $sms);
    }

    public static function DataCollectors()
    {
        $smses =  Sms::where('status', 0)->take(90)->get();
        foreach ($smses as $key => $sms) {
            Core::smsInsertHander($sms);
        }
    }
    
      public static function FailedDataRePuller()
    {
        $smses =  Sms::where('status', -1)->take(50)->get();

        foreach ($smses as $key => $sms) {
            Core::smsInsertHander($sms);
        }
    }
}
