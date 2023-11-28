<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ADashboard;
use App\Http\Controllers\Admin\ANotifikasi;
use App\Http\Controllers\Admin\AOrder;
use App\Http\Controllers\Admin\ABarang;
use App\Http\Controllers\Admin\AKategori;
use App\Http\Controllers\Admin\ATrstok;
use App\Http\Controllers\Admin\ALaporan;
use App\Http\Controllers\Home;
use App\Http\Controllers\Barang;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Keranjang;
use App\Http\Controllers\Order;
use App\Http\Controllers\Checkout;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\SnapController;
use App\Http\Controllers\VtwebController;
use App\Http\Controllers\Notifikasi;



use App\Models\M_barang;

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

Route::get('/',[Home::class,'home'])->name('home');

Route::get('/barang/{kdbarang}',[Barang::class,'detail'])->name('barang');
Route::get('/home/kategori/{kdbarang}',[Home::class,'kategori']);
Route::get('/home/search',[Home::class,'search'])->name('search');

Route::get('login', [AuthController::class,'showFormLogin'])->name('login');
Route::post('login',[AuthController::class,'login']);
Route::get('register', [AuthController::class,'showFormRegister'])->name('register');
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
  Route::group(['roles'=>'member'],function(){
        Route::get('keranjang', [Keranjang::class,'index'])->name('keranjang');   
        Route::get('keranjang/tambahkeranjang/{kdbarang}', [Keranjang::class,'tambahkeranjang'])->name('keranjang.tambahkeranjang');
        Route::post('keranjang/ubahqty', [Keranjang::class,'ubahqty'])->name('keranjang.ubahqty');  
      Route::post('keranjang/hapuskeranjang', [Keranjang::class,'hapuskeranjang'])->name('keranjang.hapuskeranjang');   
      Route::post('keranjang/incheckout', [Keranjang::class,'incheckout'])->name('keranjang.incheckout');   
      Route::get('checkout', [Checkout::class,'index'])->name('checkout');
      Route::get('checkout/combokota', [Checkout::class,'combokota'])->name('checkout.combokota');
      Route::get('checkout/combotarif', [Checkout::class,'combotarif'])->name('checkout.combotarif'); 
      Route::get('checkout/combokurir', [Checkout::class,'combokurir'])->name('checkout.combokurir'); 
      Route::post('checkout/order', [Checkout::class,'order'])->name('checkout.order');
      Route::post('checkout/batal', [Checkout::class,'batal'])->name('checkout.batal');
      Route::get('order/resi/{kdorder}', [Order::class,'resi'])->name('order.resi');
      Route::get('order/detailbayar/{kdorder}', [Order::class,'detailbayar'])->name('order.detailbayar');

      Route::get('/sukses', [Checkout::class,'sukses'])->name('checkout.sukses');


      Route::get('order', [Order::class,'index'])->name('order');
      Route::post('order/konfirmasi', [Order::class,'konfirmasi'])->name('order.konfirmasi');

      Route::get('order/riwayat', [Order::class,'riwayat'])->name('order.riwayat');
      Route::get('notifikasi', [Notifikasi::class,'index'])->name('notifikasi');
      Route::get('notifikasi/baca/{id}', [Notifikasi::class,'baca'])->name('notifikasi.baca');

  });
  Route::group(['prefix' =>'admin'],function(){ 
    Route::group(['roles'=>'admin'],function(){
      Route::get('/adashboard', [ADashboard::class,'index'])->name('adashboard');
      Route::get('/aorder', [AOrder::class,'index'])->name('aorder');
      Route::get('/anotifikasi', [ANotifikasi::class,'index'])->name('anotifikasi');
      Route::get('/anotifikasi/baca/{id}', [ANotifikasi::class,'baca'])->name('anotifikasi.baca');
      Route::get('aorder/resi/{kdorder}', [AOrder::class,'resi'])->name('aorder.resi');
      Route::get('aorder/detailbayar/{kdorder}', [AOrder::class,'detailbayar'])->name('aorder.detailbayar');
      Route::get('aorder/kirim/{kdorder}', [AOrder::class,'kirim'])->name('aorder.kirim');
      Route::post('aorder/proseskirim', [AOrder::class,'proseskirim'])->name('aorder.proseskirim');
      Route::get('aorder/batal/{kdorder}', [AOrder::class,'batal'])->name('aorder.batal');
      Route::get('aorder/konfirmasi/{kdorder}', [AOrder::class,'konfirmasi'])->name('aorder.konfirmasi');

      Route::get('abarang', [ABarang::class,'index'])->name('abarang');
       Route::get('abarang/create', [ABarang::class,'create'])->name('abarang.create');
       Route::post('abarang/store', [ABarang::class,'store'])->name('abarang.store');
       Route::post('abarang/destroy', [ABarang::class,'destroy'])->name('abarang.destroy');
       Route::get('abarang/edit/{kdorder}', [ABarang::class,'edit'])->name('abarang.edit');
       Route::post('abarang/update', [ABarang::class,'update'])->name('abarang.update');
       Route::post('abarang/uploadgallery', [ABarang::class,'uploadgallery'])->name('abarang.uploadgallery');
       Route::get('abarang/hapusgallery/{kdorder}', [ABarang::class,'hapusgallery'])->name('abarang.hapusgallery');

      Route::get('akategori', [AKategori::class,'index'])->name('akategori');
       Route::get('akategori/create', [AKategori::class,'create'])->name('akategori.create');
       Route::post('akategori/store', [AKategori::class,'store'])->name('akategori.store');
       Route::post('akategori/destroy', [AKategori::class,'destroy'])->name('akategori.destroy');
       Route::get('akategori/edit/{kdorder}', [AKategori::class,'edit'])->name('akategori.edit');
       Route::post('akategori/update', [AKategori::class,'update'])->name('akategori.update');
       
      Route::get('atrstok', [ATrstok::class,'index'])->name('atrstok');   
            Route::get('atrstok/create', [ATrstok::class,'create'])->name('atrstok.create');   

      Route::post('atrstok/tambahkeranjang', [ATrstok::class,'tambahkeranjang'])->name('atrstok.tambahkeranjang');
      Route::post('atrstok/ubahqty', [ATrstok::class,'ubahqty'])->name('atrstok.ubahqty');  
      Route::post('atrstok/hapuskeranjang', [ATrstok::class,'hapuskeranjang'])->name('atrstok.hapuskeranjang');   
      Route::post('atrstok/incheckout', [ATrstok::class,'incheckout'])->name('atrstok.incheckout');   

      Route::get('alaporan/rptpenjualan', [ALaporan::class,'rptpenjualan'])->name('alaporan.rptpenjualan');   
      Route::post('alaporan/cetakpenjualan', [ALaporan::class,'cetakpenjualan'])->name('alaporan.cetakpenjualan');  

    });
  });
});
Route::get('gantipassword', [AuthController::class,'gantipassword'])->name('gantipassword'); 
Route::post('ubahpassword', [AuthController::class,'change'])->name('ubahpassword');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::post('/vt_notif', [VtwebController::class,'notification']);
Route::get('/snap',  [SnapController::class,'snap'])->name('snap');
Route::get('/snaptoken', [SnapController::class,'token']);
Route::post('/snapfinish', [SnapController::class,'finish']);
