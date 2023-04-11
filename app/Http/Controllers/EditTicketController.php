<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditTicketController extends Controller
{
    public function index(Request $request)
    {
        return view('edit_ticket',[
            'error' => ''
        ]);
    }
}
