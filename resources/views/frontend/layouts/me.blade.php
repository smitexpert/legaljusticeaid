<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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


<!-- Fav Icon -->
<link rel="shortcut icon" href="{{ url('frontend') }}/favicon.ico">

<!-- Bootstrap -->
<link href="{{ url('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ url('frontend') }}/rs-plugin/css/settings.css">
<link href="{{ url('frontend') }}/css/font-awesome.css" rel="stylesheet">
<link href="{{ url('frontend') }}/css/owl.carousel.css" rel="stylesheet">
<link href="{{ url('frontend') }}/css/style.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
@stack('styles')
</head>
<body>

<!-- Topbar Start-->
<div id="topbar" class="site-topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <ul class="bar-info">
          <li><a href="tel:@if($SiteOptions != null){{ $SiteOptions->phone }}@else{{ '000000000' }}@endif"><i class="fa fa-phone"></i>@if($SiteOptions != null){{ $SiteOptions->phone }}@else Please Add Phone. @endif</a></li>
          <li><a href="mailto:@if($SiteOptions != null){{ $SiteOptions->email }}@else{{ 'sm@mail.com' }}@endif"><i class="fa fa-envelope-o" aria-hidden="true"></i>@if($SiteOptions != null){{ $SiteOptions->email }}@else Please Add Email. @endif</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-4">
        <ul class="topbar-links">
          @auth
          <li><a href="{{ url('dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i> Dashboard</a></li>
          @else
          <li><a href="{{ url('login') }}"><i class="fa fa-lock" aria-hidden="true"></i> LOGIN</a></li>
          <li><a href="{{ url('register') }}"><i class="fa fa-user" aria-hidden="true"></i> Register</a></li>
          @endauth
          
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Topbar End --> 

<!-- Header Start-->
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-3">
        <div class="logo"> <a href="{{ url("/") }}"><img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->logo }}@else{{ asset("uploaded/logo/default-logo.jpg") }}@endif" alt=""/> </a></div>
      </div>
      <div class="col-md-8 col-sm-9">
        <div class="navigationwrape">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse">
              {{-- <ul class="nav navbar-nav">
                <li> <a href="index.html" class="active"> Home </a></li>
                <li> <a href="about.html"> About </a></li>
                <li> <a href="service.html"> services </a></li>
                <li class="dropdown"> <a href="#"> Pages <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li> <a href="practice-area.html"> Practice Area </a></li>
                    <li> <a href="practice-details.html"> Practice Area Details </a></li>
                    <li> <a href="case-results.html"> Case Result </a></li>
                    <li> <a href="case-details.html"> Case Result Details </a></li>
                    <li> <a href="attorney.html"> Attorney </a></li>
                    <li> <a href="attorney-list.html"> Attorney List </a></li>
                    <li> <a href="attorney-details.html"> Attorney Details </a></li>
                    <li> <a href="login.html"> Login </a></li>
                    <li> <a href="register.html"> Register </a></li>
                    <li> <a href="appointment.html"> Appointment </a></li>
                    <li> <a href="testimonial.html"> Testimonials </a></li>
                    <li> <a href="faqs.html"> FAQs </a></li>
                    <li> <a href="404.html"> 404 </a></li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="blog.html"> Blog <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li> <a href="blog-grid.html"> Blog Grid</a></li>
                    <li> <a href="blog.html"> Blog List</a></li>
                    <li> <a href="blog-grid2.html"> Blog Grid 2 </a></li>
                    <li> <a href="blog-details.html"> Blog Details </a></li>
                    <li> <a href="blog-details2.html"> Blog Details 2 </a></li>
                  </ul>
                </li>
                <li> <a href="contact.html"> Contact Us</a></li>
              </ul> --}}
              <ul class="nav navbar-nav">
                  <li> <a href="{{ url("/") }}" class="{{ request()->is('/') ? 'active' : '' }}"> Home </a></li>
                  <li> <a href="{{ url("lawyers") }}" class="{{ request()->is('lawyers') ? 'active' : '' }}"> Find A Lawyer </a></li>
                  <li> <a href="service.html"> services </a></li>
                  <li> <a href="{{ url("blogs") }}" class="{{ request()->is('blogs') ? 'active' : '' }}"> Blogs </a></li>
                  <li> <a href="{{ url("advices") }}" class="{{ request()->is('advices') ? 'active' : '' }}"> Legal Advice </a></li>
                  <li> <a href="about.html"> About </a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Header End--> 

@yield('content')

<!-- footer start -->

<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="left-col">
          <div class="footer-logo"><img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->footer_logo }}@else{{ asset("uploaded/logo/default-footer-logo.jpg") }}@endif" alt=""></div>
          <p>@if($SiteOptions != null){{ $SiteOptions->description }}@else Please Add Site Descriptions. @endif</p>
          <ul class="footer-icons">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-nav">
          <li><a href="index.html">Home</a></li>
          <li><a href="practice-area.html">Practice Areas</a></li>
          <li><a href="attorney.html">Attorneys</a></li>
          <li><a href="testimonial.html">Testomonials</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact US</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="footer-heading">Practice Areas</div>
        <ul class="footer-nav">
          @foreach (App\PracticeArea::limit(5)->get() as $item)
            <li><a href="{{ url("lawyers/practice-areas") }}/{{ $item->slug }}">{{ $item->name }}</a></li>
          @endforeach
          
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="footer-heading">Courts</div>
        <ul class="footer-nav">
            @foreach (App\Court::limit(5)->get() as $item)
              <li><a href="{{ url("lawyers/courts") }}/{{ $item->slug }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
      </div>
    </div>
    <div class="footer-service">
      <div class="copyright">Copyright © {{ date("Y") }} <a href="{{ url("/") }}">@if($SiteOptions != null){{ $SiteOptions->name }}@else{{ "Add Site Name" }}@endif</a>, All Rights Reserved | Developed By <a target="_blank" href="https://behance.net/smitexpert"><i>Sujan Molla</i></a></div>
    </div>
  </div>
</div>

<!-- footer end --> 

<!--page scroll start-->
<div class="page-scroll scrollToTop"><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></div>
<!--page scroll start-->

<!--page scroll start-->
<div class="page-scroll scrollToTop"><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></div>
<!--page scroll start-->


<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{ url('frontend') }}/js/jquery-2.1.4.min.js"></script> 
<script src="{{ url('frontend') }}/js/bootstrap.min.js"></script> 
<!-- Load JS siles --> 
<script src="{{ url('frontend') }}/js/owl.carousel.js"></script> 
<!-- SLIDER REVOLUTION SCRIPTS  --> 
<script src="{{ url('frontend') }}/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script src="{{ url('frontend') }}/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- general script file --> 
<script src="{{ url('frontend') }}/js/script.js"></script> 

 @stack('scripts')

</body>

</html>