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
use App\Models\M_trstok;
use App\Models\M_keranjangstok;



use Illuminate\Support\Facades\DB;

class ATrstok extends Controller
{
    public function index() {
        $datakeranjang=M_keranjangstok::with('get_barang')->get(); 
        return view ('admin.trstok.keranjang')->with(['datakeranjang'=>$datakeranjang]);
    }
    public function create() {
        $barang=M_barang::get(); 
        return view ('admin.trstok.katalog')->with(['barang'=>$barang]);
    }
    public function tambahkeranjang(Request $request) {     
        if (Auth::user()) {
                $simpan=M_keranjangstok::create(
                    [
                    'email' => Session::get('email'),
                    'tgltransaksi'=> Carbon\Carbon::now(),
                    'kdbarang' => $request->kdbarang,                    
                    'harga' => $request->harga,
                    'qty' => $request->qty ,
                    'jumlah'=> $request->qty*$request->harga            
                ]);
            return back()->withInput()->with('success', 'Barang sudah ditambahkan di keranjang');;

        }
        else {
            redirect('login','refresh');
        }    
    }

    public function ubahqty(Request $request) {     
            $id=$request->id;
            $qty=$request->qty;
            $harga=$request->harga;
            $jumlah= $request->qty*$request->harga;  
            
            $shark = M_keranjangstok::find($id);
            //$shark->name       = Input::get('name');
            $shark->qty      = $qty;
            $shark->harga      = $harga;
            $shark->jumlah      = $jumlah;

            $shark->save();
            return redirect()->route('atrstok')
                        ->with('success', 'qty dan harga sukses diubah' );
    }


    public function hapuskeranjang(Request $request)
    {
        $id=$request->id;
        M_keranjangstok::where('id', '=', $id)->delete();
        return redirect()->route('atrstok')
            ->with('success', 'Item Sukses dihapus');
        //

    }
    function genkode_order() {
        $kode =DB::table('tborder')->max('kdorder');    
                if(empty($kode)) {
                $noUrut = 1;
        }
        else {
            $noUrut = substr($kode, 4);
            $noUrut++;            
        }
        $char = "O";
        $newID = $char . sprintf("%08s", $noUrut);
        return $newID;
    }
    public function incheckout(Request $request) {
        // cek jumlah keranjang
        $datakeranjang=M_keranjangstok::get(); 

        if (count($datakeranjang)<1) {
              return back()->withInput()->with('success', 'Item Keranjang tidak ada');;
        }        
        else {
                $j=0;            
                $idxitem=0;
                foreach ($datakeranjang as $item) {

                      $subjumlah=$item->qty*$item->harga;
                      $simpantrstok=M_trstok::create([
                            'tgltransaksi' => Carbon\Carbon::now(),
                            'kdbarang' => $item->kdbarang,
                            'qty' => $item->qty,
                            'harga' => $item->harga, 
                            'jumlah' => $subjumlah
                      ]);
                      M_keranjangstok::where(['email'=>Session::get('email')])->delete();
                   $j++;   
                }
                return redirect()->route('atrstok');
        }
    }
    //
}
