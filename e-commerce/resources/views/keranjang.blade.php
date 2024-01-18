@extends('dashboard')
@section('content')
 <script type="text/javascript">
            $(document).ready(function(){
                $('#freekirim').hide();
                $('#jasakurir').hide();
            });


 </script>

<div class="container">

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-12">
  
   <h2 class="title">Keranjang Belanja</h2>
  <table class="table table-responsive table-striped" id='mydata' >
  <thead>
    <tr>
       <th width="5%">
        No
      </th>
      <th colspan="2">
        Produk
      </th>           
      <th style="text-align: right;"> 
        harga
      </th>
      <th style="text-align: right;">
        qty
      </th>
      <th style="text-align: right;">
        Jumlah
      </th>
 
    </tr>
  </thead>
  <tbody>
  
<form class="form-horizontal" method="post" action="{{ route('keranjang.incheckout') }}">
  @csrf
  <?php $i=1;
    $total=0;
    $totberat=0;
    $i=1;

    foreach ($datakeranjang as $fiturs) { ?>
    <tr>
        <td> <?php echo $i;?></td>         
         <td width="10%">
              <img src="{{ asset('assets/inventory/'.$fiturs->get_barang->foto) }}"  height="50px">
         </td>
          <td>
             {{ $fiturs->get_barang->namabarang }} <br>
             berat (gr):  {{ $fiturs->get_barang->berat }}

          </td>
          <td style="text-align: right;"><?php echo "Rp. ".number_format($fiturs->get_barang->hargajual,0,',','.'); ?></td>
          <td style="text-align: right;"><?php echo $fiturs->qty; ?>
             <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $fiturs->id; ?>">+/-</a>
          </td>
          <td style="text-align: right;"><?php $subtotal =$fiturs->qty*$fiturs->get_barang->hargajual;

            echo  "Rp. ".number_format($subtotal,0,',','.'); 
            $berat=$fiturs->get_barang->berat*$fiturs->qty;
            $total=$total+$subtotal;
            $totberat=$totberat+$berat;

          ?> <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $fiturs->id; ?>">-</a>
        </td>
  
    </tr>

      
  <?php $i++; } ?>
 

    <table>
    <tr>
        <td width="70%"></td>
         <td  width="10%" style="text-align: right;vertical-align: middle;" >Berat Pesanan (gr) : </td>
          <td style="text-align: right;" >
            
          <input type="hidden" name="totberat" id="totberat" class="form-control" value="<?php  echo  $totberat; ?>" required="required" title="">
           <input type="text" name="totalberatview" id="totalview" class="form-control" value="<?php  echo  number_format($totberat,0,',','.'); ?>" required="required"  title="" style="text-align:right; font-size: 15px;color:red;" readonly="">   
          </td>

    </tr>
    <tr>
        <td width="70%"></td>
         <td  width="10%" style="text-align: right;vertical-align: middle;" >Jumlah : </td>
          <td style="text-align: right;" >
            
          <input type="hidden" name="total" id="total" class="form-control" value="<?php  echo  $total; ?>" required="required" title="">
           <input type="text" name="totalview" id="totalview" class="form-control" value="<?php  echo  number_format($total,0,',','.'); ?>" required="required"  title="" style="text-align:right; font-size: 15px;color:red;" readonly="">   
          </td>

    </tr>
          <tr>
      <td colspan="6" style="text-align: right;vertical-align: middle;">
        <br>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Buat Pesanan ?')">CHECKOUT</button>
      </td>
      <td ></td>
    </tr>


  </tbody>

</table>
<br>
</form>


</div>

<?php
foreach($datakeranjang as $i):
    $id=$i->id;
    $namabarang=$i->get_barang->namabarang;
    $foto=$i->get_barang->foto;

?>
  <!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_hapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><?php echo $namabarang; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('keranjang.hapuskeranjang') }}">
       @csrf
        <div class="modal-body">
            <img src="{{ asset('assets/inventory/'.$foto) }}" class="img-responsive" >
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button class="btn btn-danger">Hapus</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>
</div>
<?php
foreach($datakeranjang as $i):
    $id=$i->id;
    $namabarang=$i->namabarang;
    $foto=$i->foto;
    $qty=$i->qty;

?>
  <!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><?php echo $namabarang; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('keranjang.ubahqty') }}">
      @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="inputQty" class="col-sm-2 control-label">Qty:</label>
              <div class="col-sm-10">
                <input type="text" name="qty" id="inputQty" class="form-control" value="<?php echo $qty; ?>" required="required" title="">
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button class="btn btn-danger">Simpan</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>

@endsection