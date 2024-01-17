<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TrainTypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/trains', TrainController::class);
Route::resource('/train_types', TrainTypeController::class);
Route::resource('/tickets', TicketController::class);
Route::resource('/ticket_types', TicketTypeController::class);

