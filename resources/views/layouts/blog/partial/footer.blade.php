
<!-- ad banner end-->
<div class="gap-50"></div>
<!-- ad banner start-->
{{-- 
<div class="newsletter-area">
    <div class="container">
        <div class="row ts-gutter-30 justify-content-center align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="footer-loto">
                    <a href="{{ route('blog.index') }}">
                        <img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->footer_logo }}@else{{ asset("uploaded/logo/default-footer-logo.jpg") }}@endif" alt="">
                    </a>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-5 col-md-6">
                <div class="footer-newsletter">
                    <form action="#" method="post">
                        <div class="email-form-group">
                            <i class="news-icon fa fa-paper-plane" aria-hidden="true"></i>
                            <input type="email" name="EMAIL" class="newsletter-email" placeholder="Your email" required>
                            <input type="submit" class="newsletter-submit" value="Subscribe">
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- col end -->
        </div>
        <!-- row  end -->
    </div>
    <!-- container end -->
</div>
<!-- ad banner end--> --}}
	<!-- Footer start -->
	<div class="ts-footer">
		<div class="container">
			<div class="row ts-gutter-30 justify-content-lg-between justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="footer-widtet">
						<h3 class="widget-title"><span>About Us</span></h3>
						<div class="widget-content">
							<p>@if($SiteOptions != null){{ $SiteOptions->description }}@else Please Add Site Descriptions. @endif</p>
							<ul class="ts-footer-info">
								<li><i class="fa fa-home"></i> @if($SiteOptions != null){{ $SiteOptions->address }}@else{{ 'Please Add Address' }}@endif</li>
								<li><i class="icon icon-phone2"></i>@if($SiteOptions != null){{ $SiteOptions->phone }}@else{{ 'Please Add Phone' }}@endif</li>
								<li><i class="fa fa-envelope"></i>@if($SiteOptions != null){{ $SiteOptions->email }}@else Please Add Email. @endif</li>
							</ul>
							<ul class="ts-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!-- col end -->
				<div class="col-lg-3 col-md-6">
					<div class="footer-widtet post-widget">
						<h3 class="widget-title"><span>Popular Post</span></h3>
						<div class="widget-content">
							<div class="list-post-block">
								<ul class="list-post">
                                    @foreach ('App\BlogPost'::withCount('comments')->orderBy('comments_count', 'desc')->limit(4)->get() as $post)
                                        <li>
                                            <div class="post-block-style media">
                                                <div class="post-thumb">
                                                    <a href="{{ url('blogs') }}/{{ $post->slug }}">
                                                        <img class="img-fluid" src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
                                                    </a>
                                                </div><!-- Post thumb end -->
        
                                                <div class="post-content media-body">
                                                    <h4 class="post-title">
                                                        <a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
                                                    </h4>
                                                    <div class="post-meta mb-7">
                                                        <span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d M, Y', strtotime($post->created_at)) }}</span>
                                                    </div>
                                                    </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->
                                    @endforeach
								</ul><!-- list-post end -->
							</div>
						</div>
					</div>
				</div><!-- col end -->
				<div class="col-lg-3 col-md-6">
					<div class="footer-widtet post-widget">
						<div class="widget-content">
							<div class="footer-ads">
								<a href="#">
									<img class="img-fluid" src="{{ asset('/blog') }}/images/banner-image/image6.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div><!-- col end -->
			</div><!-- row end -->
		</div><!-- container end -->
	</div>
	<!-- Footer End-->

	<!-- ts-copyright start -->
	<div class="ts-copyright">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-12 text-center">
					<div class="copyright-content text-light">
						<p>&copy; 2019, Digiqole - News Magazine html Template. All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ts-copyright end-->

	<!-- backto -->
	<div class="top-up-btn">
		<div class="backto" style="display: block;"> 
			<a href="#" class="icon icon-arrow-up" aria-hidden="true"></a>
		</div>
	</div>
		<!-- backto end-->