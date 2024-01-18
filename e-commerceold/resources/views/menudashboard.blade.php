
<br>
<div class="panel panel-success" >
	<div class="panel-heading " style="text-align: center;">
		Akun Pendaftaran anda :</br>
	</div>
	<div class="panel-body " style="text-align: center;">
		<b>
      {{ Session::get('email') }}
	</div>
</div>
      <div class="list-group">      
        <a href="/" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Dashboard</a>
        <a href="/buktidaftar/{{ Session::get('email') }}" class="list-group-item"><span class="glyphicon glyphicon-file"></span> Bukti Pendaftaran </a>
        <a href="/infopembayaran/{{ Session::get('email') }}" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Informasi Pembayaran</a>
          <a href="/datadokumen" class="list-group-item"><span class="glyphicon glyphicon-paperclip"></span> Upload Berkas Pendaftaran</a>
       <a href="/ujiancbt" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Ujian CBT</a>
        <a href="/pengumuman" class="list-group-item"><span class="glyphicon glyphicon-certificate"></span> Hasil</a>
        <a href="/logout" onclick="return confirm('Yakin Logout ?')" class="list-group-item"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
      </div>