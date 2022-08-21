<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueryController extends Controller
{

  

    public static function CurlHandler($queryData)
    {
        $curl = curl_init();
        
        // this works for aws server 
        curl_setopt_array($curl, array( 
          CURLOPT_URL => 'http://olympic.mwebservices.co/api/query',
          
        
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => \json_encode($queryData),
        CURLOPT_HTTPHEADER => array(
            'content-Type: application/json'
        ),
        ));
        
        // this works  for cpanel server curl 
        
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://www.bdappsandroid.com/aws-olympic-helper/public/api/query',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_POSTFIELDS => ($queryData),
        // ));
        
        
        $PreResponse = curl_exec($curl);
        $response = json_decode($PreResponse, true);
        curl_close($curl);
        return  $response;
    }


    public static function formatHandler($request)
    {
        $starts_at = date('Y-m-d', strtotime($request->start));
        $ends_at = date('Y-m-d', strtotime($request->end));
        
            session()->put('start',$starts_at);
            session()->put('end',$ends_at);
        

        $queryData = [
          'start_at' => $starts_at,'end_at' => $ends_at
        ];
        return $queryData;
    }


    public function queryByDate(Request $request)
    {
        $queryData =   QueryController::formatHandler($request);

        $response =   QueryController::CurlHandler($queryData);

        return SmsController::DataForOlympic2Handler($response);
    }

      public static function formatHandler2($start, $end)
    {
        $starts_at = date('Y-m-d', strtotime($start));
        $ends_at = date('Y-m-d', strtotime($end));
 
            session()->put('start',$starts_at);
            session()->put('end',$ends_at);
        

        $queryData = [
          'start_at' => $starts_at,'end_at' => $ends_at
        ];
        return $queryData;
    }


    public static function queryByDate2($start, $end)
    {
        $queryData =   QueryController::formatHandler2($start, $end);

        $response =   QueryController::CurlHandler($queryData);

       return  SmsController::DataForOlympic2Handler($response);
    }
}
