<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('pasiens',PasienController::class)->middleware('guest');
Route::resource('dokter',DokterController::class)->middleware('guest');
Route::resource('obat',ObatController::class)->middleware('guest');
Route::resource('antrian',AntrianController::class)->middleware('guest');
Route::resource('pemeriksaan',PemeriksaanController::class)->middleware('guest');

Route::get('/antrian/{id}/{status}','App\Http\Controllers\AntrianController@edit_status'
    // return view('admin.antrian.edit');
);
Route::post('/dokter-tambah','App\Http\Controllers\DokterController@store'
    // return view('admin.antrian.edit');
);

Route::post('/pasien-tambah','App\Http\Controllers\PasienController@store'
    // return view('admin.antrian.edit');
);
