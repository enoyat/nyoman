<div class="small-container">

  <div class="row row-2">
    <h2>All Products</h2>
    <select class="" name="">
      <option value="Default">Default</option>
      <option value="price">Short by price</option>
      <option value="popularity">Short by popularity</option>
      <option value="rating">Short by rating</option>
      <option value="sale">Short by sale</option>
    </select>
  </div>

  <div class="row">
    @foreach($products as $product)
      <div class="col-4">
          <a href="{{ route('product',$product->url) }}">
            <img src="{{ asset('images/produk/'.$product->foto) }}" alt="{{ $product->nama }}">
            <h4>{{ $product->nama }}</h4>
          </a>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>Rp. {{ number_format($product->harga,"0",",",".") }}</p>
      </div>
    @endforeach
  </div>

  {{ $products->links('vendor.pagination.custom') }}

</div>
</div>