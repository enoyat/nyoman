@extends('admin.dashboard')
@section('content')   

<legend>Laporan Data Penjualan</legend>
<div class="row">
	<div class="col-md-4 col-lg-4">
	<form action="{{ route('alaporan.cetakpenjualan') }}" method="POST" role="form"  enctype="multipart/form-data">
			@csrf	
			<div class="form-group">
				<label>Tanggal Awal</label>				
					<input type="date" name="tglawal" id="inputTglawal" class="form-control" value="" required="required" title="">
			</div>
			<br>
			<div class="form-group">
				<label >Tanggal Akhir</label>				
					<input type="date" name="tglakhir" id="inputTglakhir" class="form-control" value="" required="required" title="">
			</div>

			<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Cetak</button>
			</div>
		</form>
	</div>
</div>
@endsection