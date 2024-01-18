@extends('admin.dashboard')
@section('content')

<div class="container">
  
   <h2 class="title">Notifikasi</h2>
  <?php 
  $i=1;
  ?>
    @foreach ($datanotifikasi as $fiturs)
      <div style="width: 200px; margin: auto; display: block;">
          <a href="{{ route('anotifikasi.baca',$fiturs->id) }}" style="text-decoration: none;">
          @if($fiturs->f_admbaca=='0') 
            <div style="background: red;color:#ffffff; margin:5px; border-radius: 5px; padding: 5px">
           @else 
            <div style="background: #f0eded; margin:5px; border-radius: 5px; padding: 5px">
          @endif      
          
                   {{ $fiturs->tglnotifikasi }}<br>
                   {!! $fiturs->isinotifikasi !!} 
            <br>
          </div>
          </a> 
      </div>     
  <?php $i++;  ?>
  @endforeach
<div style="text-align: center;"> {{ $datanotifikasi->links('vendor.pagination.default') }}</div>

</div>

@endsection