
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>@yield('title') - @if($SiteOptions != null) {{ $SiteOptions->name }} @endif</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Favicon-->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	
	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/bootstrap.min.css">
	
	<!-- IconFont -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/iconfonts.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/font-awesome.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/owl.theme.default.min.css">
	<!-- magnific -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/magnific-popup.css">

	<!-- Template styles-->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/responsive.css">
	
	<!-- Colorbox -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/colorbox.css">
	
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('/blog') }}/css/custom.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
	
<body>
	{{-- <div class="trending-bar trending-light d-md-block">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-9 text-center text-md-left">
					<p class="trending-title"><i class="tsicon fa fa-bolt"></i> Trending Now</p>
					<div id="trending-slide" class="owl-carousel owl-theme trending-slide">
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="#">The best MacBook Pro alternatives in 2017 for Apple users</a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item 1 end -->
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="#">Soaring through Southern Patagonia with the Premium Byrd drone</a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item 2 end -->
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="#">Super Tario Run isn’t groundbreaking, but it has Mintendo charm</a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item 3 end -->
					</div><!-- Carousel end -->
				</div><!-- Col end -->
				<div class="col-md-3 text-md-right text-center">
					<div class="ts-date">
						<i class="fa fa-calendar-check-o"></i>May 29, 2017
					</div>
				</div><!-- Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</div><!--/ Trending end --> --}}

	<!-- Header start -->
	<header id="header" class="header">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-md-3 col-sm-12">
					<div class="logo">
						@include('layouts.blog.partial.logo')
					</div>
				</div><!-- logo col end -->

				<div class="col-md-8 col-sm-12 header-right">
					<div class="ad-banner float-right">
						<a href="#">
							<img src="{{ asset('/blog') }}/images/banner-image/image1.png" class="img-fluid" alt="">
						</a>
					</div>
				</div><!-- header right end -->
			</div><!-- Row end -->
		</div><!-- Logo and banner area end -->
	</header><!--/ Header end -->

	@include('layouts.blog.partial.nav')
	
	<div class="gap-30"></div>

	<section class="main-content pt-0">
		<div class="container">
			<div class="row ts-gutter-30">
                @yield('master')
			</div><!-- row end -->
		</div><!-- container end -->
	</section><!-- category-layout end -->

	@include('layouts.blog.partial.footer')
	
		<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script src="{{ asset('/blog') }}/js/jquery.js"></script>
	<!-- Popper Jquery -->
	<script src="{{ asset('/blog') }}/js/popper.min.js"></script>
	<!-- Bootstrap jQuery -->
	<script src="{{ asset('/blog') }}/js/bootstrap.min.js"></script>
	<!-- magnific-popup -->
	<script src="{{ asset('/blog') }}/js/jquery.magnific-popup.min.js"></script>
	<!-- Owl Carousel -->
	<script src="{{ asset('/blog') }}/js/owl.carousel.min.js"></script>
	<!-- Color box -->
	<script src="{{ asset('/blog') }}/js/jquery.colorbox.js"></script>
	<!-- Template custom -->
	<script src="{{ asset('/blog') }}/js/custom.js"></script>

</body>

</html>