<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;


class ProgressbarController extends Controller
{
 public function progressBar(Request $request){
 
            $allData = $request->data;
            
            $sms = $allData['sms'];
            
            $started =  $allData['starts'] ;
            $ended = $allData['ends'] ;
            
            
            $starts_at = date('Y-m-d', strtotime($started));
            $ends_at = date('Y-m-d', strtotime($ended));
            
            
            
            $success =  Sms::whereDate('created_at','>=', $starts_at)
                        ->whereDate('created_at','<=',$ends_at)
                        ->where('status', 1)->count();
                        
            $failed =  Sms::whereDate('created_at','>=', $starts_at)
                        ->whereDate('created_at','<=',$ends_at)
                        ->where('status', -1)->count();
            
            
            
            $percentage =ceil(($success / $sms) * 100);
            
            
            return $success+$failed;
   }
 }
