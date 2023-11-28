@extends('dashboard')
@section('content')
<h3>Terima Kasih</h3>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <h4>Terima kasih telah berbelanja di toko kami.</h4>
            <p>
                Barang akan segera dikirim setelah pembayaran kami terima. 
                Silahkan upload bukti pembayaran Anda <a href="{{ URL::to('order') }}">disini</a>.
            </p>
        </div>
    </div>
</div>


@endsection