<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sms;
use App\Classes\Core;



class PendingSmsController extends Controller
{
    

    public function pending_sms(){
            Core::DataCollectors();
         return redirect()->back()->with('success', 'your data downloaded');   
    }
}
