@extends('dashboard')
@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Kategori Produk</h3>
    </div>
    <div class="panel-body">
           <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link active" href="/"><img src="{{ asset('img/home.png') }}" height="60"/></a>
            </li>

            <?php foreach ($kategori as $key) { ?>  
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('home/kategori/'.$key->kdkategori) }}"><img src="{{ asset('img/'.$key->icon) }}" height="60"/>  </a>
                </li>
             
          <?php } ?>
        </ul>
    </div>
  </div>


<div class="panel panel-default">
  <div class="panel-body">

<div class="small-container">



  <h2 class="title">Feature Produk</h2>
 
    @foreach($fitur as $fiturs)
          <div class="produk">
              <a href="{{ route('barang',$fiturs->kdbarang) }}">
                <img src="{{ asset('assets/inventory/'.$fiturs->foto) }}" alt="{{$fiturs->namabarang}}">
                <h4>{{ $fiturs->namabarang }}</h4>
              </a>
              <div class="rating">
                <i class="fa fa-star">Kode: {{ $fiturs->kdbarang }}</i>
                <i class="fa fa-star">Stok: {{ $fiturs->stok }}</i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>Rp. {{ number_format($fiturs->hargajual,"0",",",".") }}</p>
              <a href="{{ route('keranjang.tambahkeranjang',$fiturs->kdbarang) }}">
                <div id='soalBtn' class='btn btn-warning btn-sm' title="Masukkan Keranjang"><span class='glyphicon glyphicon-shopping-cart'></span> </div>
              </a>
        </div>
    @endforeach

</div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
<div class="small-container">



  <h2 class="title">Katalog Produk {{ Session::get('namakategori') }}   </h2>
 
    @foreach($barang as $product)
          <div class="produk">
          <a href="{{ route('barang',$product->kdbarang) }}">
            <img src="{{ asset('assets/inventory/'.$product->foto) }}" alt="{{$product->namabarang}}">
            <h4>{{ $product->namabarang }}</h4>
          </a>
          <div class="rating">
            <i class="fa fa-star">Kode: {{ $product->kdbarang }}</i>
            <i class="fa fa-star">Stok: {{ $product->stok }}</i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>Rp. {{ number_format($product->hargajual,"0",",",".") }}</p>
          <a href="{{ route('keranjang.tambahkeranjang',$product->kdbarang) }}">
            <div id='soalBtn' class='btn btn-warning btn-sm' title="Masukkan Keranjang"><span class='glyphicon glyphicon-shopping-cart'></span> </div>
          </a>
        </div>
    @endforeach
    <div class="clearfix"></div>
 <div style="text-align: center;"> {{ $barang->links('vendor.pagination.default') }}</div>
</div>
  </div>
</div>

<br>
@endsection

