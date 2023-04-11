<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DateReserveController;
use App\Http\Controllers\TimeReserveController;
use App\Models\DateReservation;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EditTicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/', [HomeController::class, 'submitForm']);
    Route::get('/date_reserve',[DateReserveController::class,'index'])->name('get_date_reservation');
    Route::post('/date_reserve',[DateReserveController::class,'postDatereservation'])->name('post_date_reservation');
    Route::get('/time_reserve',[TimeReserveController::class,'index'])->name('get_time_reservation');
    Route::post('/time_reserve',[TimeReserveController::class,'postTimeReservation'])->name('post_time_reservation');
    Route::get('/ticket', [TicketController::class,'index'])->name('get_ticket');
    Route::post('/ticket', [TicketController::class,'deleteTicket'])->name('delete_ticket');
    Route::get('/edit_ticket',[EditTicketController::class , 'index'])->name('get_edit_page');  
});