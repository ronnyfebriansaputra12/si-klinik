<?php

use App\Models\ResepObat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ControllerFrontEnd;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\PemeriksaanController;

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


Route::resource('/',ControllerFrontEnd::class)->middleware('guest');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('pasiens',PasienController::class)->middleware('auth');
Route::resource('dokter',DokterController::class)->middleware('auth');
Route::resource('obat',ObatController::class)->middleware('auth');
Route::resource('antrian',AntrianController::class)->middleware('auth');
Route::resource('pemeriksaan',PemeriksaanController::class)->middleware('auth');
Route::resource('pembayaran',PembayaranController::class)->middleware('auth');
Route::resource('rekam-medis',RekamMedisController::class)->middleware('auth');
Route::resource('resep-obat',ResepObatController::class)->middleware('auth');

Route::get('/pemeriksaan/{id}/{status}','App\Http\Controllers\PemeriksaanController@edit_status'
    // return view('admin.antrian.edit');
);

Route::get('/antrian/{id}/{status}','App\Http\Controllers\AntrianController@edit_status'
    // return view('admin.antrian.edit');
);

Route::get('/pembayaran/{id}/{status}','App\Http\Controllers\PembayaranController@edit_status'
    // return view('admin.antrian.edit');
);

Route::post('/dokter-tambah','App\Http\Controllers\DokterController@store'
    // return view('admin.antrian.edit');
);

Route::post('/pasien-tambah','App\Http\Controllers\PasienController@store'
    // return view('admin.antrian.edit');
);

Route::post('/index','App\Http\Controllers\ControllerFrontEnd@index'
    // return view('admin.antrian.edit');
);

Route::post('/print/{id}','App\Http\Controllers\PembayaranController@print'
);



Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout',[LoginController::class,'logout']);