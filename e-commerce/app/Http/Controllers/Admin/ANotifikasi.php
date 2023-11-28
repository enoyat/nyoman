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
class ANotifikasi extends Controller
{

	public function index() {
        $jmlnotifikasi=count(M_notifikasi::where(['f_admbaca'=>'0'])->get());
        Session::put('jmlnotifikasi', $jmlnotifikasi);
        $datanotifikasi=M_notifikasi::
            orderBy('id', 'DESC')
            ->paginate(10);
           // dd($dataorder);
        return view ('admin.notifikasi')->with(['datanotifikasi'=>$datanotifikasi ]);
	}
    public function baca($id) {

        $notif=M_notifikasi::find($id);
     //   dd($notif);
        $notif->f_admbaca='1';
        $notif->save();
        return redirect()->route('anotifikasi');
    }
}
