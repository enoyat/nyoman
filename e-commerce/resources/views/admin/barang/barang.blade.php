@extends('admin.dashboard')
@section('content')    
    
<div class="container">
 <legend>Daftar barang</legend> 
<a href="{{ route('abarang') }}"><div id="viewData" class="btn btn-info">Daftar barang</div></a>
<a href="{{ route('abarang.create') }}"><div id="viewData" class="btn btn-info">Tambah barang</div></a>

<br>
<br>

	<table class="table  table-hover" id='mydata' >
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Kode makanan
			</th>
			<th>
				Nama makanan
			</th>
      <th>
        Harga Jual
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
  
      <td><?php echo $key->hargajual; ?></td>
      <td><?php echo $key->berat; ?></td>

      <td><img src="{{ asset('assets/inventory/'.$key->foto) }}"  height="50px">
      </td>
      <td><?php echo $key->stok; ?></td>

	<td> 
     <a href="{{ route('abarang.edit',$key->kdbarang) }}">
    	<div id='soalBtn' class='btn btn-warning btn-xs' title="Edit"><span class='glyphicon glyphicon-edit'></span></div>
    </a>
    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $key->kdbarang; ?>"><span class='glyphicon glyphicon-trash'> </span></a>
    </td>
		</tr>
	<?php $i++; } ?>
	</tbody>
</table>
<br>
<br>
</div>
<?php
foreach($barang as $i):
    $kdbarang=$i->kdbarang;
    $namabarang=$i->namabarang;
?>
	<!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_hapus<?php echo $kdbarang; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Hapus barang</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('abarang.destroy') }}">
        @csrf
        <div class="modal-body">
            <p>Anda yakin mau menghapus <b><?php echo $namabarang;?></b></p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="kdbarang" value="<?php echo $kdbarang;?>">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-danger">Hapus</button>
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