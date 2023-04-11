<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WashingType;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeReservation;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\DateReservation;

class TimeReserveController extends Controller
{
    public function index(Request $request)
    {
        $time = session('user_needed_time');
        return view('time_reservation',[
            'time' =>$time,
            'active_inputs' =>session("all_date_working_status")[session('user_reserved_date')],
            "suggestion" =>session("nearest_available_time")
        ]);  
    }

    public function postTimeReservation(Request $request)
    {
        // dd($request['time']);
        $time_reserve = new TimeReservation;
        $time_reserve->time = $request['time'];
        $time_reserve->washing_time = session('user_needed_time');
        $time_reserve->date = (DateReservation::find(session('user_date_id')))->date; 
        $request->session()->put('user_reserved_date',$time_reserve->date);
        $time_reserve->user_id = Auth::user()->id;
        $time_reserve->save();
        $request->session()->put('user_reserved_time_id',$time_reserve->id);

        return redirect()->route('get_ticket');
        
    }
}
