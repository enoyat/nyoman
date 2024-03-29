<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AMIRA BAKERY</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                @if (!empty($jmlnotifikasi))
                    <li><a href="{{ route('notifikasi') }}" class="link"><i
                                class="fa fa-bell"></i><span>{{ $jmlnotifikasi }}</span></a></li>
                @else
                    <li><a href="{{ route('notifikasi') }}" class="link"><i class="fa fa-bell"></i><span>
                                0</span></a></li>
                @endif

                @if (!empty($jmlkeranjang))
                    <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-bag"></i>
                            <span>{{ $jmlkeranjang }}</span></a></li>
                @else
                    <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-bag"></i> <span>0</span></a>
                    </li>
                @endif


            </ul>

        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            <?php $cek = Auth::user(); ?>
            @if (empty($cek))
                <div class="header__top__right__auth">
                    <a href="/login"><i class="fa fa-user"></i> Login</a>
                </div>
            @else
                <div class="header__top__right__auth">
                    <a href="/logout"><i class="fa fa-user"></i> {{ $cek->email }} - Logout</a>
                </div>
            @endif

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="/">Home</a></li>
                @if (Auth::user())
                    <li><a href="./shop-grid.html"><a href="{{ route('order') }}" class="link"><span
                                    class="glyphicon glyphicon-list-alt"></span> Pesanan Saya <span
                                    style="padding-right: 10px;"></span></a></a></li>
                    {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                    <li><a href="{{ route('order.riwayat') }}" class="link"><span
                                class="glyphicon glyphicon-briefcase"></span> Riwayat Pesanan <span
                                style="padding-right: 10px;"></span></a></li>
                @endif
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> Amira Bakery</li>
                <li>Desa Pacor Rt 01 Rw 05, Kec. Kutoarjo, Kab. Purworejo, Jawa Tengah.</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> Amira Bakery</li>
                                <li>Desa Pacor Rt 01 Rw 05, Kec. Kutoarjo, Kab. Purworejo, Jawa Tengah.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            {{-- <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> --}}
                            <?php $cek = Auth::user(); ?>
                            @if (empty($cek))
                                <div class="header__top__right__auth">
                                    <a href="/login"><i class="fa fa-user"></i> Login</a>
                                </div>
                            @else
                                <div class="header__top__right__auth">
                                    <a href="/logout"><i class="fa fa-user"></i> {{ $cek->email }} - Logout</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" height="50px"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            @if (Auth::user())
                                <li><a href="./shop-grid.html"><a href="{{ route('order') }}" class="link"><span
                                                class="glyphicon glyphicon-list-alt"></span> Pesanan Saya <span
                                                style="padding-right: 10px;"></span></a></a></li>
                                {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                                <li><a href="{{ route('order.riwayat') }}" class="link"><span
                                            class="glyphicon glyphicon-briefcase"></span> Riwayat Pesanan <span
                                            style="padding-right: 10px;"></span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            @if (!empty($jmlnotifikasi))
                                <li><a href="{{ route('notifikasi') }}" class="link"><i
                                            class="fa fa-bell"></i><span>{{ $jmlnotifikasi }}</span></a></li>
                            @else
                                <li><a href="{{ route('notifikasi') }}" class="link"><i
                                            class="fa fa-bell"></i><span> 0</span></a></li>
                            @endif
                            @if (!empty($jmlkeranjang))
                                <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-bag"></i>
                                        <span>{{ $jmlkeranjang }}</span></a></li>
                            @else
                                <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-bag"></i>
                                        <span>0</span></a></li>
                            @endif

                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <div class="container">
        @yield('content')
    </div>


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Desa Pacor Rt 01 Rw 05, Kec. Kutoarjo, Kab. Purworejo, Jawa Tengah.</li>
                            <li>Phone: +62 085740074451</li>
                            <li>Email: amira@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        {{-- <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tentang kami</h6>
                        <p>Kunjungi Media Sosial Kami.</p>

                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/profile.php?id=100054650370228" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/amirabakeryy/"><i class="fa fa-instagram"></i></a>
                            <a href="https://wa.me/6285740074451"><i class="fa fa-whatsapp"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Amira Bakery All rights reserved
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css" media="screen">
            #notifications {
                cursor: pointer;
                position: fixed;
                right: 0px;
                z-index: 9999;
                bottom: 0px;
                margin-bottom: 22px;
                margin-right: 15px;
                min-width: 300px;
            }
        </style>
        <div id="notifications">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" style="text-align: center;">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger" style="text-align: center;">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">
        $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>
</body>

</html>
