<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WashingType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            "total_time" => 0,
            "total_payment" => 0 ,
            "error"=> ''
        ]);
    }
    public function submitForm(Request $request)
    {
        $total_time = 0;
        $total_payment = 0;
        $post = $_POST;
        if (count($post)==1) {
            return view('home',[
                "total_time" => 0,
                "total_payment" => 0 ,
                "error" => "please click on at least one check box",
            ]);
        }
        else {
            $washing_type = new WashingType;
            $washing_type->user_id = Auth::user()->id;
            $washing_type->car_body = $post['car_body'] ?? 0;
            $washing_type->zero_washing = $post['zero_washing']?? 0;
            $washing_type->interior_leaning = $post['interior_leaning'] ?? 0;

            if ($washing_type->zero_washing) {
                $total_time += 60;
                $total_payment+=80;
                $washing_type->zero_washing=1;
            }
            if ($washing_type->car_body) {
                $total_time += 15;
                $total_payment+=25;
                $washing_type->car_body = 1;
            }
            if ($washing_type->interior_leaning) {
                $total_time += 20;
                $total_payment+=30;
                $washing_type->interior_leaning=1;
            }
            $washing_type->time = $total_time;
            $request->session()->put("user_needed_time",$total_time);
            $washing_type->payment = $total_payment;
            $washing_type->save();
            
            return redirect()->route('get_date_reservation');

        }
        
    }
    
}
