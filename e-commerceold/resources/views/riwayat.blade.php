@extends('dashboard')
@section('content')
<h4>Riwayat Pesanan</h4><hr>
	<table class="table " style="font-size: 11px" >
	<thead>
		<tr>
      <th>
        No Order
      </th>
      <th>
        Tgl. Order
      </th>    
            <th style="text-align: left;">
        Total
      </th>  
      <th  >
        Produk
      </th>			
      <th>Penerima</th>
    
      <th>
        Status Order
      </th>
      <th>
        
      </th>
		</tr>
	</thead>
	<tbody>
	
 <?php $i=1;
    $total=0; ?>
		@foreach ($dataorder as $key)
		<tr>
          <td>
              {{  $key->kdorder }}       
          </td>
          <td>
               {{  date("d-m-Y", strtotime($key->tglorder)) }}         
          </td>
          <td style="text-align: right;">{{  "Rp.".number_format($key->total,0,',','.') }}

        </td>

      		<td>
    	              <div class="img-responsive" id="viewgambar"><img src="{{ asset('assets/inventory/'.$key->foto) }}"  height="80px"><br>
              <?php echo $key->namabarang; ?> <br>            
               <a class="btn btn-xs btn-info" href="{{ URL::to('order/resi/'.$key->kdorder) }}"><span class='glyphicon glyphicon-upload'> </span> Detail Order</a>  
            </div>			  		
      		</td>

        <td>
          Penerima: <b><?php echo $key->penerima; ?>  </b><br>
          Alamat Penerima: <b><?php echo $key->alamatpenerima; ?> </b> <br>
          Jasa Kurir: <b><?php echo $key->kurir; ?> </b> 



       
         
          <td>


            <?php 

          if ($key->f_status=="3") {
            echo "<p style='color: red'>Diterima</p>";
          }
          elseif ($key->f_cancel=="1") {
            echo "<p style='color: red'>Cancel</p>";
          }

           ?>
          </td>
          <td>

              <?php if ($key->f_proses=="0") { ?>
                 <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $key->kdorder; ?>"><span class='glyphicon glyphicon-trash'> </span> BATALKAN PESANAN</a><br>
              <?php } ?>   

             
          </td>

		</tr>

      
	<?php $i++; ?>
  @endforeach

	</tbody>
</form>
</table>

</div>

<?php
foreach($dataorder as $i):
    $kdorder=$i->kdorder;
?>
	<!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_hapus<?php echo $kdorder; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">No. Order <?php echo $kdorder; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('checkout.batal') }}">
        @csrf
        <div class="modal-body">
           Batalkan Pesanan <?php echo $kdorder; ?> ?
        </div>
        <div class="modal-footer">
            <input type="hidden" name="kdorder" value="<?php echo $kdorder;?>">
            <button class="btn btn-danger">Hapus</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>

@endsection