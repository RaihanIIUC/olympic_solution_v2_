<?php

namespace App\Http\Controllers;

use App\Classes\Core;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UploadFailedController extends Controller
{


    public  function  FailedIndex()
    {
        $starts =  Session::get('start') ?? date('Y-m-d');
        $ends = Session::get('end') ?? date('Y-m-d');
        // dd($starts);
                // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->paginate(5);
        // dd($sms);
        
        // $success = Sms::where('status', 0)->get();
        
        // dd($success);
        $total = count($sms) ?? 0;
        $no_count  = 1;
        
        return view('welcome',compact('sms','total','no_count'));
    }


    public  static function  FailsIndex()
    {

        // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->paginate(5) ?? 0;
        
        $total = count($sms) ?? 0;
        $no_count  = 1;
        
        return view('welcome', compact('sms', 'total','no_count'));
    }

    public function updateFailedSms($smsid)
    {

        $sms = Sms::find($smsid);
        Core::smsInsertHander($sms);

        return   redirect()->back();
    }
    
    
    
    public function updateFailedSmsAll()
    {
        Core::FailedDataRePuller();
        UploadFailedController::FailsIndex();
        return redirect()->back();
    }
    
}
