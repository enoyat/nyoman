@extends('dashboard')
@section('content')


    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-1Y79iH7aBYxrRh4D"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

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
          <td>Aksi</td>
         <td>
    <form id="payment-form" method="post" action="snapfinish">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>
             
               <button id="pay-button">Bayar!</button>
    
             
          </td>

      </tr>

      
  <?php $i++; } ?>

  </tbody>
</table>

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
  @endsection