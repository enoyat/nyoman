@extends('admin.dashboard')
@section('content')    
<div class="row">
	<div class="col-md-12 col-lg-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Form Kategori</h3>
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
	<form action="{{ route('akategori.store') }}" method="POST" role="form"  enctype="multipart/form-data">
			@csrf				
				<div class="form-group">
					<label >Kode</label>
					<input type="text" class="form-control" id="kdkategori" name="kdkategori" placeholder="kode kategori" value="{{ old('kdkategori') }}" required="">
				</div>
				<div class="form-group">
					<label >Nama Kategori</label>
					<input type="text" class="form-control" id="namakategori" name="namakategori" placeholder="Nama kategori" value="{{ old('namakategori') }}" required="">
				</div>								

				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="{{ route('akategori') }}"><div class="btn btn-primary">Kembali</div></a>

			</form>		
			</div>
		</div>

	</div>
</div>

@endsection
