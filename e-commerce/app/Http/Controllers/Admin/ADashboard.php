<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
class ADashboard extends Controller
{
	public function index() {
		$dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')            
            ->select('tborder.*', 'detorder.*', 'barang.*')
            ->where('detorder.f_header','=','1')
            ->where('tborder.f_status','!=','3')  
            ->where('tborder.f_cancel','!=','1')                        
            ->orderby('tborder.kdorder', 'desc')
            ->get();
        $jmlorder=count($dataorder);
        $jmlnotifikasi=count(M_notifikasi::where(['f_admbaca'=>'0'])->get());
        Session::put('jmlorder', $jmlorder);
        Session::put('jmlnotifikasi', $jmlnotifikasi);
        return view ('admin.dashboard')->with(['jmlorder'=>$jmlorder, 'jmlnotifikasi'=>$jmlnotifikasi]);
	}

    //
}
