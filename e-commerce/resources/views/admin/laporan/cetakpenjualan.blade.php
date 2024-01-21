@extends('admin.dashboard')
@section('content')
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <style type="text/css" media="screen">
        .judul {
            display: none;
        }

        .action {
            display: none;
        }

        /* memberikan border pada tabel */
        .table {
            border: 2px solid black;
            padding: 3px;
            font-size: 12px
        }
    </style>
    <div id="area-print">
        <div class="container">
            <legend>Laporan Penjualan dari tanggal <?php echo date('d-m-Y', strtotime($tglawal)) . ' sampai ' . date('d-m-Y', strtotime($tglakhir)); ?></legend>
            <br>
            <table class="table table-striped " style="font-size: 11px">
                <thead>
                    <tr>
                        <th>
                            No Order
                        </th>
                        <th>
                            Nama Member
                        </th>
                        <th>
                            Tgl. Order
                        </th>
                        <th style="text-align:center;">
                            Total
                        </th>
                        <th>
                            Tanggal Selesai
                        </th>
                        <th>
                            Status Order
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
    $total=0;
		foreach ($dataorder as $key) { 
      ?>
                    <tr>
                        <td>
                            <?php echo $key->kdorder; ?>
                        </td>
                        <td>
                            <?php echo $key->get_member->namamember; ?>
                        </td>
                        <td>@if (!empty($key->tglorder))
                            <?php echo date('d-m-Y', strtotime($key->tglorder)); ?>
                            @endif
                        </td>

                        <td style="text-align: center;"><?php echo 'Rp. ' . number_format($key->total, 0, ',', '.');
                        $total = $total + $key->total; ?>

                        </td>
                        <td>@if (!empty($key->tglverifikasi))
                            <?php echo 'Tgl.Verifikasi ';
                            echo date('d-m-Y', strtotime($key->tglverifikasi)); ?>
                            @endif
                        </td>
                        <td>
                            <?php
                            
                            if ($key->f_proses == '0') {
                                echo "<p style='color: blue'>Belum diproses</p>";
                            } elseif ($key->f_proses == '1') {
                                echo "<p style='color: red'>Dikemas</p>";
                            } elseif ($key->f_proses == '2') {
                                echo "<p style='color: red'>Dikirimkan</p>";
                            
                            } elseif ($key->f_proses == '3') {
                                echo "<p style='color: red'>Diterima</p>";
                            }
                            
                            ?>

                        </td>

                    </tr>


                    <?php $i++; } ?>
                    <tr>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                            Total Penjualan
                        </th>
                        <th style="text-align: center;">
                            <?php echo 'Rp. ' . number_format($total, 0, ',', '.'); ?>
                        </th>
                        </th>
                        <th width="40%">
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <br>
    <div style="text-align: center;"><button type="button" class="btn btn-primary" id="cetak"
            onclick="printDiv('area-print')">Cetak </button></div>
@endsection
