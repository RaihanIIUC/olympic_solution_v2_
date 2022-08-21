<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class ShowAllProgress extends Component
{
   public $dataArray = [] , $isLoaded = false;
   
    public function render()
    {
       $start_day = strtotime("-20 days");
     $start = date("Y-m-d", $start_day);
        $end = date("Y-m-d");
 


            $all_data = DB::table('sms')
                    ->select('time', DB::raw('count(id) as tot'), 'status')
                    ->where('time', '>=', $start)
                    ->where('time', '<=', $end)
                    ->groupBy('status')
                    ->groupBy('time')
                    ->orderBy('time', 'desc')
                    ->get();
                    
                    
            // dd($all_data);

        foreach($all_data as $data) {
            if ( !array_key_exists($data->time, $this->dataArray) ) {
               $this->dataArray[$data->time] = [
                   'date' => $data->time,
                   '0' => 0,
                   '1' => 0,
                   '-1' => 0
                ];
            }
            
            $this->dataArray[$data->time][$data->status] = $data->tot;
            $this->isLoaded = true;
        }

        // dd($this->dataArray);
                    
 

         
        return view('livewire.show-all-progress');
    }
}
