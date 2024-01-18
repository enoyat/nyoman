@extends('admin.dashboard')
@section('content')
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<style type="text/css" media="screen">
  .judul {
display: none;
}
.action {
    display: none;
}
 
/* memberikan border pada tabel */
.table {border: 2px solid black; padding: 3px; font-size: 12px }

</style>

<br>
<div class="container">
  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">    

 <a href="{{ route('aorder') }}">
      <div id='soalBtn' class='btn btn-info btn-sm' title="Masukkan order"><span class='glyphicon glyphicon-chevron-left'></span> Kembali</div></a>
    <br>
    <br>
      <div id="area-print">
            <div class="judul">
              <table class="table">
                <thead>
                  <tr>
                    <th width="20%"> <img src="{{ asset('img/logoezymart.png') }}" width="100px" style="padding-bottom: 10px" > 
                    </th>
                    <th style="text-align: left">
                     EZYMART<br>
Perum Empire Regency No. 2 Sidokabul Sorosutan Yogyakarta<br>
HP/WA: 082286265758

                    </th>
                  </tr>                 
                </thead>

              </table>
   @php foreach ($dataorder as $key ) {
              $kdmember=$key->kdmember;          
              $namamember=$key->namamember;
              $alamatkirim=$key->alamat;
              $penerima=$key->penerima; 
              $alamatpenerima= $key->alamatpenerima;
              $ongkir= $key->ongkir; 
              $kurir=$key->kurir;  
              $totalorder=$key->total;
              $kdorder=$key->kdorder;


          }
        @endphp          
                
              
                    <h5 style="line-height: normal;"> DETAIL ORDER </h5>                 
            </div>
                  
        <table >
              <tr>
              <td style="text-align: left;">No. Pesanan </td>
              <td style="text-align: left;" > : {{ $kdorder }}</td>

            </tr>

              <tr>
              <td style="text-align: left;">Kode Member </td>
              <td style="text-align: left;" > : {{ $kdmember }}</td>

            </tr>
              <tr>
              <td style="text-align: left;">Nama Member </td>
              <td style="text-align: left;" > : {{  $namamember }}</td>

            </tr>
            </tr>
              <tr>
              <td style="text-align: left;">Nama Penerima </td>
              <td style="text-align: left;" > : {{  $penerima }}</td>

            </tr>
            </tr>
              <tr>
              <td style="text-align: left;">Alamat Penerima </td>
              <td style="text-align: left;" > : {{ $alamatpenerima }}</td>

            </tr>
            </tr>
              <tr>
              <td style="text-align: left;">Jasa Kurir </td>
              <td style="text-align: left;" > : {{ $kurir }} </td>

            </tr>

        </table>
        
        <br>
          <table  id='mydata' class="table table-bordered table-condensed" style="font-size: 11px">
          <thead>
            <tr>
              <th  style="text-align: center;" width=10px>
                No.
              </th>   
              <th  style="text-align: center;" width=300px>
                Produk
              </th>   

              <th style="text-align: center;" width=200px>
                harga
              </th>
              <th style="text-align: center;" width=50px>
                qty
              </th>
              <th style="text-align: center;" width=200px>
                Jumlah
              </th>
            </tr>
          </thead>
          <tbody>
           
          <?php $i=1;
            $total=0;
            $totberat=0;
            foreach ($dataorder as $key) { ?>
            <tr>
                 <td style="text-align: center;">
                      {{ $i }}
                 </td>
                  <td style="text-align: left;"> 
                      {{ $key->namabarang }}       
                  </td>
                  <td style="text-align: right;">{{ "Rp. ".number_format($key->hargajual,0,',','.') }}</td>
                  <td style="text-align: right;">{{ $key->qty }}                 
                  </td>
                  <td style="text-align: right;"><?php $subtotal =$key->qty*$key->hargajual ?>

                    {{ 'Rp. '.number_format($subtotal,0,',','.') }}
                    @php $total=$total+$subtotal @endphp

                   
                </td>
            </tr>

              
          <?php $i++; } ?>
          <tr>
                 <td colspan="4" style="text-align: right;vertical-align: middle;" >Jumlah  </td>
                  <td style="text-align: right;">
                    
                  <input type="hidden" name="total" id="total" class="form-control" value="{{ $total }}" required="required" title="">
                    <p>{{ 'Rp. '.number_format($total,0,',','.') }}</p>
                  </td>

            </tr>  
          <tr>
                 <td colspan="4" style="text-align: right;vertical-align: middle;" >Ongkir  </td>
                  <td style="text-align: right;">
                    
                  <input type="hidden" name="total" id="total" class="form-control" value="{{ $total }}" required="required" title="">
                    <p>{{ 'Rp. '.number_format($ongkir,0,',','.') }}</p>
                  </td>

            </tr>  
           <tr>
                 <td colspan="4" style="text-align: right;vertical-align: middle;" >Total Order  </td>
                  <td style="text-align: right;">
                    
                  <input type="hidden" name="total" id="total" class="form-control" value="{{ $total }}" required="required" title="">
                    <p>{{ 'Rp. '.number_format($totalorder,0,',','.') }}</p>
                  </td>

            </tr>     
          </tbody>
        </table>

      </div>
      <br>
      <div style="text-align: center;"><button type="button" class="btn btn-primary" id="cetak" onclick="printDiv('area-print')">Cetak </button></div>
     
      <br>
      <br>


  </div>


  </div>
</div>
</div>
@endsection
