@extends('dashboard')
@section('content')

<html>
<title>Checkout</title>
  <head>
    <script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-jvjBZykJ6usBemvA"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <body>
<div class="container">

  <table class="table " style="font-size: 11px" >
    <?php $i=1;
    $total=0;
    foreach ($dataorder as $key) { ?>
    <tr>
          <td>Kode Order</td>
          <td>
               {{ Session::get('kdorder') }}
          </td>
    </tr>
    <tr>
          <td>Tgl Order</td>
          <td>
               {{ date("d-m-Y", strtotime($key->tglorder)) }}         
          </td>
     </tr>
      <tr>
          <td>Total</td>    
          <td >{{ "Rp.".number_format($key->total,0,',','.') }}

        </td>
      </tr>
        <tr>
          <td></td>
         <td>
    <form id="payment-form" method="post" action="snapfinish">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>
             
               <button id="pay-button" class="btn btn-primary">PEMBAYARAN</button>
                 <a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $key->kdorder; ?>"><span class='glyphicon glyphicon-trash'> </span> BATALKAN PESANAN</a><br>
             
          </td>

      </tr>

      
  <?php $i++; } ?>

  </tbody>
</table>

@foreach($dataorder as $key2)

  <!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_hapus<?php echo $key2->kdorder; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">No. Order <?php echo $key2->kdorder; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ route('checkout.batal') }}">
       @csrf
        <div class="modal-body">
           Batalkan Pesanan <?php echo $key2->kdorder; ?> ?
        </div>
        <div class="modal-footer">
            <input type="hidden" name="kdorder" value="<?php echo $key2->kdorder;?>">
            <button class="btn btn-danger">Hapus</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
@endforeach

</div>
        <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      
      url: './snaptoken',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>


</body>
</html>
  @endsection