<div class="container">

    <div class="row">

        <div class="col-12">
            <br>
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
            <form method="post" action="{{ route('order.storeterimaorder') }}" id="myForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="card">
                            <input type="hidden" name="id" id="id" value="{{ $order->kdorder }}">      
                            <label>Terima Order?</label>              
                            <button type="submit" class="btn btn-primary btn-sm" id="btndaftar"
                               >Terima</button>
                        </div>
                    </div>
                </div>


            </form>



        </div>
    </div>

</div>