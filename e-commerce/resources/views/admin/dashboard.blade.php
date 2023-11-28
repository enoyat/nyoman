<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EZYMART - BELANJA JADI LEBIH MUDAH </title>
    <link href="{{ asset('/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
     <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">



</head>
<body >
<div class="container-fluid" style="background: #c4002e; ">
    <div class="container">
        <div class="row">      
            <div class="col-100"  style="padding-top: 5px; font-size: 12px; display: inline-block; float: right;color:white; height: 30px;">
              
                   <div class="notif" >
                    
                   <?php $cek=Auth::user(); ?>
                         @if (!empty($cek))
                          <a href="{{ route('anotifikasi') }}" class="link"><span  class="glyphicon glyphicon-bell">                            
                          </span> 

                          <span class="badge badge-light" style="background-color: transparent; border: 1px solid #ffffff;color:#ffffff; margin-left: -8px; margin-top: -15px">
                         
                          @if(!empty(Session::get('jmlnotifikasi')))
                              {{ Session::get('jmlnotifikasi') }}
                          @else 
                            0
                          @endif 
                          </span> Notifikasi
                          <span style="padding-right: 10px;"></span></a>

                          <a href="{{ route('aorder') }}" class="link"><span  class="glyphicon glyphicon-list-alt"></span>

                          <span class="badge badge-light" style="background-color: transparent; border: 1px solid #ffffff;color:#ffffff; margin-left: -8px; margin-top: -15px">
                         
                          @if(!empty(Session::get('jmlorder')))
                              {{ Session::get('jmlorder') }}
                          @else 
                            0
                          @endif 
                          </span>

                           Order <span style="padding-right: 10px;"></span>
                          </a>
                         <span  class="glyphicon glyphicon-user"></span> {{ $cek->email }} 
                        @endif
                  </div>
            </div>
        </div>
     <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/adashboard" style="font-family: 'Viga', sans-serif; font-size: 20px;"><img  src="{{ asset('/img/logoezymart.png') }}" height="35"  style="margin-top: -8px"  ></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">              
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down"></span> Menu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php $cek=Auth::user(); ?>
                         @if (!empty($cek))
                  <li><a href="{{ route('aorder') }}"><span class="glyphicon glyphicon-user"></span> Order Penjualan</a></li>
                  <li><a href="{{ route('abarang') }}"><span class="glyphicon glyphicon-user"></span> Barang</a></li>
                  <li><a href="{{ route('akategori') }}"><span class="glyphicon glyphicon-user"></span> Kategori</a></li>
                  <li><a href="{{ route('atrstok') }}"><span class="glyphicon glyphicon-user"></span> Transaksi Stok</a></li>

                  <li><a href="{{ route('alaporan.rptpenjualan') }}"><span class="glyphicon glyphicon-file"></span> Laporan Penjualan</a></li>
                  <li><a href="{{ route('gantipassword') }}"><span class="glyphicon glyphicon-lock"></span> Ubah Password</a></li>                          
                    @endif
                </ul>
              </li>                            
              <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

    </div>


    
</div>  




<br>

  <div class="container" style="min-height: 400px" >
              @yield('content')
  </div>
    <!-- Page Content -->
 <div id="notifications">
       @if ($message = Session::get('success'))
        <div class="alert alert-success" style="text-align: center;">
            <p>{{ $message }}</p>
        </div>
    @endif
 
</div>        
 <div class="container-fluid" style="height: 80px; background: #c4002e; color: #e8e6e8; padding-top: 15px">
    <div class="container">
        <p style="text-align: center;">Yogyakarta: Perum Empire Regency No. 2 Sidokabul Yogyakarta<br>
        Semarang: Jl. Taman Maluku No. 21 Semarang</p>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <style type="text/css" media="screen">
              #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        bottom: 0px;
        margin-bottom: 22px;
        margin-right: 15px;
        min-width: 300px; 
       
    </style>
 <script type="text/javascript">
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');   
</script>   
</body>
</html>