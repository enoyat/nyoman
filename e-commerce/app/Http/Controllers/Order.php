<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
   
	public function index() {
        $kategori=M_kategori::get();
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
        return view ('order')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi, 'kategori'=>$kategori]);
	}
    public function resi($kdorder) {
        $kategori=M_kategori::get();
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')     
            ->join('member', 'tborder.kdmember', '=', 'member.kdmember')     
            ->select('tborder.*', 'detorder.*', 'barang.*','member.*' )
            ->where('tborder.kdorder','=',$kdorder)            
            ->get();
           // dd($dataorder);
        return view ('resi')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'kategori'=>$kategori]);
    }
    public function detailbayar($kdorder) {
        $kategori=M_kategori::get();
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        // $datapembayaran=M_pembayaran::where('id_user',$kdorder)->get();
        $dataorder=M_order::where('kdorder',$kdorder)->get();
        //dd($datapembayaran);
        return view ('detailbayar')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'kategori'=>$kategori]);
    }    
    public function riwayat() {
        $kategori=M_kategori::get();
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
        return view ('riwayat')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi, 'kategori'=>$kategori]);
    }

    public function konfirmasi(Request $request)
    {
       
        $request->validate([
            'filefoto' => 'required',

        ]);
        if (!empty($request->filefoto)) {
            $file = $request->filefoto;
            $pathUpload = 'assets/inventory';

            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move($pathUpload, $filename);
        } else {
            $filename = 'default.png';
        }
        $order = M_order::find($request->kdorder);
        $order->filebukti = $filename;       
        $simpan = $order->save();

        if ($simpan) {
            return redirect()->route('order')
                ->with(['success' => 'konfirmasi sukses ']);
        } else {
            return redirect()->route('order')
                ->with(['error' => 'konfirmasi gagal']);
        } //
    }

    public function terimaorder($id) {
        $kategori=M_kategori::get();
        $order = M_order::find($id);
        return view('terimaorder', compact('order','kategori'));
    }
    public function storeterimaorder(Request $request)
    {
        $order = M_order::find($request->id);
        $order->f_proses = "3";
        $order->f_status = "3";
        $order->tglterima=date('Y-m-d');
        $order->save();
        return redirect()->route('order');
    }
}
