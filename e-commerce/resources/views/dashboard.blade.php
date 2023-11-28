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

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">



</head>
<body >
<div class="container-fluid" style="background: #c4002e; ">
    <div class="container">
        <div class="row">      
            <div class="col-100"  style="padding-top: 5px; font-size: 12px; display: inline-block; float: right;color:white">
                   <div class="notif" >
                    
                   <?php $cek=Auth::user(); ?>
                         @if (!empty($cek))
                          <a href="{{ route('notifikasi') }}" class="link"><span  class="glyphicon glyphicon-bell">                            
                          </span> 

                          <span class="badge badge-light" style="background-color: transparent; border: 1px solid #ffffff;color:#ffffff; margin-left: -8px; margin-top: -15px">
                         
                          @if(!empty($jmlnotifikasi))
                              {{ $jmlnotifikasi }}
                          @else 
                            0
                          @endif 
                          </span> Notifikasi
                          <span style="padding-right: 10px;"></span></a>

                          <a href="{{ route('order') }}" class="link"><span  class="glyphicon glyphicon-list-alt"></span> Pesanan Saya <span style="padding-right: 10px;"></span></a>
                          <a href="{{ route('order.riwayat') }}" class="link"><span  class="glyphicon glyphicon-briefcase"></span> Riwayat Pesanan <span style="padding-right: 10px;"></span></a>
                         <span  class="glyphicon glyphicon-user"></span> {{ $cek->email }} 
                          <a href="/logout"  class="btn-sm btn-default" style="margin: 05px;">LOGOUT</a>
                         @else  
                            <a href="/login"   class="btn-sm btn-default" style="margin: 05px;">LOGIN</a>
                        @endif
                  </div>
            </div>
        </div>
    </div>

    <div class="container" style="height: 80px; ">
      <div class="row">    
         <div class="col-25">
            <a class="navbar-brand" href="/" style="padding-top: 0px" > <img  src="{{ asset('/img/logo_ezymarttrans.png') }}"    ></a>
          </div>
          <div class="col-75">
                <form class="navbar-form navbar-left" role="search" action="/home/search" method="get">
                    @csrf

                    <div class="main">
                      
                      <!-- Actual search box -->
                      <div class="form-group has-feedback has-search">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search" name="katakunci" id="katakunci" 
                        value="{{ Session::get('katakunci') }}" size="50">
                      </div>
                      
                    </div>


                  </form>

                <div class="btnatasbar" >
                    <a href="{{ route('keranjang') }}" ><img  src="{{ asset('/img/chart.png') }}"  width="30px" style="margin-top: 10px"><span class="badge badge-light" style="background-color: transparent; border: 1px solid #ffffff;color:#ffffff;; margin-left: -15px; margin-top: -20px">
                    @if(!empty($jmlkeranjang))
                        {{ $jmlkeranjang }}
                    @else 
                      0
                    @endif 

                    </span></a>
                </div>

        </div>
      </div>
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