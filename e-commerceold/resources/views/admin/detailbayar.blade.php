@extends('admin.dashboard')
@section('content')    
    
<div class="container">
 <a href="{{ route('aorder') }}">
      <div id='soalBtn' class='btn btn-info btn-sm' title="Masukkan order"><span class='glyphicon glyphicon-chevron-left'></span> Kembali</div></a>
<br>
<br>
  <table class="table " style="font-size: 11px" >
    @php 
      $i=1;
      $total=0;
    @endphp
    @foreach($datapembayaran as $key) 
    <tr>
          <td width="20%">Kode Order</td>
          <td>
               {{ $key->order_id }}
          </td>
    </tr>
    <tr>
          <td>Type Bayar</td>
          <td>
             {{ $key->payment_type  }}    
          </td>
     </tr>

          <tr>
          <td>VA Number</td>
         <td>
              {{ $key->va_number   }} 
         </td>
       </tr>
           <tr>
          <td>Bank</td>
          <td>
              {{ $key->bank }}       
          </td>
        </tr>
        <tr>
          <td>Total</td>    
          <td >{{ "Rp.".number_format($key->gross_amount,0,',','.') }}

        </td>
        </tr>
        <tr>
          <td>Status Pembayaran</td>
          <td>
          

          @if ($key->status=="1") 
              <p style='color: blue'>Sudah Bayar</p>

          @else
            <p style='color: red'>Belum Bayar</p>
          @endif
         </td>
       </tr>
      
  @php $i++ @endphp
  @endforeach
  </tbody>
</table>

</div>
@endsection
 