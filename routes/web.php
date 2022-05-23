<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TataCaraController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\JadwalPenerimaanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InboxController;

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
    return view('front/beranda');
});

Route::get('pilih_login/', function(){
    return view('front/pilih_login');
});


Route::get('peta', function(){
    return view('peta/main');
});

Route::get('menu', function(){
    return view('front/pilih_menu');
});

Route::get('tatacara/index_back',[TataCaraController::class,'indexBack'])->name('tatacara_back');
Route::resource('tatacara',TataCaraController::class);
Route::resource('jadwal',JadwalPenerimaanController::class);
Route::resource('gallery',GalleryController::class);

Route::put('reservasi/update_reservasi',[ReservasiController::class,'update_reservasi'])->name('update_reservasi');
Route::get('reservasi/riwayat',[ReservasiController::class,'riwayat'])->name('riwayat');
Route::get('reservasi/back',[ReservasiController::class,'indexBack'])->name('reservasi_back');
Route::resource('reservasi',ReservasiController::class);

Route::get('login/google',[GoogleController::class,'login']);
Route::get('login/google/callback',[GoogleController::class,'callback']);

Route::middleware(['auth'])->group(function(){
    Route::get('logout',[GoogleController::class],'logout');
    Route::get('user',[UserController::class],'user');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
