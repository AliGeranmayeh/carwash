<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DateReservation;
use App\Models\TimeReservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\WashingType;

class TicketController extends Controller
{
    public function index(Request $request)
    {   
        $date = (DateReservation::find(session('user_date_id')))->date;
        $time = (TimeReservation::find(session("user_reserved_time_id")))->time;
        $user_name = Auth::user()->name;
        $user_number = Auth::user()->phone_number;
        $tracking_code = rand(100000,999999); 

        $ticket= new Ticket;
        $ticket->date = $date;
        $ticket->time = $time;
        $ticket->user_id = Auth::user()->id;
        $ticket->tracking_code = $tracking_code;
        $ticket->save();
        $id = $ticket->id;
        return view('ticket',[
            'date'=>$date,
            'time' =>$time,
            'user_name' => $user_name,
            "user_number" => $user_number,
            'tracking_code' => $tracking_code,
            'error' => ''
        ]);
    }
    public function deleteTicket(Request $request)
    {
        if ((DateReservation::find(session('user_date_id')))->date >= date("Y-m-d", strtotime("1 days"))) {
            $reserved_time = TimeReservation::destroy(session("user_reserved_time_id"));
            $reserved_date = DateReservation::destroy(session('user_date_id'));
            $service = WashingType::where('user_id',Auth::user()->id)->where('state',0)->delete();
            return redirect()->route('home');
        }
        $date = (DateReservation::find(session('user_date_id')))->date;
        $time = (TimeReservation::find(session("user_reserved_time_id")))->time;
        $user_name = Auth::user()->name;
        $user_number = Auth::user()->phone_number;
        $tracking_code = rand(100000,999999); 
        return view('ticket',[
            'date'=>$date,
            'time' =>$time,
            'user_name' => $user_name,
            "user_number" => $user_number,
            'tracking_code' => $tracking_code,
            'error' => "you can't cancel your reservation"
        ]);
        
    }
}
