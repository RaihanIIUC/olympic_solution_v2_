<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    // comment 
    public  static function dataStoreProcess($item)
    {
        $time = date('Y-m-d', strtotime($item['created_at']));


        Sms::firstOrCreate([  'aws_sent_sms_id' => $item['id'] ],[
            'time'=> $time,
             'applicationId' => $item['applicationId'],
            'message' => $item['message'],
            'sourceAddress' => $item['sourceAddress'],
            'requestId' => $item['requestId'],
            'created_at' => $item['created_at']
        ]);
    }

    public static function DataForOlympic2Handler($sms)
    {
        foreach ($sms as $head => $item) {
            SmsController::dataStoreProcess($item);
        }
        
        if(count($sms) >= 1){
            return true;
        }else{
            return false;
        }
        
        //  $no_count = 1;
        // return view('query', compact('sms','no_count'));
    }
    
   
}
