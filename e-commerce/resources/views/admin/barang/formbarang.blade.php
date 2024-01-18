@extends('admin.dashboard')
@section('content')    
<div class="row">
	<div class="col-md-12 col-lg-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Form Barang</h3>
		</div>
		<div class="panel-body">	
		    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        
     @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan data, silahkan dicek kembali<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif		
	<form action="{{ route('abarang.store') }}" method="POST" role="form"  enctype="multipart/form-data">
			@csrf				
				<div class="form-group">
					<label >Kode makanan</label>
					<input type="text" class="form-control" id="kdbarang" name="kdbarang" placeholder="kode barang" value="{{ old('kdbarang') }}" required="">
				</div>
				<div class="form-group">
					<label >Nama makanan</label>
					<input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama barang" value="{{ old('namabarang') }}" required="">
				</div>								
				<div class="form-group">
					<label >deskripsi</label>
					<textarea name="deskripsi" required="" class="form-control" rows="10">{{ old('deskripsi') }}</textarea>
				</div>
				<div class="form-group">
					<label >Feature Produk</label>
					<select name="f_fitur" id="f_fitur" class="form-control" required="required">
					
					<option value="Y">Y</option>
					<option value="N">N</option>
					</select>
				</div>						
				<div class="form-group">
					<label >Harga Jual</label>
					<input type="text" class="form-control" id="hargajual" name="hargajual" placeholder="Harga jual" value="{{ old('hargajual') }}" required="">
				</div>	
				<div class="form-group">
					<label >Berat (gram)</label>
					<input type="text" class="form-control" id="berat" name="berat" placeholder="berat" value="{{ old('berat') }}" required="">
				</div>	
				<div class="form-group">
					<label for="">Kategori</label>
				<select name="kdkategori" id="kdkategori" class="form-control" required="required">
				<option value=""></option>
				<?php 
				foreach ($kategori as $key ) 
				{ ?>
					<option value="<?php echo $key->kdkategori;?>"><?php echo $key->namakategori;?></option>
				<?php				
				}
				?>
				</select>		
				</div>							
				<div class="form-group">									
					<label>Foto Utama</label>
					<input type="file" name="filefoto">
				</div>


				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="{{ route('abarang') }}"><div class="btn btn-primary">Kembali</div></a>

			</form>		
			</div>
		</div>

	</div>
</div>

@endsection
