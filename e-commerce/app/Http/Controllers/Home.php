<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\M_barang;
use App\Models\M_kategori;
use App\Models\M_keranjang;
use App\Models\M_notifikasi;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    
	public function home() {
		$kategori=M_kategori::get();
		Session::forget('kdkategori');
		Session::forget('namakategori');
		Session::forget('katakunci');
        $product = M_barang::orderBy('namabarang')->paginate(20);
        $fitur=M_barang::where('f_fitur','Y')->orderBy('namabarang')->limit(5)->get();
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());

        return view ('home')->with(['fitur'=>$fitur,'barang'=>$product,'kategori'=>$kategori, 'jmlkeranjang'=>$jmlkeranjang, 'jmlnotifikasi'=>$jmlnotifikasi]);
	}
	public function kategori($kdkategori) {
		$ktg=M_kategori::find($kdkategori);
		//dd($ktg);
		$xnamakategori=$ktg->namakategori;
		$xkdkategori=$ktg->kdkategori;
		Session::put('kdkategori',$xkdkategori);
		Session::put('namakategori',$xnamakategori);

		$kategori=M_kategori::get();
		$fitur=M_barang::where('f_fitur','Y')->orderBy('namabarang')->limit(5)->get();

        $product = M_barang::where('kdkategori',$xkdkategori)->orderBy('namabarang')->paginate(20);
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());

        return view ('home')->with(['fitur'=>$fitur,'barang'=>$product,'kategori'=>$kategori, 'jmlkeranjang'=>$jmlkeranjang]);
	}
	public function search(Request $request) {
		$terms=explode(' ',$request->katakunci);
		Session::put('katakunci',$request->katakunci);
        $search_fields = ['namabarang'];
        $search_terms = explode(' ', $request->katakunci);

        $query = M_barang::query();
        foreach ($search_terms as $term) {
            $query->orWhere(function ($query) use ($search_fields, $term) {

                foreach ($search_fields as $field) {
                    $query->orWhere($field, 'LIKE', '%' . $term . '%');
                }
            });
        }
        $product = $query->paginate(20);
		$kategori=M_kategori::get();
		$fitur=M_barang::where('f_fitur','Y')->orderBy('namabarang')->limit(5)->get();
        $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
        $jmlnotifikasi=count(M_notifikasi::where(['kdmember'=>Session::get('kdmember'),'f_baca'=>'0'])->get());

        return view ('home')->with(['fitur'=>$fitur,'barang'=>$product,'kategori'=>$kategori, 'jmlkeranjang'=>$jmlkeranjang]);
	}
}
