<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Otorisasi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;

use App\Http\Controllers\Official;
use App\Http\Controllers\Registrasi;
use App\Http\Controllers\Jurnaltagihan;
use App\Http\Controllers\Jurnalpembayaran;
use App\Http\Controllers\Official_databerkas;
use App\Http\Controllers\Exportdata;
use App\Http\Controllers\VAcenter;
use App\Http\Controllers\Eksekutif;
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
    return view('home');
});

//api

Route::get('home', [Home::class,'index'])->name('home');
Route::get('eksekutif', [Eksekutif::class,'index'])->name('eksekutif');
Route::get('login', [AuthController::class,'showFormLogin'])->name('login');
Route::post('login',[AuthController::class,'login']);

Route::get('infopembayaran/{kdregister}', [Jurnalpembayaran::class,'infopembayaran']); 

Route::get('registrasi/hasil', [Registrasi::class,'hasil'])->name('registrasi.hasil')->middleware('periodesession'); 
Route::get('registrasi/{id}', [Registrasi::class,'index'])->name('registrasi')->middleware('periodesession'); 

Route::post('registrasi/simpan', [Registrasi::class,'simpan'])->name('registrasi.simpan')->middleware('periodesession'); 

use App\Http\Controllers\DataCombo;
Route::get('DataCombo/comboprodi', [DataCombo::class,'comboprodi'])->name('DataCombo.comboprodi'); 

use App\Http\Controllers\Databerkas;
Route::resource('databerkas', Databerkas::class); 


//midelleware
Route::group(['middleware' => 'auth'], function () { 
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
 
});
Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
	  Route::group(['roles'=>'mahasiswa'],function(){

	  			Route::resource('peserta',Peserta::class);  			
	 	});
	 
	 Route::group(['roles'=>'admin'],function(){
	 	Route::resource('official',Official::class);
	 	Route::resource('jurnaltagihan',Jurnaltagihan::class);
	 	Route::resource('jurnalpembayaran',Jurnalpembayaran::class);
		Route::resource('official_databerkas', Official_databerkas::class); 


		Route::resource('vacenter', VAcenter::class);

 		Route::get('exportdata',[Exportdata::class,'index'])->name('exportdata');
 		Route::post('exportdata/exportproses',[Exportdata::class,'exportproses'])->name('exportdata.exportproses');

 		Route::get('rptlaporanperfakultas',[Exportdata::class,'rptlaporanperfakultas'])->name('rptlaporanperfakultas');
 		Route::post('exportdata/laporanperfakultas',[Exportdata::class,'laporanperfakultas'])->name('laporanperfakultas');
 		
 		Route::get('official/verujian/{kdregister}',[Official::class,'verujian'])->name('verujian');
 		Route::get('official/terima/{kdregister}',[Official::class,'terima'])->name('terima');
 		Route::get('official/acc/{kdregister}',[Official::class,'acc'])->name('acc');
 		Route::get('official/pindahprodi/{kdregister}',[Official::class,'pindahprodi'])->name('pindahprodi');
 		Route::post('official/pindahprodisimpan',[Official::class,'pindahprodisimpan'])->name('pindahprodisimpan');
 		Route::post('official/accsimpan',[Official::class,'accsimpan'])->name('accsimpan');
 		Route::get('officialpeserta',[Official::class,'getall'])->name('officialpeserta');

		 });
});
