@extends('dashboard')
@section('content')
    <div class="container">
        <a href="{{ route('order') }}">
            <div id='soalBtn' class='btn btn-info btn-sm' title="Masukkan order"><span
                    class='glyphicon glyphicon-chevron-left'></span> Kembali</div>
        </a>
        <br>
        <br>
        <form action="{{ route('order.konfirmasi') }}" method="POST" role="form" enctype="multipart/form-data">
          @csrf
        <table class="table " style="font-size: 11px">
            @php
                $i = 1;
                $total = 0;
            @endphp
            @foreach ($dataorder as $key)
                <tr>
                    <td width="20%">Kode Order</td>
                    <td>
                        {{ $key->kdorder }}
                    </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>{{ 'Rp.' . number_format($key->total, 0, ',', '.') }}

                    </td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>


                        @if ($key->status == '1')
                            <p style='color: blue'>Sudah Bayar</p>
                        @else
                            <p style='color: red'>Belum Bayar</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Bukti Pembayaran</td>
                    <td>
                      <input class="form-control" type="file" value="{{ old('filefoto') }}" name="filefoto"
                      id="filefoto">
                    </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="hidden" name="kdorder" value="{{ $key->kdorder }}">
                    <input type="hidden" name="total" value="{{ $key->total }}">
                <button type="submit" class="btn btn-primary">Submit</button>
                  </td>
                </tr>
                    

                @php $i++ @endphp
            @endforeach
            </tbody>
        </table>
        </form>
    </div>
@endsection
