@extends('dashboard')
@section('content')    
    
<div class="container">
 <a href="{{ route('order') }}">
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
      @if ($key->payment_type=='echannel') 
           <tr>
              <td>Kode Pembayaran</td>
              <td>{{ $key->bill_key }}</td>
          </tr>
          <tr>
            <td>Kode Perusahaan</td>
            <td>{{ $key->biller_code }}</td>
          </tr>
           <tr>
              <td>Kode Pembayaran</td>
              <td>{{ $key->bill_key }}</td>
          </tr>
      @endif  
      @if ($key->payment_type=='bank_transfer') 
          <tr>
            <td>Permata VA</td>
            <td>{{ $key->permata_va_number }}</td>
          </tr>
      @endif  


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
 