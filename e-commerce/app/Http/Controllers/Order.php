<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\M_barang;
use App\Models\M_kategori;
use App\Models\User;
use App\Models\M_keranjang;
use App\Models\M_order;
use App\Models\M_detorder;
use App\Models\M_pembayaran;
use App\Models\M_notifikasi;
use App\Veritrans\Veritrans;

use Illuminate\Support\Facades\DB;
class Order extends Controller
{
    public function __construct(){   
        Veritrans::$serverKey = 'SB-Mid-server-JNNCjlMYxZciQsJ-KJRbZnGD';
        Veritrans::$isProduction = false;
    }
	public function index() {
		$jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
          $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());
      //  $dataorder=M_order::where('kdmember',Session::get('kdmember'))->get(); 
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')            
            ->select('tborder.*', 'detorder.*', 'barang.*')
            ->where('detorder.f_header','=','1')
            ->where('kdmember','=',Session::get('kdmember'))
            ->where('tborder.f_status','!=','3')  
            ->where('tborder.f_cancel','!=','1')                        
            ->orderby('tborder.kdorder', 'desc')
            ->get();
           // dd($dataorder);
        return view ('order')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi]);
	}
    public function resi($kdorder) {
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')     
            ->join('member', 'tborder.kdmember', '=', 'member.kdmember')     
            ->select('tborder.*', 'detorder.*', 'barang.*','member.*' )
            ->where('tborder.kdorder','=',$kdorder)            
            ->get();
           // dd($dataorder);
        return view ('resi')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang]);
    }
    public function detailbayar($kdorder) {
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $datapembayaran=M_pembayaran::where('id_user',$kdorder)->get();
        //dd($datapembayaran);
        return view ('detailbayar')->with(['datapembayaran'=>$datapembayaran,  'jmlkeranjang'=>$jmlkeranjang]);
    }    
    public function riwayat() {
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
                  $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());
      //  $dataorder=M_order::where('kdmember',Session::get('kdmember'))->get(); 
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')            
            ->select('tborder.*', 'detorder.*', 'barang.*')
            ->where('detorder.f_header','=','1')
            ->where('kdmember','=',Session::get('kdmember'))
            ->where('tborder.f_status','=','3')  
            ->where('tborder.f_cancel','!=','1')                        
            ->orderby('tborder.kdorder', 'desc')
            ->get();
           // dd($dataorder);
        return view ('riwayat')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi]);
    }
}
