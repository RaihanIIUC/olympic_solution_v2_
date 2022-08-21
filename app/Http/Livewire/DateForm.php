<?php

namespace App\Http\Livewire;

use App\Http\Controllers\QueryController;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;


class DateForm extends Component
{
    use WithPagination;

    public $start;
    public $end;
    
    public $sessionStart, $sessionEnd , $AlreadyDownloaded;
 
   
    public function storeDateRange()
    {
         $isResultChecker = QueryController::queryByDate2($this->start, $this->end);
             sleep(3);

         if($isResultChecker){
    
               session()->flash('message', 'Sms are Downloaded');
               $this->mount();

               return redirect()->to('/');
         }else{
                session()->flash('error', 'No Sms Found On the Given Date Range');
                $this->mount();

                return redirect()->to('/');
         }

     }
     
   
     
      public function mount() {
       
	    $this->start = Session::get('start');
	    $this->end = Session::get('end');
        
    }

    public function render()
    {
   
        return view('livewire.date-form');
    }
 
}