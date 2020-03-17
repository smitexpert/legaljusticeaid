<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <a href="#">
                            <img src="{{ url('site') }}/assets/images/legal-justice-aid.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="date">
                        <p><strong><span class="fas fa-map-marker-alt"></span> Dhaka</strong> 12 March - 2020</p>
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
                    <li><a class="active" href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
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
                <a href="#">
                    <img src="{{ url('site') }}/assets/images/legal-justice-aid.png" alt="">
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
                    <h2><a href="#">Legal Justice Aid</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum facere obcaecati excepturi?</p>
                </div>
                <div class="site_contact">
                    <address>
                        <span class="fa fa-map-marker"></span> Lorem ipsum dolor sit amet.
                    </address>
                    <ul>
                        <li><a href="#"><span class="fa fa-phone-alt"></span> 01700000000</a></li>
                        <li><a href="#"><span class="fa fa-envelope"></span> 01700000000</a></li>
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
                        <a href="#">Site Name</a> @ 2020 || Developed BY <a href="#">Sujan Molla</a>
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