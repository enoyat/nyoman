<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon;
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
class AOrder extends Controller
{

	public function index() {
 
        $jmlnotifikasi=count(M_notifikasi::where(['f_admbaca'=>'0'])->get());
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
           // dd($dataorder);
        return view ('admin.order')->with(['dataorder'=>$dataorder,  'jmlorder'=>$jmlorder, 'jmlnotifikasi'=>$jmlnotifikasi]);
	}
    public function resi($kdorder) {
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')     
            ->join('member', 'tborder.kdmember', '=', 'member.kdmember')     
            ->select('tborder.*', 'detorder.*', 'barang.*','member.*' )
            ->where('tborder.kdorder','=',$kdorder)            
            ->get();
           // dd($dataorder);
        return view ('admin.resi')->with(['dataorder'=>$dataorder]);
    }
    public function detailbayar($kdorder) {
        $datapembayaran=M_pembayaran::where('id_user',$kdorder)->get();
        //dd($datapembayaran);
        return view ('admin.detailbayar')->with(['datapembayaran'=>$datapembayaran]);
    }  
    public function kirim($kdorder) {
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')     
            ->join('member', 'tborder.kdmember', '=', 'member.kdmember')     
            ->select('tborder.*', 'detorder.*', 'barang.*','member.*' )
            ->where('detorder.f_header','=','1')
            ->where('tborder.kdorder','=',$kdorder)            
            ->get();
        //dd($datapembayaran);
        return view ('admin.formkirim')->with(['dataorder'=>$dataorder]);
    }    
      
    public function proseskirim(Request $request)
    {
        $id=$request->kdorder;
        $shark = M_order::find($id);
        $kdmember=$shark->kdmember;
        $shark->f_proses      = '2';
        $shark->noresi      = $request->resi;
        $shark->tglkirim      = \Carbon\Carbon::now();
        $shark->save();
        $innotif=M_notifikasi::create([
            'tglnotifikasi' => date('d/m/y'),
            'kdmember' =>$kdmember,
            'kdorder' => $id,
            'isinotifikasi' => 'Pesanan Dikirim<br>Pesanan '.$id.' telah dikirimkan pada tanggal '.\Carbon\Carbon::now(),
            'f_baca' => '0',
            'f_admbaca' => '0'
        ]);
        return redirect()->route('aorder')
            ->with('success', 'Order sukses dikirimkan');
        //

    }
    public function batal($id)
    {

        $shark = M_order::find($id);
        $kdmember=$shark->kdmember;
        M_order::where('kdorder', '=', $id)->delete();
        M_detorder::where('kdorder', '=', $id)->delete();
        $innotif=M_notifikasi::create([
            'tglnotifikasi' => \Carbon\Carbon::now(),
            'kdmember' => $kdmember,
            'kdorder' => $id,
            'isinotifikasi' => 'Pesanan dibatalkan<br>Pesanan '.$id.' telah dibatalkan, karena sistem belum menerima pembayaran anda',
            'f_baca' => '0',
            'f_admbaca' => '0'
        ]);
        return redirect()->route('aorder')
            ->with('success', 'Order sukses dibatalkan');
        //

    }
}
