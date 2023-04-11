<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\WashingType;
use App\Models\TimeReservation;
use App\Models\DateReservation;

class DateReserveController extends Controller
{
    public function index(Request $request)
    {    
        $desable_day = [];
        
        for($i = date("Y-m-d" , strtotime('now')) ; $i <= date("Y-m-d", strtotime("7 days")) ; $i++) { 
            $desable_flag = false;
            if($request->session()->has("$i")){
                foreach (session("$i") as $value) {
                   if($value!='disabled'){
                        $desable_flag = false;
                        break;
                   }
                   $desable_flag = true;
                }
            }
            if ($desable_flag) {
                $desable_day["$i"] = 'disabled';
            }
            else {
                $desable_day["$i"] = '';
            }
        }
        $active_inputs = [];
        
        $desable_day_keys = array_keys($desable_day);
        foreach ($desable_day_keys as $index) {
            $time = session('user_needed_time');
            $reserved_times = [];
            foreach(range(9,20) as $start_time)  {
                $each_total_time = 0;
                $end_time =  $start_time+1;
                $time_reserve =TimeReservation::where('date',$index)->where('time',"$start_time-$end_time")->get(); 
                foreach ($time_reserve as $value) {
                    $each_total_time+= $value->washing_time;
                }
                $reserved_times["$start_time-$end_time"] = $each_total_time;
            }
            foreach ($reserved_times as $key => $item) {
                ($item + $time >60)?  $active_inputs["$index"]["$key"] = 'disabled': $active_inputs["$index"]["$key"] = '';
            }
        }
        $request->session()->put("all_date_working_status",$active_inputs);
        foreach ($desable_day_keys as $value) {
            if ($desable_day[$value] != 'disabled') {         
                foreach (session('all_date_working_status')[$value] as $key =>$item) {
                    if ($item == "") {
                        $request->session()->put("nearest_available_time",$key);
                        return view('date_reservation',[
                            'desable_day' => $desable_day,
                            'suggestion' => "$value at $key"
                        ]);
                    }
                }
            }
        }
        return view('date_reservation',[
            'desable_day' =>$desable_day,
            'suggestion' => "Sorry we don't have free date"
        ]);
    }
    public function postDatereservation(Request $request)
    {
        $date_reservetion = new DateReservation;
        $date_reservetion->date = $_POST['date'];
        $request->session()->put('user_reserved_date',$date_reservetion->date);
        $date_reservetion->save();
        $request->session()->put('user_date_id', $date_reservetion->id);
        return redirect()->route('get_time_reservation');
    }
}
