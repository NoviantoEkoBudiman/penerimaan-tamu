<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TataCaraController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\JadwalPenerimaanController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\KesediaanController;

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

Route::get('hapus_tata_cara/{id?}', [TataCaraController::class,'destroy']);
Route::get('tatacara/index_back',[TataCaraController::class,'indexBack'])->name('tatacara_back');
Route::resource('tatacara',TataCaraController::class);
Route::resource('jadwal',JadwalPenerimaanController::class);

Route::get('lihat_reservasi/{id?}', [ReservasiController::class,'lihat_reservasi'])->name('lihat_reservasi');
Route::put('perbaikan_data/{id?}', [ReservasiController::class,'perbaikan_data'])->name('perbaikan_data');
Route::put('update_tindakan_akhir/{id?}', [ReservasiController::class,'update_tindakan_akhir'])->name('update_tindakan_akhir');
Route::get('tindakan_akhir/{id?}', [ReservasiController::class,'tindakan_akhir'])->name('tindakan_akhir');
Route::put('kirim_bukti/{id?}', [ReservasiController::class,'kirim_bukti'])->name('kirim_bukti');
Route::put('upload_bukti/{id?}', [ReservasiController::class,'upload_bukti'])->name('upload_bukti');
Route::get('lengkapi/{id?}', [ReservasiController::class,'lengkapi'])->name('lengkapi');
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

// Kesediaan
Route::resource('kesediaan',KesediaanController::class);