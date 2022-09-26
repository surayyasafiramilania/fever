<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\dataUjiController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\dataLatihController;
use App\Http\Controllers\dataModelController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\klasifikasiController;
use App\Http\Controllers\tentangController;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin')->middleware(['auth','cek-role:1,0'])->group(function(){
    
Route::get('dataset/data-table',[DatasetController::class,'dataTable'])->name('dataset.datatable');
Route::resource('dataset', DatasetController::class);

Route::get('diagnosa/data-table',[DiagnosaController::class,'dataTable'])->name('diagnosa.datatable');
Route::resource('diagnosa', DiagnosaController::class);

Route::get('user/data-table',[UserController::class,'dataTable'])->name('user.datatable');
Route::resource('user', UserController::class); 

Route::get('data-model/data-table',[dataModelController::class,'dataTable'])->name('data-model.datatable');
Route::resource('data-model', dataModelController::class);

Route::get('data-uji/data-table',[dataUjiController::class,'dataTable'])->name('data-uji.datatable');
Route::resource('data-uji', dataUjiController::class);

Route::get('data-latih/data-table',[dataLatihController::class,'dataTable'])->name('data-latih.datatable');
Route::resource('data-latih', dataLatihController::class);

Route::resource('pelatihan', PelatihanController::class);
Route::get('status/{id}',[PelatihanController::class,'status'])->name('status');
Route::resource('pengujian', PengujianController::class);

Route::get('proses-pelatihan/data-table',[PelatihanController::class,'dataTable'])->name('proses-latih.datatable');
Route::post('proses-pelatihan', [PelatihanController::class, 'connectPython'])->name('proses-pelatihan');

Route::get('proses-pengujian/data-table',[PengujianController::class,'dataTable'])->name('proses-uji.datatable');
Route::post('proses-pengujian', [PengujianController::class, 'connectPython'])->name('proses-uji');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('klasifikasi-demam', klasifikasiController::class);
Route::post('proses-klasifikasi', [KlasifikasiController::class, 'connectPython'])->name('proses-klasifikasi');
Route::get('hasil-klasifikasi/{id}', [KlasifikasiController::class, 'hasil_klasifikasi'])->name('hasil-klasifikasi');

Route::resource('tentang-aplikasi', tentangController::class)->only('index');
});


Auth::routes();