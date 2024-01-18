<?php

namespace App\Http\Controllers;

use App\Models\M_barang;
use App\Models\M_detorder;
use App\Models\M_keranjang;
use App\Models\M_order;
use App\Models\User;
use App\Models\M_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class Keranjang extends Controller
{
    public function index()
    {
        $kategori=M_kategori::get();
        $datakeranjang = M_keranjang::where('kdmember', Session::get('kdmember'))
            ->with('get_barang')->get();
        $jmlkeranjang = count(M_keranjang::where('kdmember', Session::get('kdmember'))->get());
        return view('keranjang')->with(['datakeranjang' => $datakeranjang, 'jmlkeranjang' => $jmlkeranjang, 'totberat' => 0, 'kategori'=>$kategori]);
    }

    public function tambahkeranjang($kdbarang)
    {
        if (Auth::user()) {
            $id = $kdbarang;
            $cekstok = M_barang::where('kdbarang',$id)->where('stok', ">", 0)->count();


            if ($cekstok > 0) {
                $simpan = M_keranjang::create(['kdmember' => Session::get('kdmember'),
                    'kdbarang' => $id,
                    'qty' => 1,
                ]);
                return redirect()->route('home')
                ->with('success', 'Barang sudah ditambahkan di keranjang');
            }
            else {
                return redirect()->route('home')
                ->with('error', 'Stok Barang tidak tersedia');
            }
            
        } else {
            redirect('login', 'refresh');
        }
    }

    public function ubahqty(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $cekstok=M_barang::where('kdbarang',$request->kdbarang)->count();
        if($cekstok>0){
            $stok=M_barang::where('kdbarang',$request->kdbarang)->first();
            if($qty>$stok->stok){
                return redirect()->route('keranjang')
                ->with('error', 'Stok tidak mencukupi');
            }
        }
        
        $shark = M_keranjang::find($id);
        //$shark->name       = Input::get('name');
        $shark->qty = $qty;
        $shark->save();
        return redirect()->route('keranjang')
            ->with('success', 'qty sukses diubah');
    }

    public function hapuskeranjang(Request $request)
    {
        $id = $request->id;
        M_keranjang::where('id', '=', $id)->delete();
        return redirect()->route('keranjang')
            ->with('success', 'Item Sukses dihapus');
        //

    }
    public function genkode_order()
    {
        $kode = DB::table('tborder')->max('kdorder');
        if (empty($kode)) {
            $noUrut = 1;
        } else {
            $noUrut = substr($kode, 4);
            $noUrut++;
        }
        $char = "O";
        $newID = $char . sprintf("%08s", $noUrut);
        return $newID;
    }
    public function incheckout(Request $request)
    {
        // cek jumlah keranjang
        $datakeranjang = M_keranjang::where('kdmember', Session::get('kdmember'))
            ->with('get_barang')->get();

        if (count($datakeranjang) < 1) {
            return back()->withInput()->with('success', 'Item Keranjang tidak ada');
        } else {
            $kdorder = Keranjang::genkode_order();
            $simpanorder = M_order::create([
                'kdorder' => $kdorder,
                'kdmember' => Session::get('kdmember'),
                'tglorder' => date('Y-m-d'),
                'total' => $request->total,
                'totberat' => $request->totberat,
            ]);

            $j = 0;
            $idxitem = 0;
            foreach ($datakeranjang as $item) {
                $kdtroly = $item->id;
                $subjumlah = $item->qty * $item->get_barang->hargajual;
                if ($j == 0) {
                    $f_header = "1";
                } else {
                    $f_header = "0";
                }
                $simpandetorder = M_detorder::create([
                    'kdorder' => $kdorder,
                    'kdbarang' => $item->kdbarang,
                    'qty' => $item->qty,
                    'harga' => $item->get_barang->hargajual,
                    'jumlah' => $subjumlah,
                    'f_header' => $f_header,
                ]);
                M_keranjang::where('id', $kdtroly)->delete();
                $j++;
            }

            Session::put('kdorder', $kdorder);
            return redirect()->route('checkout');
        }
    }
    //
}
