@extends('layouts.frontend')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area slider-height" data-background="{{asset('frontend/img/hero/h1_hero.jpg')}}">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider">
                <div class="slider-cap-wrapper">
                    <div class="hero__caption">
                        <p data-animation="fadeInLeft" data-delay=".2s">Slide One</p>
                        <h1 data-animation="fadeInLeft" data-delay=".5s">Slide Caption here.</h1>
                        <!-- Hero Btn -->
                        <a href="{{route('dashboard')}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay=".8s">Get Started</a>
                    </div>
                    <div class="hero__img">
                        <img src="{{asset('frontend/img/hero/hero_img.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider">
                <div class="slider-cap-wrapper">
                    <div class="hero__caption">
                        <p data-animation="fadeInLeft" data-delay=".2s">Slide Two</p>
                        <h1 data-animation="fadeInLeft" data-delay=".5s">Slide Caption Here.</h1>
                        <!-- Hero Btn -->
                        <a href="{{route('dashboard')}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay=".8s">Know More</a>
                    </div>
                    <div class="hero__img">
                        <img src="{{asset('frontend/img/hero/hero_img2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-footer Start -->
        <div class="slider-footer section-bg d-none d-sm-block">
            <div class="footer-wrapper">
                <!-- single -->
                <div class="single-caption">
                    <div class="single-img">
                        <img src="{{asset('frontend/img/hero/hero_footer.png')}}" alt="">
                    </div>
                </div>
                <!-- single -->
                <div class="single-caption">
                    <div class="caption-icon">
                        <span class="flaticon-clock"></span>
                    </div>
                    <div class="caption">
                        <p>Feature One</p>
                    </div>
                </div>
                <!-- single -->
                <div class="single-caption">
                    <div class="caption-icon">
                        <span class="flaticon-like"></span>
                    </div>
                    <div class="caption">
                        <p>Feature Two</p>
                    </div>
                </div>
                <!-- single -->
                <div class="single-caption">
                    <div class="caption-icon">
                        <span class="flaticon-money"></span>
                    </div>
                    <div class="caption">
                        <p>Feature Three</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-footer End -->

    </div>
    <!-- slider Area End-->
    <!-- About Law Start-->
    <div class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span>Section II</span>
                            <h2>Caption Here.</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, oeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eniminixm, quis nostrud exercitation ullamco laboris nisi ut aliquip exeaoauat. Duis aute irure dolor in reprehe.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, oeiusmod tempor incididunt ut labore et dolore magna aliq.</p>
                        <a href="{{route('dashboard')}}" class="btn">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{asset('frontend/img/gallery/about2.png')}}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="{{asset('frontend/img/gallery/about1.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Law End-->
    <!-- Services Area Start -->
    <div class="services-area pt-150 pb-150" data-background="{{asset('frontend/img/gallery/section_bg02.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Services that we are providing</span>
                        <h2>High Performance Services For All Industries.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-work"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="{{url('services')}}">Product 1</a></h5>
                            <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-loan"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="{{url('services')}}">Product 2</a></h5>
                            <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-loan-1"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="{{url('services')}}">Product 3</a></h5>
                            <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-like"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="{{url('services')}}">Business Loan</a></h5>
                            <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services Area End -->
@endsection
