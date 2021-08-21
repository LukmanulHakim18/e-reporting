<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>E - Reporting</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('assetsFront/images/favicon.png')}}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('assetsFront/css/animate.css')}}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('assetsFront/css/LineIcons.2.0.css')}}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('assetsFront/css/bootstrap-4.5.0.min.css')}}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('assetsFront/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('assetsFront/css/style.css')}}">

</head>

<body>


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{asset('assetsFront/images/fish_logo.png')}}" style="width: 60px;" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#facts">Why</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#blog">Blog</a> -->
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                @if (Route::has('login'))
                                @auth
                                <a class="main-btn" data-scroll-nav="0" href="{{ url('/dashboard') }}" rel="nofollow">Dashboard</a>
                                @else
                                <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}" rel="nofollow">Login</a>

                                @endif
                                @endif
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover" style="background-image: url({{asset('assetsFront/images/banner-bg.svg')}})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">E-RESOURCE</h3>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">POTENSI PERIKANAN KUANTAN SINGINGI</p>
                            <a href="#" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Get Started</a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="{{ asset('assetsFront/images/header-hero.png') }}" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Features, <span>Menampilkan data data terkait pendapatan penambak ikan!</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <livewire:report-chart :tahun="2019" />
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-6 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('assetsFront/images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('assetsFront/images/services-shape-2.svg')}}" alt="shape">
                            <i class="lni lni-cog"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Robust</a></h4>
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.</p>
                            <a class="more" href="#">Learn More <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-6 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('assetsFront/images/services-shape.svg')}}" alt="shape">
                            <img class="shape-1" src="{{asset('assetsFront/images/services-shape-3.svg')}}" alt="shape">
                            <i class="lni lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Powerful</a></h4>
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.</p>
                            <a class="more" href="#">Learn More <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">E-RESOURCE<span> POTENSI PERIKANAN KUANTAN SINGINGI</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, seiam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.</p>
                        <a href="#" class="main-btn">Try it Free</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('assetsFront/images/about1.svg')}}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{asset('assetsFront/images/about-shape-1.svg')}}" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="{{asset('assetsFront/images/about-shape-2.svg')}}" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-last">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Modern design <span> with Essential Features</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, seiam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.</p>
                        <a href="#" class="main-btn">Try it Free</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('assetsFront/images/about2.svg')}}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Crafted for</span> SaaS, App and Software Landing Page</h3>
                        </div> <!-- section title -->
                        <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, seiam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.</p>
                        <a href="#" class="main-btn">Try it Free</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('assetsFront/images/about3.svg')}}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{asset('assetsFront/images/about-shape-1.svg')}}" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->


    <!--====== ABOUT PART ENDS ======-->

    <!--====== VIDEO COUNTER PART START ======-->

    <section id="facts" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="{{asset('assetsFront/images/dots.svg')}}" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <img src="{{asset('assetsFront/images/video.png')}}" alt="video">
                            </div>
                            <div class="video-icon">
                                <a href="https://www.youtube.com/watch?v=r44RKWyfcFw" class="video-popup"><i class="lni lni-play"></i></a>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Cool facts <span> about this app</span></h3>
                            </div> <!-- section title -->
                            <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, seiam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">125</span>K</span>
                                        <p class="text">Downloads</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">87</span>K</span>
                                        <p class="text">Active Users</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">4.8</span></span>
                                        <p class="text">User Rating</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== VIDEO COUNTER PART ENDS ======-->





    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">Subscribe Our Newsletter <span>get reguler updates</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form mt-50">
                            <form action="#">
                                <input type="text" placeholder="Enter eamil">
                                <button class="main-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- subscribe area -->
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                <img src="{{asset('assetsFront/images/fish_logo.png')}}" style="width: 60px;" alt="logo">
                            </a>
                            <p class="text">Lorem ipsum dolor sit amet consetetur sadipscing elitr, sederfs diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Road Map</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Resources</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Contact Us</h4>
                            </div>
                            <ul class="contact">
                                <li>+809272561823</li>
                                <li>info@gmail.com</li>
                                <li>www.yourweb.com</li>
                                <li>123 Stree New York City , United <br> States Of America 750.</li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Designed By <a href="https://uideck.com" rel="nofollow">UIdeck</a>, and Developed by <a href="https://lukmanulhakim18.github.io/LukmanulHakim18.io/" rel="nofollow">Ogriv</a></p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="{{asset('assetsFront/js/vendor/jquery-3.5.1-min.js')}}"></script>
    <script src="{{asset('assetsFront/js/vendor/modernizr-3.7.1.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('assetsFront/js/popper.min.js')}}"></script>
    <script src="{{asset('assetsFront/js/bootstrap-4.5.0.min.js')}}"></script>

    <!--====== Plugins js ======-->
    <script src="{{asset('assetsFront/js/plugins.js')}}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{asset('assetsFront/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assetsFront/js/jquery.counterup.min.js')}}"></script>



    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('assetsFront/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assetsFront/js/scrolling-nav.js')}}"></script>

    <!--====== wow js ======-->
    <script src="{{asset('assetsFront/js/wow.min.js')}}"></script>

    <!--====== Particles js ======-->
    <script src="{{asset('assetsFront/js/particles.min.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('assetsFront/js/main.js')}}"></script>

</body>

</html>