<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (trim($__env->yieldContent('title')))
        @yield('title') -
        @endif
        @if($SiteOptions != null)
        {{ $SiteOptions->name }}
        @else
        {{ "Site Name" }}
        @endif
    </title>
    <link rel="stylesheet" href="{{ url('site') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('site') }}/assets/fonts/css/all.min.css">
    <link rel="stylesheet" href="{{ url('site') }}/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="{{ url('site') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('site') }}/assets/css/slickstyle.css">
</head>
<body>
    
    <!-- Header Section Start -->
    <section class="section header" id="top">
        <div class="container">
            <div class="header_item">
                <div class="item">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->logo }}@else{{ asset("uploaded/logo/default-logo.jpg") }}@endif" alt="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="date">
                        <p>{{ date('d F - Y', strtotime(now())) }}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="social">
                        <ul>
                            <li><a style="background-color: #3b5998;" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a style="background-color: #00aced;" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a style="background-color: #d34836;" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a style="background-color: #c4302b;" href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Navigation Section Start -->
    <section class="section navigation">
        <div class="container">
            <nav>
                <ul id="menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/lawyers') }}">Find a Lawyer</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a class="active" href="{{ url('/blogs') }}">Blogs</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- Ads 1 Section Start -->
    <section class="section ads_one">
        <div class="container">
            
            <h4>Ads Space</h4>
        </div>
    </section>
    @yield('content')
 
 <!-- Logo And Apps Section Start -->
 <section class="section partial">
    <div class="container">
        <div class="items">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->logo }}@else{{ asset("uploaded/logo/default-logo.jpg") }}@endif" alt="">
                </a>
            </div>
            <div class="google_play">
                <a href="#">
                    <img src="{{ url('site') }}/assets/images/google_play.png" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section Start -->
<section class="section footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="site_information">
                    <h2><a href="{{ url('/') }}">
                        @if($SiteOptions != null)
                        {{ $SiteOptions->name }}
                        @else
                        {{ "Site Name" }}
                        @endif
                    </a></h2>
                    <p>@if($SiteOptions != null){{ $SiteOptions->description }}@else Please Add Site Descriptions. @endif</p>
                </div>
                <div class="site_contact">
                    <address>
                        <span class="fa fa-map-marker"></span> @if($SiteOptions != null)<span>{{ $SiteOptions->address }}</span>@else{{ 'Please Add Address' }}@endif
                    </address>
                    <ul>
                        <li><a href="tel:@if($SiteOptions != null){{ $SiteOptions->phone }}@else{{ '000000000' }}@endif"><span class="fa fa-phone-alt"></span> @if($SiteOptions != null){{ $SiteOptions->phone }}@else{{ '000000000' }}@endif</a></li>
                        <li><a href="mailto:@if($SiteOptions != null){{ $SiteOptions->email }}@else{{ 'sm@mail.com' }}@endif"><span class="fa fa-envelope"></span> @if($SiteOptions != null){{ $SiteOptions->email }}@else{{ 'sm@mail.com' }}@endif</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="float-right">
                    <ul class="social-footer">
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="footer-creadit">
                        <a href="{{ url('/') }}">
                            @if($SiteOptions != null)
                            {{ $SiteOptions->name }}
                            @else
                            {{ "Site Name" }}
                            @endif
                        </a> @ {{ date('Y') }} || Developed BY <a href="#">Sujan Molla</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="back-to-top">
    <div class="icon">
        <a href="#top"><span class="fas fa-angle-up"></span></a>
    </div>
</div>

<script src="{{ url('site') }}/assets/js/jquery-3.4.1.min.js"></script>
<script src="{{ url('site') }}/assets/js/popper.min.js"></script>
<script src="{{ url('site') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ url('site') }}/assets/js/jquery.slicknav.min.js"></script>
<script src="{{ url('site') }}/assets/js/custom.js"></script>
</body>
</html>