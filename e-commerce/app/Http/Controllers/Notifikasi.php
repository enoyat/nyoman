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
class Notifikasi extends Controller
{

	public function index() {
		$jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());

        $datanotifikasi=M_notifikasi::where(
            ['kdmember'=>Session::get('kdmember')])
            ->orderBy('id', 'DESC')
            ->paginate(10);
           // dd($dataorder);
        return view ('notifikasi')->with(['datanotifikasi'=>$datanotifikasi,  'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi]);
	}
    public function baca( $id) {

        $notif=M_notifikasi::find($id);
     //   dd($notif);
        $notif->f_baca='1';
        $notif->save();
        return redirect()->route('notifikasi');
    }
}
