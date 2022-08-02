<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('content-titel')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    {{-- <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<header class="header trans_300">

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">VẬN CHUYỂN MIỄN PHÍ TRÊN TẤT CẢ CÁC ĐƠN HÀNG Ở Hoa Kỳ TRÊN $ 50
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->
                            @if (Auth::user())
                                <li class="account">
                                    <a href="#">
                                        {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="#"><i class="fa-solid fa-address-card"></i>Profile</a></li>
                                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-in"
                                                    aria-hidden="true"></i>logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"
                                                    aria-hidden="true"></i>Sign
                                                In</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"
                                                    aria-hidden="true"></i>Register</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">colo<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="../../san-pham">Sản phẩm</a></li>
                            <li><a href="../../lien-he"> Liên hệ</a></li>
                        </ul>
                        <ul class="navbar_user">
                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <li class="checkout">
                                <a href="{{ route('cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    @if (Auth::user())
                                        <span id="checkout_items"
                                            class="checkout_items">{{ count($count_giohang) }}</span>
                                    @else
                                        <span id="checkout_items" class="checkout_items"></span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
<br>
<br>
@yield('content')
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div
                    class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div
                    class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a
                            href="https://themewagon.com">ThemeWagon</a></div>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js1/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('js1/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('js1/bootstrap.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('js1/plugins.js') }}"></script>
<!-- Classy Nav js -->
<script src="{{ asset('js1/classy-nav.min.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('js1/active.js') }}"></script>
