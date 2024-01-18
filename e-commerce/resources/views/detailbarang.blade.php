@extends('dashboard')
@section('content')
    <div class="container">
        <legend>Detail Barang</legend>

        <style type="text/css" media="screen">
            * {
                padding: 0;
                margin: 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                padding: 15px;
            }

            .modal-dialog {
                max-width: 400px;
            }

            .wrap-modal-slider {
                padding: 0 30px;
                opacity: 0;
                transition: all 0.3s;
            }

            .wrap-modal-slider.open {
                opacity: 1;
            }

            .slick-prev:before,
            .slick-next:before {
                color: red;
            }
        </style>


        <script type="text/javascript">
            $(document).ready(function() {
                $('.your-class').slick();
            });

            $('.modal').on('shown.bs.modal', function(e) {
                $('.your-class').slick('setPosition');
                $('.wrap-modal-slider').addClass('open');
            })
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <?php $i=1;
	foreach ($barang as $key) { 
$foto=$key->foto;
        ?>
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="img-responsive" id="viewgambar"><img src="{{ asset('assets/inventory/' . $key->foto) }}"
                        width="350px"></div>
                <?php foreach ($key->get_foto as $key2 ) {
        ?>

                <a data-toggle="modal" data-target="#global-modal">
                    <div class="img-thumbnail img-responsive" style="width: 75px" id="view_<?php echo $key2->kdfoto; ?>"><img
                            src="{{ asset('assets/inventory/' . $key2->foto) }}" class="img-responsive"></div>
                </a>



                <?php } ;?>
            </div>
            <div class="col-md-12 col-lg-8">
                <?php echo $key->kdbarang; ?><br>
                <h5 style="font-size: 18px; color: #1c168a"><?php echo $key->namabarang; ?></h5>
                <?php echo $key->deskripsi; ?><br><br>
                Stok :<?php echo $key->stok; ?><br>
                <h5 style="font-size: 18px; color: red"> Price : Rp. <?php echo number_format($key->hargajual); ?></h5><br>
                <a href="{{ route('keranjang.tambahkeranjang', $key->kdbarang) }}">
                    <div id='soalBtn' class='btn btn-warning btn-sm' title="Masukkan Keranjang"><span
                            class='glyphicon glyphicon-shopping-cart'></span> Masukkan Kerangjang</div>
                </a>

            </div>
        </div>
        <?php $i++; } ?>
        <br>
        <button class='btn btn-info btn-sm' onclick="goBack()"><span
                class="glyphicon glyphicon-chevron-left"></span></button>
        <br>
        <br>

        <div class="modal fade" id="global-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!--Modal Content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                @php $i=1; @endphp
                                @foreach ($key->get_foto as $key2)
                                    <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
                                    @php $i++; @endphp
                                @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('assets/inventory/' . $foto) }}" alt="">
                                </div>
                                @foreach ($key->get_foto as $key2)
                                    <div class="item">
                                        <img src="{{ asset('assets/inventory/' . $key2->foto) }}" alt="">
                                    </div>
                                @endforeach

                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
