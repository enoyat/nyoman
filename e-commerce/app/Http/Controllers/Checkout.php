<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\http;

use Illuminate\Support\Facades\Session;
use App\Models\M_barang;
use App\Models\M_kategori;
use App\Models\User;
use App\Models\M_keranjang;
use App\Models\M_order;
use App\Models\M_detorder;

use App\Veritrans\Veritrans;
use App\Utils\CrossApi;

use Illuminate\Support\Facades\DB;
class Checkout extends Controller
{
        use CrossApi;
	
    	public function index() {
        $kategori=M_kategori::get();
		$jmlkeranjang=count(M_keranjang::where('kdmember',Session::get('kdmember'))->get());
      //  $dataorder=M_order::where('kdmember',Session::get('kdmember'))->get(); 
        $dataorder = DB::table('tborder')
            ->join('detorder', 'tborder.kdorder', '=', 'detorder.kdorder')
            ->join('barang', 'detorder.kdbarang', '=', 'barang.kdbarang')     
            ->join('member', 'tborder.kdmember', '=', 'member.kdmember')     
            ->select('tborder.*', 'detorder.*', 'barang.*','member.*' )
            ->where('detorder.f_header','=','1')
            ->where('tborder.kdmember','=',Session::get('kdmember'))
            ->where('tborder.kdorder','=',Session::get('kdorder'))            
            ->get();
           // dd($dataorder);
        $datapropinsi=Checkout::getallprovinsi();
        return view ('checkout')->with(['dataorder'=>$dataorder,  'jmlkeranjang'=>$jmlkeranjang, 'datapropinsi'=>$datapropinsi, 'kategori'=>$kategori]);
	}
    //

    public function getallprovinsi() {
          $response = $this->get('province',[]);
          if($response->rajaongkir->status->code == 200){
            $datapropinsi=$response->rajaongkir->results;
            return $datapropinsi;
          }else{
            return "";
          }
       
    }
    public function combokota(Request $request) {

            $province_id=$request->id;
            $response = $this->get('city?province='.$province_id,[]);

            if($response->rajaongkir->status->code == 200){
                return $response->rajaongkir->results;
            }else{
              return "";
            }

    }
    public function combokurir(){
      $courier = array(
        array(
          'nama'=>'JNE',
          'value'=>'jne'
        ),
        array(
          'nama' => 'POS Indonesia',
          'value' => 'pos'
        ),
        array(
          'nama' => 'TIKI',
          'value' => 'tiki'
        )
      );
      return json_encode($courier);
    }
    public function combotarif(Request $request) {
            $id=$request->id;
            $berat=$request->berat;
            $kurir=$request->kurir;
            $response = $this->performRequest('POST','cost',[
                'origin' => 377,
                'destination' => $id,
                'weight' => $berat,
                'courier' => $kurir
            ]);
           // dd($response);
            if($response->rajaongkir->status->code == 200){
              return $response->rajaongkir->results[0]->costs;
            }else{
              return "";
            }

    }
   
    public function order(Request $request) {
      $kategori=M_kategori::get();
            $kdorder=Session::get('kdorder');
            $qty=$request->qty;
            if (empty($request->kdkurir)) {
                $kdkurir="Kirim Langsung";
            }
            else {
                $kdkurir=$request->kdkurir;
            }


            $shark = M_order::find($kdorder);
            $shark->penerima      = $request->penerima;
            $shark->alamatpenerima      = $request->alamatpenerima;
            $shark->ongkir      = $request->biayaongkir;
            $shark->kurir      = $kdkurir;
            $shark->total      = $request->totalorder;
            $shark->save();
          //  Session::forget('kdorder');
            return redirect()->route('checkout.sukses')
                        ->with('success', 'Pesanan Sukses' );

    }
    public function sukses(){
      $kategori=M_kategori::get();
      return view ('sukses',compact('kategori'));
    }
    public function batal(Request $request)
    {
        $id=$request->kdorder;
        M_order::where('kdorder', '=', $id)->delete();
        M_detorder::where('kdorder', '=', $id)->delete();
        Session::forget('kdorder');

        return redirect()->route('order')
            ->with('success', 'Order sukses dibatalkan');
        //

    }

}
