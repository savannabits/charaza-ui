<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Finance HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="manifest" href="site.webmanifest">--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('assets/brand/logo-dark.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header  header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{url('')}}"><img height="70" src="{{asset('assets/brand/banner-black.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('welcome')}}">Home</a></li>
                                        <li><a href="{{url('about')}}">About</a></li>
                                        <li><a href="{{url('services')}}">Services</a></li>
                                        <li><a href="{{url('contact')}}">Contact</a></li>
                                        @auth
                                            <li><a href="{{url('home')}}">My Dashboard</a></li>
                                        @endauth
                                        @guest
                                            <li><a href="{{route('login')}}">Login</a></li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="#" class="btn header-btn">+254 xxx xxx xxx</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    @yield('content')
</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{url('')}}"><img src="{{asset('assets/brand/banner-white-brown.png')}}" height="100" alt=""></a>
                                </div>
                                <div class="footer-pera">
                                    <p>Heaven fruitful doesn't over lesser days appear creeping seasons so behold bearing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Link</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Offers & Discounts</a></li>
                                    <li><a href="#">Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#">Man Accessories</a></li>
                                    <li><a href="#">Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p class="p-0 m-0" style="font-size: 1px!important;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            <p class="font-weight-bold text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Charaza Loans | developed by <a href="https://savannabits.com">Savannabits &TRADE;</a> </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


<!-- JS here -->
<!-- All JS Custom Plugins Link Here here -->
<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/animated.headline.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>

<!-- Nice-select, sticky -->
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('frontend/js/contact.js')}}"></script>
<script src="{{asset('frontend/js/jquery.form.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/js/mail-script.js')}}"></script>
<script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>
