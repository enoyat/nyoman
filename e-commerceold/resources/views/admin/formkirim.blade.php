@extends('admin.dashboard')
@section('content')

<div class="col-md-12 col-lg-5">
  
 <?php $i=1;
    $total=0;
    $totberat=0; ?>

    @foreach ($dataorder as $key)
        <form class="form-horizontal" method="post" action="{{ route('aorder.proseskirim') }}">
          @csrf
          <div class="form-group">
            <label >No.Order</label>
            <input type="text" name="kdorder" class="form-control" id="kdorder" placeholder="Kode order" value="{{  $key->kdorder }}   " readonly>
          </div>
          <div class="form-group">
            <label >Tgl.Order</label>
            <input type="text" class="form-control" id="tglorder" placeholder="Kode order" value="{{  date("d-m-Y", strtotime($key->tglorder)) }}      " readonly>
          </div>
          <div class="form-group">
            <label >Nama Penerima </label>
            <input type="text" name="penerima" id="inputpenerima" value="{{  $key->namamember }} " required="required" title="" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label >Alamat Pengiriman </label>
            <textarea name="alamatpenerima" cols="50" rows="3" class="form-control" readonly>{{  $key->alamat }} </textarea>
          </div>         
          <div class="form-group">
            <label >Pesanan</label>
            <div class="img-responsive" id="viewgambar"><img src="{{ asset('assets/inventory/'.$key->foto) }}"  height="80px">
              <?php echo $key->namabarang; ?>
              

            </div>            
          </div>
      
          <div class="form-group">
              <label >Sub Total Berat Produk (gr)</label>
              <input type="text" name="berat" id="berat" size=10 value="<?php echo $key->totberat; ?>" required="required" title="" readonly style="text-align: right;" class="form-control">
          </div>         
          <div class="form-group">
            <label >Pengiriman</label> 
            Penerima: <b><?php echo $key->penerima; ?>  </b><br>
            Alamat Penerima: <b><?php echo $key->alamatpenerima; ?> </b> <br>
            Jasa Kurir: <b><?php echo $key->kurir; ?> </b> 
          
          </div>
          
          <div class="form-group">
            <label >Sub Total Pengiriman</label>
          <input type="text" name="biayaongkirview" id="biayaongkirview" class="form-control" value="<?php  echo "Rp". number_format($key->ongkir,0,',','.'); ?>" required="required"  title="" style="text-align:right; font-size: 15px;color:red;" readonly="">   

          </div>

          <div class="form-group">
            <label >Total Pembayaran</label>
          <input type="hidden" name="totalorder" id="totalorder" class="form-control" value="" required="required"  title="" style="text-align:right;">  
          <input type="text" name="totalorderview" id="totalorderview" class="form-control" value="{{  "Rp".number_format($key->total,0,',','.') }}" required="required"  title="" style="text-align:right; font-size: 24px;color:red;" readonly="">  

          </div>          
          <div class="form-group">
            <label >Resi Pengiriman</label>
          <input type="text" name="resi" id="resi" class="form-control" value="" required="required"  title="" style="text-align:right; font-size: 24px;color:blue;" >  

          </div>    
          <button type="submit" class="btn btn-danger" onclick="return confirm('Kirimkan Pesanan ?')">KIRIMKAN PESANAN</button>

        </form>

      
  <?php $i++; ?>
  @endforeach
<br>
<br>
</div>


@endsection