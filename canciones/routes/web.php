<?php

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/artistas', ArtistaController::class);
Route::resource('/canciones', CancionController::class);