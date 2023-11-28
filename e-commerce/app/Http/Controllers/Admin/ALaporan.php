<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon;
use Redirect;
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
class Alaporan extends Controller
{
	public function rptpenjualan() {
		return view ('admin.laporan.rptpenjualan');
	}

    public function cetakpenjualan(Request $request){

        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        if ($tglawal>$tglakhir) {
        	return back()->withInput()->with('success', 'Tanggal awal harus lebih kecil dari tanggal akhir');  
        }
        $dataorder=M_order::whereBetween('tglorder',[$tglawal,$tglakhir])->get();
        return view('admin.laporan.cetakpenjualan')->with(['dataorder'=>$dataorder,'tglawal'=>$tglawal,'tglakhir'=>$tglakhir]);
    }

}
