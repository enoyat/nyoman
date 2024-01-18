<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_kategori;
use Illuminate\Support\Facades\File; 
use Session;

class AKategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=M_kategori::get();
        return view('admin.kategori.kategori',['kategori'=>$kategori]);
   //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=M_kategori::get();
        return view('admin.kategori.formkategori',['kategori'=>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([                       
            'kdkategori'    => 'required|min:5|unique:kategori',
            'namakategori'  => 'required'            
        ],
        [
          'kdkategori.required'   => 'Kdbaranng tidak boleh kosong',
          'kdkategori.unique'     => 'Kdkategori sudah ada',
          'namakategori.min'      => 'nama Minimal 5 karakter'
        ]);

        $kategori = new M_kategori;
        $kategori->kdkategori = $request->kdkategori;
        $kategori->namakategori = $request->namakategori;
        $simpan = $kategori->save();    
        if($simpan){
                return redirect()->route('akategori')
                    ->with(['success'=>'kategori sukses disimpan']);
        } else {
            return redirect()->route('akategori')
                    ->with(['success', 'ada kesalahan simpan, coba beberapa saat lagi']);
        }  
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
        $product = M_kategori::where('kdkategori',$id)->get();
       // dd($product);
        return view('admin.kategori.formeditkategori',['datakategori' => $product]);
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
 
        $request->validate([                       
            'namakategori'  => 'required'            
        ],
        [
          'kdkategori.unique'     => 'Kdkategori sudah ada',
          'namakategori.min'      => 'nama Minimal 5 karakter',
        ]);

        $simpan=M_kategori::where('kdkategori',$request->kdkategori)->update([
                                        'namakategori' => $request->namakategori
                                        ]); 
        
        if($simpan){
                return redirect()->route('akategori')
                    ->with(['success'=>'kategori sukses diubah']);
        } else {
            return redirect()->route('akategori')
                    ->with(['success', 'ada kesalahan simpan, coba beberapa saat lagi']);
        }         //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->kdkategori;
        M_kategori::where('kdkategori', '=', $id)->delete();
        return redirect()->back();       //
    }
}
