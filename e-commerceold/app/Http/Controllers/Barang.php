<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_barang;
use App\Models\M_kategori;
use App\Models\M_keranjang;
use Session;
class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   //
    }
  public function detail($kdbarang){
    $kategori=M_kategori::get();
    $product = M_barang::where('kdbarang',$kdbarang)->with('get_foto')->get();
    $jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
    return view('detailbarang',['barang' => $product, 'kategori'=>$kategori, 'jmlkeranjang'=>$jmlkeranjang]);
  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
