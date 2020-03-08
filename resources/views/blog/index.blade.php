
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Digiqole - News Magazine Newspaper HTML Template</title>

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

	

	<!-- post wraper start-->
	<section class="trending-slider pb-0">
		<div class="container">
			<div class="ts-grid-box">
				<h2 class="block-title">
					 <span class="title-angle-shap"> Featured</span>
				</h2>
				<div class="owl-carousel dot-style2" id="trending-slider">
					@foreach ($featured as $item)					
						<div class="item post-overaly-style post-md" style="background-image:url({{ asset('uploaded/post_images') }}/{{ $item->blog_post->cover }})">
							<a href="#" class="image-link">&nbsp;</a>
							<div class="overlay-post-content">
								<div class="post-content">
									<div class="grid-category">
										@foreach ($item->blog_post->category as $category)
											<a class="post-cat sports" href="{{ url('blogs/category') }}/{{ $category->slug }}">{{ $category->name }}</a>
										@endforeach
									</div>

									<h2 class="post-title">
										<a href="#">{{ $item->blog_post->title }} </a>
									</h2>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="fa fa-user"></i> {{ $item->blog_post->user->name }}</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-- Item 1 end -->
					@endforeach
				</div>
				<!-- most-populers end-->
			</div>
			<!-- ts-populer-post-box end-->
		</div>
		<!-- container end-->
	</section>
	<!-- .section -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					@if(App\HomeCategory::where('table_name', 'table_one')->count() > 0)
						<h2 class="block-title">
							<span class="title-angle-shap"> {{ $tableOne->category->name }} </span>
						</h2>
						@foreach ($tableOne->category->home_posts as $post)
							@if($loop->index == 0)
								<div class="post-block-style">
									<div class="row align-items-center">
										<div class="col-md-6">
											<div class="post-thumb">
												<img src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="post-content">
												<h2 class="post-title title-md">
													<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-author"><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></span>
													<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
												</div>
												<p>{{ Str::limit($post->article, 130) }}</p>
											</div>
										</div>
									</div>
								</div>
							@else
								@if($loop->index%2 == 1)
									<div class="gap-30"></div>
									<div class="row">
								@endif
								<div class="col-md-6">
									<div class="list-post-block">
										<ul class="list-post">
											<li>
												<div class="post-block-style media">
													<div class="post-thumb">
														<a href="{{ url('/blogs') }}/{{ $post->slug }}">
															<img class="img-fluid" src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
														</a>
													</div><!-- Post thumb end -->
			
													<div class="post-content media-body">
														{{-- <div class="grid-category">
															<a class="post-cat tech-color" href="#">Tech</a>
														</div> --}}
														<h2 class="post-title">
															<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
														</h2>
														<div class="post-meta mb-7">
															<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
														</div>
														</div><!-- Post content end -->
												</div><!-- Post block style end -->
											</li><!-- Li 1 end -->
										</ul><!-- list-post end -->
									</div>
								</div><!-- col end -->
								@if($loop->index%2 == 0)
									</div>
								@endif
							@endif
						@endforeach
					@else
						<h1>Please Select The Category One From Home Settings</h1>
					@endif
					
					<div class="gap-30"></div>

					@if(App\HomeCategory::where('table_name', 'table_one')->count() > 0)
						<h2 class="block-title">
							<span class="title-angle-shap"> {{ $tableTwo->category->name }} </span>
						</h2>
						@foreach ($tableTwo->category->home_posts as $post)
							@if($loop->index == 0)
								<div class="post-block-style">
									<div class="row align-items-center">
										<div class="col-md-6">
											<div class="post-thumb">
												<img src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="post-content">
												<h2 class="post-title title-md">
													<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-author"><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></span>
													<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
												</div>
												<p>{{ Str::limit($post->article, 130) }}</p>
											</div>
										</div>
									</div>
								</div>
							@else
								@if($loop->index%2 == 1)
									<div class="gap-30"></div>
									<div class="row">
								@endif
								<div class="col-md-6">
									<div class="list-post-block">
										<ul class="list-post">
											<li>
												<div class="post-block-style media">
													<div class="post-thumb">
														<a href="{{ url('/blogs') }}/{{ $post->slug }}">
															<img class="img-fluid" src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
														</a>
													</div><!-- Post thumb end -->
			
													<div class="post-content media-body">
														{{-- <div class="grid-category">
															<a class="post-cat tech-color" href="#">Tech</a>
														</div> --}}
														<h2 class="post-title">
															<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
														</h2>
														<div class="post-meta mb-7">
															<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
														</div>
														</div><!-- Post content end -->
												</div><!-- Post block style end -->
											</li><!-- Li 1 end -->
										</ul><!-- list-post end -->
									</div>
								</div><!-- col end -->
								@if($loop->index%2 == 0)
									</div>
								@endif
							@endif
						@endforeach
					@else
						<h1>Please Select The Category Two From Home Settings</h1>
					@endif				
					
					<div class="gap-30"></div>

				</div><!-- Content Col end -->
				<div class="col-lg-4 col-md-12">
					@include('layouts.blog.partial.category')
				</div><!-- Sidebar Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	{{-- <section class="block-wrapper">
		<div class="container">
			<div class="row ts-gutter-30">
				<div class="col-lg-8 col-md-12">
					<!--- Featured Tab startet -->
					<div class="featured-tab">
						<h2 class="block-title">
							<span class="title-angle-shap"> What’s new</span>
						</h2>
						<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link animated active fadeIn" href="#tab_a" data-toggle="tab">
										<span class="tab-head">
										<span class="tab-text-title">All</span>					
									</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#tab_b" data-toggle="tab">
										<span class="tab-head">
										<span class="tab-text-title">Lifestyle</span>					
									</span>
									</a>
							</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#tab_c" data-toggle="tab">
										<span class="tab-head">
										<span class="tab-text-title">Tech</span>					
									</span>
									</a>
							</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#tab_d" data-toggle="tab">
										<span class="tab-head">
										<span class="tab-text-title">Sports</span>					
									</span>
									</a>
							</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#tab_e" data-toggle="tab">
										<span class="tab-head">
										<span class="tab-text-title">Health</span>					
									</span>
									</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active animated fadeInRight" id="tab_a">
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/tech/image5.png" alt="" />
												</a>
												<div class="grid-cat">
													<a class="post-cat tech" href="#">Tech</a>
												</div>
											</div>
											
											<div class="post-content">
													<h2 class="post-title title-md">
														<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
													</h2>
													<div class="post-meta mb-7">
														<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
														<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
													</div>
													<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
												</div><!-- Post content end -->
										</div><!-- Post Block style end -->
									</div><!-- Col end -->

									<div class="col-lg-6 col-md-6">
										<div class="list-post-block">
											<ul class="list-post">
												<li>
													<div class="post-block-style media">
														<div class="post-thumb">
															<a href="#">
																<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content media-body">
															<div class="grid-category">
																<a class="post-cat tech-color" href="#">Tech</a>
															</div>
															<h2 class="post-title">
																<a href="#">Santino loganne legan an year old resident</a>
															</h2>
															<div class="post-meta mb-7">
																<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
															</div>
															</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->
												<li>
													<div class="post-block-style media">
														<div class="post-thumb">
															<a href="#">
																<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content media-body">
															<div class="grid-category">
																<a class="post-cat travel-color" href="#">Travel</a>
															</div>
															<h2 class="post-title">
																<a href="#">Santino loganne legan an year old resident</a>
															</h2>
															<div class="post-meta mb-7">
																<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
															</div>
															</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 2 end -->
												<li>
													<div class="post-block-style media">
														<div class="post-thumb">
															<a href="#">
																<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content media-body">
															<div class="grid-category">
																<a class="post-cat health-color" href="#">Health</a>
															</div>
															<h2 class="post-title">
																<a href="#">Santino loganne legan an year old resident</a>
															</h2>
															<div class="post-meta mb-7">
																<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
															</div>
															</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 3 end -->
												<li>
													<div class="post-block-style media">
														<div class="post-thumb">
															<a href="#">
																<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content media-body">
															<div class="grid-category">
																<a class="post-cat sports-color" href="#">Sports</a>
															</div>
															<h2 class="post-title">
																<a href="#">Santino loganne legan an year old resident</a>
															</h2>
															<div class="post-meta mb-7">
																<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
															</div>
															</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 3 end -->
											</ul><!-- List post end -->
										</div><!-- List post block end -->
									</div><!-- List post Col end -->
								</div><!-- Tab pane Row 1 end -->
							</div><!-- Tab pane 1 end -->

							<div class="tab-pane animated fadeInRight" id="tab_b">
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="post-block-style clearfix">
												<div class="post-thumb">
													<a href="#">
														<img class="img-fluid" src="{{ asset('/blog') }}/images/news/tech/tech02.png" alt="" />
													</a>
													<div class="grid-cat">
														<a class="post-cat tech" href="#">Tech</a>
													</div>
												</div>
												
												<div class="post-content">
													<h2 class="post-title title-md">
														<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
													</h2>
													<div class="post-meta mb-7">
														<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
														<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
													</div>
													<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
												</div><!-- Post content end -->
											</div><!-- Post Block style end -->
									</div><!-- Col end -->
	
									<div class="col-lg-6 col-md-6">
										<div class="list-post-block">
												<ul class="list-post">
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="" />
																</a>
															</div><!-- Post thumb end -->
	
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat tech-color" href="#">Tech</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 1 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
																</a>
															</div><!-- Post thumb end -->
	
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat travel-color" href="#">Travel</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 2 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
																</a>
															</div><!-- Post thumb end -->
	
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat health-color" href="#">Health</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
																</a>
															</div><!-- Post thumb end -->
	
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat sports-color" href="#">Sports</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
												</ul><!-- List post end -->
											</div><!-- List post block end -->
									</div><!-- List post Col end -->
								</div><!-- Tab pane Row 1 end -->
							</div><!-- Tab pane 2 end -->

							<div class="tab-pane animated fadeInRight" id="tab_c">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="post-block-style clearfix">
													<div class="post-thumb">
														<a href="#">
															<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
														</a>
														<div class="grid-cat">
															<a class="post-cat tech" href="#">Tech</a>
														</div>
													</div>
													
													<div class="post-content">
														<h2 class="post-title title-md">
															<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
														</h2>
														<div class="post-meta mb-7">
															<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
															<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
														</div>
														<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
													</div><!-- Post content end -->
												</div><!-- Post Block style end -->
										</div><!-- Col end -->
		
										<div class="col-lg-6 col-md-6">
											<div class="list-post-block">
													<ul class="list-post">
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat tech-color" href="#">Tech</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 1 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat travel-color" href="#">Travel</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 2 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat health-color" href="#">Health</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat sports-color" href="#">Sports</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
													</ul><!-- List post end -->
												</div><!-- List post block end -->
										</div><!-- List post Col end -->
									</div><!-- Tab pane Row 1 end -->
								</div><!-- Tab pane 3 end -->

							<div class="tab-pane animated fadeInRight" id="tab_d">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="post-block-style clearfix">
													<div class="post-thumb">
														<a href="#">
															<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
														</a>
														<div class="grid-cat">
															<a class="post-cat sports" href="#">Sport</a>
														</div>
													</div>
													
													<div class="post-content">
														<h2 class="post-title title-md">
															<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
														</h2>
														<div class="post-meta mb-7">
															<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
															<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
														</div>
														<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
													</div><!-- Post content end -->
												</div><!-- Post Block style end -->
										</div><!-- Col end -->
		
										<div class="col-lg-6 col-md-6">
											<div class="list-post-block">
													<ul class="list-post">
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat tech-color" href="#">Tech</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 1 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat travel-color" href="#">Travel</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 2 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat health-color" href="#">Health</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat sports-color" href="#">Sports</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
													</ul><!-- List post end -->
												</div><!-- List post block end -->
										</div><!-- List post Col end -->
									</div><!-- Tab pane Row 1 end -->
								</div><!-- Tab pane 4 end -->

							<div class="tab-pane animated fadeInRight" id="tab_e">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="post-block-style clearfix">
													<div class="post-thumb">
														<a href="#">
															<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
														</a>
														<div class="grid-cat">
															<a class="post-cat health" href="#">Health</a>
														</div>
													</div>
													
													<div class="post-content">
														<h2 class="post-title title-md">
															<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
														</h2>
														<div class="post-meta mb-7">
															<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
															<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
														</div>
														<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
													</div><!-- Post content end -->
												</div><!-- Post Block style end -->
										</div><!-- Col end -->
		
										<div class="col-lg-6 col-md-6">
											<div class="list-post-block">
													<ul class="list-post">
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat tech-color" href="#">Tech</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 1 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat travel-color" href="#">Travel</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 2 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat health-color" href="#">Health</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
														<li>
															<div class="post-block-style media">
																<div class="post-thumb">
																	<a href="#">
																		<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="" />
																	</a>
																</div><!-- Post thumb end -->
		
																<div class="post-content media-body">
																	<div class="grid-category">
																		<a class="post-cat sports-color" href="#">Sports</a>
																	</div>
																	<h2 class="post-title">
																		<a href="#">Santino loganne legan an year old resident</a>
																	</h2>
																	<div class="post-meta mb-7">
																		<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																	</div>
																</div><!-- Post content end -->
															</div><!-- Post block style end -->
														</li><!-- Li 3 end -->
													</ul><!-- List post end -->
												</div><!-- List post block end -->
										</div><!-- List post Col end -->
									</div><!-- Tab pane Row 1 end -->
								</div><!-- Tab pane 5 end -->
						</div><!-- tab content -->
					</div><!-- Technology Tab end -->

					<div class="gap-20"></div>

					<div class="block style2 text-light">
						<h2 class="block-title">
							<span class="title-angle-shap"> Lifestyle </span>
						</h2>

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="post-block-style">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image2.png" alt="" />
										</a>
										<div class="grid-cat">
											<a class="post-cat tech" href="#">Tech</a>
										</div>
									</div>
									
									<div class="post-content">
											<h2 class="post-title title-md">
												<a href="#">Nancy Zhang a Chinese you famous business woman</a>
											</h2>
											<p>The market won’t stop actress and singer Jennifer Lopez from expanding....</p>
											<div class="post-meta mb-7">
											<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
											<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
										</div>
										</div><!-- Post content end -->
								</div><!-- Post block a end -->
							</div><!-- Col 1 end -->

							<div class="col-lg-6 col-md-6">
								<div class="row ts-gutter-20">
									<div class="col-md-6">
										<div class="post-block-style">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image1.png" alt="" />
												</a>
											</div>
											
											<div class="post-content">
												<h2 class="post-title mb-2">
													<a href="#">Ratcliffe to be Dir ector of nation</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
											</div><!-- Post content end -->
										</div><!-- Post block a end -->
									</div><!-- .col -->
									<div class="col-md-6">
										<div class="post-block-style">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="" />
												</a>
											</div>
											
											<div class="post-content">
												<h2 class="post-title mb-2">
													<a href="#">Ratcliffe to be Dir ector of nation</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
											</div><!-- Post content end -->
										</div><!-- Post block a end -->
									</div><!-- .col -->
									<div class="col-md-6">
										<div class="post-block-style">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="" />
												</a>
											</div>
											
											<div class="post-content">
												<h2 class="post-title mb-2">
													<a href="#">Ratcliffe to be Dir ector of nation</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
											</div><!-- Post content end -->
										</div><!-- Post block a end -->
									</div><!-- .col -->
									<div class="col-md-6">
										<div class="post-block-style">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image4.png" alt="" />
												</a>
											</div>
											
											<div class="post-content">
												<h2 class="post-title mb-2">
													<a href="#">Ratcliffe to be Dir ector of nation</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
											</div><!-- Post content end -->
										</div><!-- Post block a end -->
									</div><!-- .col -->
								</div><!-- .row -->
							</div><!-- Col 2 end -->
						</div><!-- Row end -->
					</div><!-- Block Lifestyle end -->


				</div><!-- Content Col end -->

				<div class="col-lg-4">
					<div class="sidebar">
						<div class="sidebar-widget social-widget">
							<h2 class="block-title">
								<span class="title-angle-shap"> Social</span>
							</h2>
							<div class="sidebar-social">
								<ul class="ts-social-list">
									<li class="ts-facebook">
										<a href="#">
											<i class="tsicon fa fa-facebook"></i>
											<div class="count">
												<b>12.5 k </b>
												<span>Likes</span>
											</div>
										</a>
									</li>
									<li class="ts-twitter">
										<a href="#">
											<i class="tsicon fa fa-twitter"></i>
											<div class="count">
												<b>12.5 k </b>
												<span>Follwers</span>
											</div>
										</a>
									</li>
									<li class="ts-youtube">
										<a href="#">
											<i class="tsicon fa fa-youtube-play"></i>
											<div class="count">
												<b>12.5 k </b>
												<span>Follwers</span>
											</div>
										</a>
									</li>
									<li class="ts-rss">
										<a href="#">
											<i class="tsicon fa fa-rss"></i>
											<div class="count">
												<b>12.5 k </b>
												<span>Follwers</span>
											</div>
										</a>
									</li>
								</ul><!-- social list -->
							</div>
						</div><!-- widget end -->

						<div class="sidebar-widget ads-widget">
							<div class="ads-image">
								<a href="#">
									<img class="img-fluid" src="{{ asset('/blog') }}/images/banner-image/image2.png" alt="">
								</a>
							</div>
						</div><!-- widget end -->
						<div class="gap-20 d-none d-lg-block"></div>
						<div class="sidebar-widget featured-tab post-tab">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link animated active fadeIn" href="#post_tab_a" data-toggle="tab">
										<span class="tab-head">
											<span class="tab-text-title">Recent</span>					
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#post_tab_b" data-toggle="tab">
										<span class="tab-head">
											<span class="tab-text-title">Popular</span>					
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link animated fadeIn" href="#post_tab_c" data-toggle="tab">
										<span class="tab-head">
											<span class="tab-text-title">Comments</span>					
										</span>
									</a>
								</li>
							</ul>
							<div class="gap-50 d-none d-md-block"></div>
							<div class="row">
								<div class="col-12">
									<div class="tab-content">
										<div class="tab-pane active animated fadeInRight" id="post_tab_a">
											<div class="list-post-block">
												<ul class="list-post">
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 1</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat tech-color" href="#">Tech</a>
																</div>
																<h2 class="post-title">
																	<a href="#">House last week that move would Inject</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 1 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 2</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat travel-color" href="#">Travel</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Zhang social media pop also known innocent</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 2 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="">
																</a>
																<span class="tab-post-count"> 3</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat health-color" href="#">Health</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Jennifer Lopez expand her property collection</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="">
																</a>
																<span class="tab-post-count"> 4</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat sports-color" href="#">Sports</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
												</ul><!-- List post end -->
											</div>
										</div><!-- Tab pane 1 end -->
										<div class="tab-pane animated fadeInRight" id="post_tab_b">
											<div class="list-post-block">
												<ul class="list-post">
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 5</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat travel-color" href="#">Travel</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Zhang social media pop also known innocent</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 1 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 3</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat tech-color" href="#">Tech</a>
																</div>
																<h2 class="post-title">
																	<a href="#">House last week that move would Inject</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 2 end -->
												
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="">
																</a>
																<span class="tab-post-count"> 1</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat sports-color" href="#">Sports</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="">
																</a>
																<span class="tab-post-count"> 1</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat health-color" href="#">Health</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Jennifer Lopez expand her property collection</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 4 end -->
												</ul><!-- List post end -->
											</div>
										</div><!-- Tab pane 2 end -->
										<div class="tab-pane animated fadeInRight" id="post_tab_c">
											<div class="list-post-block">
												<ul class="list-post">
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 1</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat tech-color" href="#">Tech</a>
																</div>
																<h2 class="post-title">
																	<a href="#">House last week that move would Inject</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
															</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 1 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="">
																</a>
																<span class="tab-post-count"> 2</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat travel-color" href="#">Travel</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Zhang social media pop also known innocent</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 2 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="">
																</a>
																<span class="tab-post-count"> 5</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat health-color" href="#">Health</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Jennifer Lopez expand her property collection</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
													<li>
														<div class="post-block-style media">
															<div class="post-thumb">
																<a href="#">
																	<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="">
																</a>
																<span class="tab-post-count"> 1</span>
															</div><!-- Post thumb end -->
						
															<div class="post-content media-body">
																<div class="grid-category">
																	<a class="post-cat sports-color" href="#">Sports</a>
																</div>
																<h2 class="post-title">
																	<a href="#">Santino loganne legan an year old resident</a>
																</h2>
																<div class="post-meta mb-7">
																	<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
																</div>
																</div><!-- Post content end -->
														</div><!-- Post block style end -->
													</li><!-- Li 3 end -->
												</ul><!-- List post end -->
											</div>
										</div><!-- Tab pane 2 end -->
									</div><!-- tab content -->
								</div>
							</div>
						</div><!-- widget end -->
					</div>
				</div><!-- Sidebar Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end --> --}}

	<!-- ad banner start-->
	<div class="block-wrapper no-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-img text-center">
						<a href="index.html">
							<img class="img-fluid" src="{{ asset('/blog') }}/images/banner-image/image3.png" alt="">
						</a>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</div>
	<!-- ad banner end-->

	<!-- block slider -->
	<section class="block-slider">
		<div class="container">
			<div class="ts-grid-box">
				<h2 class="block-title">
					<span class="title-angle-shap"> Popular Post </span>
				</h2>
				<div class="owl-carousel dot-style2" id="post-block-slider">
					@foreach ('App\BlogPost'::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get() as $post)
						<div class="item">
							<div class="post-block-style">
								<div class="post-thumb">
									<a href="{{ url('/blogs') }}/{{ $post->slug }}">
										<img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt="" />
									</a>
									<div class="grid-cat">
										@foreach ($post->category as $category)
											<a class="post-cat tech" href="{{ url('/blogs/category') }}/{{ $category->slug }}">{{ $category->name }}</a>
										@endforeach
									</div>
								</div>
								
								<div class="post-content">
									<h2 class="post-title">
										<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
									</h2>
									<div class="post-meta mb-7">
										<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
									</div>
								</div><!-- Post content end -->
							</div><!-- Post Block style end -->
						</div><!-- slide-item end -->
					@endforeach
				</div>
			</div>
			<!-- ts-populer-post-box end-->
		</div>
		<!-- container end-->
	</section>
	<!-- .block slider -->

	

	
	
	{{-- <section class="block-wrapper">
		<div class="container">
			<div class="row ts-gutter-30">
				<div class="col-lg-8 col-md-12">
					<h2 class="block-title">
						<span class="title-angle-shap"> Tech </span>
					</h2>
					<div class="post-block-style">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="post-thumb">
									<img src="{{ asset('/blog') }}/images/news/tech/tech02.png" alt="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="post-content">
									<h2 class="post-title title-md">
										<a href="#">Ratcliffe to be Director of nation intelligence Trump ignored</a>
									</h2>
									<div class="post-meta mb-7">
										<span class="post-author"><a href="#"><i class="fa fa-user"></i> John Doe</a></span>
										<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
									</div>
									<p>The market won’t stop actress and singer Jennifer Lopez from expanding her property collection Lopez has reportedly added to her real....</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="gap-30"></div>

					<div class="row">
						<div class="col-md-6">
							<div class="list-post-block">
								<ul class="list-post">
									<li>
										<div class="post-block-style media">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/tech/tech1.png" alt="">
												</a>
											</div><!-- Post thumb end -->
	
											<div class="post-content media-body">
												<div class="grid-category">
													<a class="post-cat tech-color" href="#">Tech</a>
												</div>
												<h2 class="post-title">
													<a href="#">Santino loganne legan an year old resident</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
												</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->
									<li>
										<div class="post-block-style media">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/tech/image5.png" alt="">
												</a>
											</div><!-- Post thumb end -->
	
											<div class="post-content media-body">
												<div class="grid-category">
													<a class="post-cat travel-color" href="#">Travel</a>
												</div>
												<h2 class="post-title">
													<a href="#">Santino loganne legan an year old resident</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
												</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 2 end -->
								</ul><!-- list-post end -->
							</div>
						</div><!-- col end -->
						<div class="col-md-6">
							<div class="list-post-block">
								<ul class="list-post">
									<li>
										<div class="post-block-style media">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image4.png" alt="">
												</a>
											</div><!-- Post thumb end -->
	
											<div class="post-content media-body">
												<div class="grid-category">
													<a class="post-cat tech-color" href="#">Tech</a>
												</div>
												<h2 class="post-title">
													<a href="#">Santino loganne legan an year old resident</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
												</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->
									<li>
										<div class="post-block-style media">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image2.png" alt="">
												</a>
											</div><!-- Post thumb end -->
	
											<div class="post-content media-body">
												<div class="grid-category">
													<a class="post-cat travel-color" href="#">Travel</a>
												</div>
												<h2 class="post-title">
													<a href="#">Santino loganne legan an year old resident</a>
												</h2>
												<div class="post-meta mb-7">
													<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
												</div>
												</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 2 end -->
								</ul><!-- list-post end -->
							</div>
						</div><!-- col end -->
					</div>
				</div><!-- Content Col end -->
				<div class="col-lg-4 col-md-12">
					<h2 class="block-title block-title-dark">
						<span class="title-angle-shap">Recent news </span>
					</h2>
					<div class="list-post-block">
						<ul class="list-post">
							<li>
								<div class="post-block-style media">
									<div class="post-thumb thumb-md">
										<a href="#">
											<img class="img-fluid" src="{{ asset('/blog') }}/images/news/fashion/image3.png" alt="">
										</a>
									</div><!-- Post thumb end -->

									<div class="post-content media-body">
										<div class="grid-category">
											<a class="post-cat tech-color" href="#">Tech</a>
										</div>
										<h2 class="post-title">
											<a href="#">House last week that move would Inject</a>
										</h2>
										<div class="post-meta mb-7">
											<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
										</div>
									</div><!-- Post content end -->
								</div><!-- Post block style end -->
							</li><!-- Li 1 end -->
							<li>
								<div class="post-block-style media">
									<div class="post-thumb thumb-md">
										<a href="#">
											<img class="img-fluid" src="{{ asset('/blog') }}/images/news/lifestyle/image3.png" alt="">
										</a>
									</div><!-- Post thumb end -->

									<div class="post-content media-body">
										<div class="grid-category">
											<a class="post-cat travel-color" href="#">Travel</a>
										</div>
										<h2 class="post-title">
											<a href="#">Zhang social media pop also known innocent</a>
										</h2>
										<div class="post-meta mb-7">
											<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
										</div>
									</div><!-- Post content end -->
								</div><!-- Post block style end -->
							</li><!-- Li 2 end -->
							<li>
								<div class="post-block-style media">
									<div class="post-thumb thumb-md">
										<a href="#">
											<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image2.png" alt="">
										</a>
									</div><!-- Post thumb end -->

									<div class="post-content media-body">
										<div class="grid-category">
											<a class="post-cat health-color" href="#">Health</a>
										</div>
										<h2 class="post-title">
											<a href="#">Jennifer Lopez expand her property collection</a>
										</h2>
										<div class="post-meta mb-7">
											<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
										</div>
									</div><!-- Post content end -->
								</div><!-- Post block style end -->
							</li><!-- Li 3 end -->
							<li>
								<div class="post-block-style media">
									<div class="post-thumb thumb-md">
										<a href="#">
											<img class="img-fluid" src="{{ asset('/blog') }}/images/news/health/image1.png" alt="">
										</a>
									</div><!-- Post thumb end -->

									<div class="post-content media-body">
										<div class="grid-category">
											<a class="post-cat sports-color" href="#">Sports</a>
										</div>
										<h2 class="post-title">
											<a href="#">Santino loganne legan an year old resident</a>
										</h2>
										<div class="post-meta mb-7">
											<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
										</div>
									</div><!-- Post content end -->
								</div><!-- Post block style end -->
							</li><!-- Li 3 end -->
						</ul><!-- List post end -->
					</div>
				</div><!-- Sidebar Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end --> --}}

	{{-- <!-- post wraper start-->
	<section class="trending-slider full-width no-padding">
		<div class="ts-grid-box">
			<div class="owl-carousel" id="fullbox-slider">
				<div class="item post-overaly-style post-lg" style="background-image:url({{ asset('/blog') }}/images/news/fashion/image1.png)">
					<a href="#" class="image-link">&nbsp;</a>
					<div class="overlay-post-content">
						<div class="post-content">
							<div class="grid-category">
								<a class="post-cat lifestyle" href="#">Lifestyle</a>
								<a class="post-cat fashion" href="#">Fashion</a>
							</div>

							<h2 class="post-title title-md">
								<a href="#">Ratcliffe to be Director of intelligence Trump ignored </a>
							</h2>
							<div class="post-meta">
								<ul>
									<li><a href="#"><i class="fa fa-user"></i> John Wick</a></li>
									<li class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- Item 1 end -->
				<div class="item post-overaly-style post-lg" style="background-image:url({{ asset('/blog') }}/images/news/tech/tech1.png)">
					<a href="#" class="image-link">&nbsp;</a>
					<div class="overlay-post-content">
						<div class="post-content">
							<div class="grid-category">
								<a class="post-cat tech" href="#">Tech</a>
							</div>

							<h2 class="post-title title-md">
								<a href="#">Santino William an 9 year old Gilroy resident area</a>
							</h2>
							<div class="post-meta">
								<ul>
									<li><a href="#"><i class="fa fa-user"></i> John Wick</a></li>
									<li class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- Item 2 end -->
				<div class="item post-overaly-style post-lg" style="background-image:url({{ asset('/blog') }}/images/news/fashion/image2.png)">
					<a href="#" class="image-link">&nbsp;</a>
					<div class="overlay-post-content">
						<div class="post-content">
							<div class="grid-category">
								<a class="post-cat health" href="#">Health</a>
							</div>

							<h2 class="post-title title-md">
								<a href="#">Jennifer Lopez expanding property collection a lot</a>
							</h2>
							<div class="post-meta">
								<ul>
									<li><a href="#"><i class="fa fa-user"></i> John Wick</a></li>
									<li class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- Item 3 end -->
				<div class="item post-overaly-style post-lg" style="background-image:url({{ asset('/blog') }}/images/news/lifestyle/image1.jpg)">
					<a href="#" class="image-link">&nbsp;</a>
					<div class="overlay-post-content">
						<div class="post-content">
							<div class="grid-category">
								<a class="post-cat lifestyle" href="#">Lifestyle</a>
							</div>

							<h2 class="post-title title-md">
								<a href="#">Nancy Zhang a Chinese woman and social media</a>
							</h2>
							<div class="post-meta">
								<ul>
									<li><a href="#"><i class="fa fa-user"></i> John Wick</a></li>
									<li class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- Item 3 end -->
			</div>
			<!-- most-populers end-->
		</div>
	</section> --}}

	<!-- .section -->
	<section class="block-wrapper">
		<div class="container">
			<div class="row ts-gutter-30">
				<div class="col-lg-12 col-md-12">
					<h2 class="block-title">
						<span class="title-angle-shap">Read Next </span>
					</h2>
					<div class="row ts-gutter-20">
						@foreach ($recent as $post)
							<div class="col-md-6">
								<div class="post-block-style">
									<div class="post-thumb">
										<a href="{{ url('/blogs') }}/{{ $post->slug }}">
											<img class="img-fluid" src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
										</a>
										<div class="grid-cat">
											<a class="post-cat tech" href="{{ url('/blogs/category') }}/@foreach($post->category as $category){{ $category->slug }}">{{ $category->name }} @endforeach</a>
										</div>
									</div>
									
									<div class="post-content">
										<h2 class="post-title">
											<a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
										</h2>
										<div class="post-meta mb-7">
											<span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
										</div>
									</div><!-- Post content end -->
								</div>
							</div><!-- end col -->	
						@endforeach
					</div><!-- end row -->
					<div class="gap-30"></div>
					<div class="row">
						<div class="col-12">
							<div class="load-more-btn text-center">
									<button class="btn"> Load More </button>
							</div>
						</div>
					</div>
				</div><!-- Content Col end -->
				{{-- <div class="col-lg-4 col-md-12">
					<h2 class="block-title block-title-dark">
						<span class="title-angle-shap">Recent Comments </span>
					</h2>
					<div class="ts-author-comments">
						<div class="row ts-comments-row align-items-center mb-50">
							<div class="col-lg-4 col-md-2">
								<div class="ts-author-media">
									<div class="ts-author-thumb"> 
										<img src="{{ asset('/blog') }}/images/news/author.png" alt="">
										<div class="ts-author-meta"> July 6, 2019</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-10">
								<div class="ts-author-content">
									<div class="comment"> 
										<a href="#"> Hidden Hills property with mountain and city views boasts nine bed rooms, including a big </a>
									</div>
									<div class="ts-author"> by <a href="http://blank.com"> John Doe </a></div>
								</div>
							</div>
						</div><!-- ts-comments-row end -->
						<div class="row ts-comments-row align-items-center mb-50">
							<div class="col-lg-4 col-md-2">
								<div class="ts-author-media">
									<div class="ts-author-thumb"> 
										<img src="{{ asset('/blog') }}/images/news/user2.png" alt="">
										<div class="ts-author-meta"> July 6, 2019</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-10">
								<div class="ts-author-content">
									<div class="comment"> 
										<a href="#"> Lopez has reportedly added to her real estat holdings an eight-plus acre estate in Bel-Air anchored </a>
									</div>
									<div class="ts-author"> by <a href="http://blank.com"> John Doe </a></div>
								</div>
							</div>
						</div><!-- ts-comments-row end -->
						<div class="row ts-comments-row align-items-center mb-50">
							<div class="col-lg-4 col-md-2">
								<div class="ts-author-media">
									<div class="ts-author-thumb"> 
										<img src="{{ asset('/blog') }}/images/news/user1.png" alt="">
										<div class="ts-author-meta"> July 6, 2019</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-10">
								<div class="ts-author-content">
									<div class="comment"> 
										<a href="#"> Hidden Hills property with mountain and city views boasts nine bed rooms, including a big </a>
									</div>
									<div class="ts-author"> by <a href="http://blank.com"> John Doe </a></div>
								</div>
							</div>
						</div><!-- ts-comments-row end -->
					</div>
				</div><!-- Sidebar Col end --> --}}
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	<!-- ad banner start-->
	<div class="block-wrapper no-padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="banner-img">
						<a href="index.html">
							<img class="img-fluid" src="{{ asset('/blog') }}/images/banner-image/image4.png" alt="">
						</a>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</div>
	
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