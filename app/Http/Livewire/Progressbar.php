<?php

namespace App\Http\Livewire;

use App\Http\Controllers\QueryController;
use App\Models\Sms;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Http\Livewire\ShowAllProgress;


class Progressbar extends Component
{

    public $starts, $ends , $sms , $success , $error  , $percentage ;
     public $title;
    public $description, $showBar = false , $isDone = false;

    public function render()
    {
            
            $this->starts =  Session::get('start') ?? date('Y-m-d');
            $this->ends = Session::get('end') ?? date('Y-m-d');
            
            
            
            
            $this->sms = Sms::whereDate('created_at','>=', $this->starts)->whereDate('created_at','<=',$this->ends)->count();
            
            $this->success = Sms::whereDate('created_at','>=', $this->starts)->whereDate('created_at','<=',$this->ends)->where('status', 1)->count();
            
            
           $this->failed = Sms::whereDate('created_at','>=', $this->starts)->whereDate('created_at','<=',$this->ends)->where('status', -1)->count();

            
            
            
            
            $this->error = Sms::whereDate('created_at','>=', $this->starts)->whereDate('created_at','<=',$this->ends)->where('status', -1)->count();
            
            $ShowALL = new ShowAllProgress();
           
            
        if($this->sms != 0){
             $this->percentage = ($this->success / $this->sms) * 100; 
             $this->showBar = true;
             $ShowALL->render();
             if($this->success + $this->failed == $this->sms){
                 $this->isDone = true;
             }
                    
        }
            
            
            return view('livewire.progressbar');
    }


 
}
