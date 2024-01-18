@extends('admin.dashboard')
@section('content')    
    
<div class="container">
 <legend>Form Pilih Barang</legend> 
<br>

<a href="{{ route('atrstok') }}"><div id="viewData" class="btn btn-danger">Selesai Pilih Barang</div></a>
<br>
<br>
	<table class="table  table-hover" id='mydata' >
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Kode 
			</th>
			<th>
				Nama Barang
			</th>
      <th>
        Harga Beli
      </th>
      <th>
        Berat (gr)
      </th>
      <th>
        Gambar
      </th>
			<th>
				stok
			</th>
			<th>
				Aksi
			</th>

		</tr>
	</thead>
	<tbody>
	<?php $i=1;
		foreach ($barang as $key) { ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $key->kdbarang; ?></td>
			<td><?php echo $key->namabarang; ?></td>
  
      <td><?php echo $key->hargabeli; ?></td>
      <td><?php echo $key->berat; ?></td>

      <td><img src="{{ asset('assets/inventory/'.$key->foto) }}"  height="50px">
      </td>
      <td><?php echo $key->stok; ?></td>

	<td> 
    <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_form<?php echo $key->kdbarang; ?>"><span class='glyphicon glyphicon-shopping-cart'> </span></a>
    </td>
		</tr>
	<?php $i++; } ?>
	</tbody>
</table>
<br>
<br>
</div>

@foreach($barang as $i)
 <!-- ============ MODAL FORM  =============== -->
<div class="modal fade" id="modal_form<?php echo $i->kdbarang; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><?php echo $i->namabarang; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('atrstok.tambahkeranjang',$i->kdbarang) }}">
      @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="inputQty" class="col-sm-2 control-label">Qty:</label>
              <div class="col-sm-10">
                <input type="text" name="qty" id="qty" class="form-control" value="1" required="required" title="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputQty" class="col-sm-2 control-label">Harga:</label>
              <div class="col-sm-10">
                <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $i->harga; ?>" required="required" title="">
              </div>
            </div>

        </div>
        <div class="modal-footer">
            <input type="hidden" name="kdbarang" value="<?php echo $i->kdbarang;?>">
            <button class="btn btn-danger">Simpan</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>

<script>
  $(function () {
    $('#mydata').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection