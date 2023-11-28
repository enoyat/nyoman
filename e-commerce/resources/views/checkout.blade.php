@extends('dashboard')
@section('content')
  <script type="text/javascript">
            $(document).ready(function(){
                $('#freekirim').hide();
                $('#jasakurir').hide();
            });


 </script>
<div class="col-md-12 col-lg-5">
  
 <?php $i=1;
    $total=0;
    $totberat=0; ?>

    @foreach ($dataorder as $key)
    <?php 
    $totberat=$key->totberat; 
    $total=$key->total; 
    
    ?>
        <form class="form-horizontal" method="post" action="{{ route('checkout.order') }}">
          @csrf
          <div class="form-group">
            <label >No.Order</label>
            <input type="text" class="form-control" id="kdorder" placeholder="Kode order" value="{{  $key->kdorder }}   " readonly>
          </div>
          <div class="form-group">
            <label >Tgl.Order</label>
            <input type="text" class="form-control" id="kdorder" placeholder="Kode order" value="{{  date("d-m-Y", strtotime($key->tglorder)) }}      " readonly>
          </div>
          <div class="form-group">
            <label >Nama Penerima </label><i> (silahkan diganti jika nama penerima berbeda) </i>
            <input type="text" name="penerima" id="inputpenerima" value="{{  $key->namamember }} " required="required" title="" class="form-control">
          </div>
          <div class="form-group">
            <label >Alamat Pengiriman </label><i> (silahkan ganti jika alamat berbeda)</i>
            <textarea name="alamatpenerima" cols="50" rows="3" class="form-control">{{  $key->alamat }} </textarea>
          </div>         
          <div class="form-group">
            <label >Pesanan</label>
            <div class="img-responsive" id="viewgambar"><img src="{{ asset('assets/inventory/'.$key->foto) }}"  height="80px">
              <?php echo $key->namabarang; ?>
              

            </div>            
          </div>
           <div class="form-group">
            <label >Sub Total Produk</label>
            <input type="text" class="form-control" id="kdorder" placeholder="Kode order" value="{{  "Rp".number_format($key->total,0,',','.') }}  " readonly style="text-align:right;">
          </div>         
          <div class="form-group">
              <label >Sub Total Berat Produk (gr)</label>
              <input type="text" name="berat" id="berat" size=10 value="<?php echo $totberat; ?>" required="required" title="" readonly style="text-align: right;" class="form-control">
          </div>         
          <div class="form-group">
            <label >Metode Pengiriman</label>
            <select name="metodekirim" id="metodekirim" class="form-control" required="required">
                    <option value="">== Metode Pengiriman ==</option>
                    <option value="FREE">Free Kirim (Area Jogyakarta Kota)</option>
                    <option value="KIRIM">Jasa Kurir (Pengiriman) </option>

                  </select>
          </div>
          <div class="form-group" id="freekirim">
            <label >Non Kirim (area Jogjakarta kota)</label>
          </div>
          <div class="form-group" id="jasakurir">
                <label >Propinsi</label>
                <select name="kdpropinsi" id="kdpropinsi" class="form-control" >
                      <option value="">== Propinsi tujuan == </option>

                      <?php 
                      foreach ($datapropinsi as $cty) {
                      ?>
                              <option value="<?php echo $cty->province_id;?>"><?php echo $cty->province;?></option>
                      <?php       
                      }
                      ?>
                 </select> 

                <label >kota</label>
                <select name="kdkota" id="kdkota" class="form-control">
                  <option value="">== kota tujuan == </option>
                </select> 

                <label >Kurir</label>
                    <select name="kdkurir" id="kdkurir" class="form-control" >
                      <option value="">== Kurir  == </option>
                      <option value="jne">JNE</option>
                      <option value="jnt">TIKI</option>
                      <option value="pos">POS</option>

                </select>
                <label >Paket</label>
                <select name="kdtarif" id="kdtarif" class="form-control">
                  <option value="">== Tarif == </option>
                </select>     
                <label >Ongkir</label>
                <input style="text-align: right;" type="text" name="biayaongkir" id="biayaongkir" class="form-control" value="" required="required"  title="" readonly="" >          



          </div>

          <div class="form-group">
            <label >Jumlah</label>
            <input type="hidden" name="total" id="total" class="form-control" value="<?php  echo  $total; ?>" required="required" title="">
             <input type="text" name="totalview" id="totalview" class="form-control" value="<?php  echo "Rp". number_format($total,0,',','.'); ?>" required="required"  title="" style="text-align:right; font-size: 15px;color:red;" readonly="">   

          </div>

          <div class="form-group">
            <label >Sub Total Pengiriman</label>
          <input type="text" name="biayaongkirview" id="biayaongkirview" class="form-control" value="" required="required"  title="" style="text-align:right; font-size: 15px;color:red;" readonly="">   

          </div>

          <div class="form-group">
            <label >Total Pembayaran</label>
          <input type="hidden" name="totalorder" id="totalorder" class="form-control" value="" required="required"  title="" style="text-align:right;">  
          <input type="text" name="totalorderview" id="totalorderview" class="form-control" value="" required="required"  title="" style="text-align:right; font-size: 24px;color:red;" readonly="">  

          </div>          

          <button type="submit" class="btn btn-danger" onclick="return confirm('Buat Pesanan ?')">BUAT PESANAN</button>

        </form>

      
  <?php $i++; ?>
  @endforeach
<br>
<br>
</div>
<?php
foreach($dataorder as $i):
    $kdorder=$i->kdorder;
?>
  <!-- ============ MODAL HAPUS  =============== -->
<div class="modal fade" id="modal_hapus<?php echo $kdorder; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">No. Order <?php echo $kdorder; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="dashboard/batalorder">
        <div class="modal-body">
           Batalkan Pesanan <?php echo $kdorder; ?> ?
        </div>
        <div class="modal-footer">
            <input type="hidden" name="kdorder" value="<?php echo $kdorder;?>">
            <button class="btn btn-danger">Hapus</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>

<script type="text/javascript">
             $('#metodekirim').change(function(){ 
                            var id=$(this).val();
              if (id=="FREE") {

                $('#freekirim').show();
                $('#jasakurir').hide();
                $('#biayaongkir').val('0');
                $('#biayaongkirview').val(Intl.NumberFormat('de-DE').format('0'));
                hitung();
              }
              else {
                $('#freekirim').hide();
                $('#jasakurir').show();
              }

            });

            $('#kdpropinsi').change(function(){ 
                var province_id = $(this).val();
                var province = $("option:selected","#kdpropinsi").data('nama');
               $('#kdkota').html('');
                var id=$(this).val();
                $.ajax({
                    url : "{{ route('checkout.combokota') }}",
                    data : {id: id},
                    method : "GET",
                    dataType : 'json',
                    success:function(data){
                      var dataCity = '<option value="">- kota -</option>';
                      for(var i = 0; i < data.length; i++){
                          dataCity += '<option value='+data[i].city_id+' data-nama="'+data[i].city_name+'">'+data[i].city_name+'</option>';
                      }
                      $("#kdkota").html(dataCity);
                      $("input[name=kdpropinsi]").val(province);
                    }
                });
                return false;
            });
              $('#kdkota').change(function(){ 
               $('#kdkurir').html('');
                $.ajax({
                    url : "{{ route('checkout.combokurir') }}",
                    method : "GET",
                    dataType : 'json',
                    success:function(data){
                      var datakurir = '<option value="">- Kurir -</option>';
                      for(var i = 0; i < data.length; i++){
                          datakurir += '<option value='+data[i].value+'>'+data[i].nama+'</option>';
                      }
                      $("#kdkurir").html(datakurir);
                    }
                });
                return false;
            });
            $('#kdkurir').change(function(){   
                  $('#kdtarif').html('');                           
                  var mid=$("#kdkota").val();
                  var mberat=$("#berat").val();
                  var mkurir=$("#kdkurir").val();
                  $.ajax({
                    url : "{{ route('checkout.combotarif') }}",
                    data : {id: mid,berat:mberat,kurir:mkurir},
                    method : "GET",
                    dataType : 'json',
                          success:function(data){
                            var cost = data;
                            var dataCost = '<option value="">- Select Package/Cost -</option>';
                            for(var i = 0; i < cost.length; i++){
                              dataCost += '<option value="'+cost[i].cost[0].value+'" data-nama="'+cost[i].service+'">'+cost[i].service+' - '+cost[i].cost[0].value+'</option>';
                            }
                            $("#kdtarif").html(dataCost);
                          }
                });
                return false;
            });

            $('#kdtarif').change(function(){   
                  $('#biayaongkir').val($(this).val());     
                  $('#biayaongkirview').val(Intl.NumberFormat('de-DE').format($(this).val()));                     
                 hitung();
                return false;
            });            
            function hitung() {
                  var total=$("#total").val();
                  var ongkir=$("#biayaongkir").val();
                  var grandtotal=parseInt(total)+parseInt(ongkir); 
                  $('#totalorder').val(grandtotal);                    
                  $('#totalorderview').val("Rp"+Intl.NumberFormat('de-DE').format(grandtotal));  

            };

</script>

@endsection