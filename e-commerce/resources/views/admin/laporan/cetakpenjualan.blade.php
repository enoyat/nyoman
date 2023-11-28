@extends('admin.dashboard')
@section('content')   

<div class="container">
 <legend>Laporan Penjualan dari tanggal <?php echo date ("d-m-Y", strtotime ($tglawal))." sampai ".date ("d-m-Y", strtotime ($tglakhir));?></legend> 
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
          <td>
              <?php echo date("d-m-Y", strtotime($key->tglorder)); ?>       
          </td>

          <td style="text-align: center;"><?php echo "Rp. ".number_format($key->total,0,',','.');
          $total=$total+$key->total; ?>

        </td>
          <td>
            <?php echo 'Tgl.Verifikasi ';
           echo date("d-m-Y", strtotime($key->tglverifikasi)); ?>
         </td>        
          <td>
                        <?php 

          if ($key->f_proses=="0") {
              echo "<p style='color: blue'>Belum diproses</p>";

          }
          else if ($key->f_proses=="1") {
            echo "<p style='color: red'>Dikemas</p>";
          }
          else if ($key->f_proses=="2") {
            echo "<p style='color: red'>Dikirimkan</p>";
             

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
        <?php echo "Rp. ".number_format($total,0,',','.'); ?>
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
@endsection

