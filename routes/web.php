<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/', function(){
    return view('pilih_login');
});

Route::get('login/google',[GoogleController::class,'login']);
Route::get('login/google/callback',[GoogleController::class,'callback']);

Route::middleware(['auth'])->group(function(){
    Route::get('logout',[GoogleController::class],'logout');
    Route::get('user',[UserController::class],'user');
});