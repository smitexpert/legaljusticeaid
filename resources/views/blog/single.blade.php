@extends('layouts.blog.blog')
@section('contents')
    <div class="single-post">
		<div class="post-header-area">
			<h2 class="post-title title-lg">{{ $post->title }}</h2>
			<ul class="post-meta">
				<li>
					@foreach ($post->category as $category)
						<a href="{{ url('/blogs') }}/{{ $category->slug }}" class="post-cat fashion">{{ $category->name }}</a>
					@endforeach
				</li>
				<li class="post-author">
					<strong>{{ $post->user->name }}</strong>
				</li>
				<li><a href="#"><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($post->created_at)) }}</a></li>
				<li><a href="#"><i class="fa fa-comments"></i>
					@if ($post->comments->count() > 0)
						{{ $post->comments->count() }} Comments
					@else
						No Commecnts
					@endif
				</a></li>
			</ul>
		</div><!-- post-header-area end -->
		<div class="post-content-area">
			<div class="post-media mb-20">
				<a href="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" class="gallery-popup cboxElement">
					<img src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" class="img-fluid" alt="">
				</a>
			</div>
			
			{!! $post->article !!}

			<hr>
			<div class="post-navigation clearfix">
				<div class="post-previous float-left">
					@if(App\BlogPost::where('id', '>', $post->id)->orderBy('id', 'asc')->count() > 0)
						<a href="{{ url('blogs') }}/{{ $next->slug }}">
							<img src="{{ asset('/uploaded/post_images') }}/{{ $next->cover }}" alt="">
							<span>Read Previous</span>
							<p>
								{{ $next->title }}
							</p>
						</a>
					@endif
				</div>
				<div class="post-next float-right">
					@if(App\BlogPost::where('id', '<', $post->id)->orderBy('id', 'desc')->count() > 0)
						<a href="{{ url('blogs') }}/{{ $prev->slug }}">
							<img src="{{ asset('/uploaded/post_images') }}/{{ $prev->cover }}" alt="">
							<span>Read Next</span>
							<p>
								{{ $prev->title }}
							</p>
						</a>
					@endif
				</div>
			</div><!-- post navigation -->
			<div class="gap-30"></div>
			<!-- realted post start -->
			<div class="related-post">
				<h2 class="block-title">
					<span class="title-angle-shap"> Realted Post</span>
				</h2>
				<div class="row">
					@foreach ($relateds as $item)
						<div class="col-md-4">
							<div class="post-block-style">
								<div class="post-thumb">
									<a href="#">
										<img class="img-fluid" src="{{ asset('/blog') }}/images/news/tech/tech1.png" alt="">
									</a>
									<div class="grid-cat">
										<a class="post-cat tech" href="#">Tech</a>
									</div>
								</div>
								
								<div class="post-content">
									<h2 class="post-title">
										<a href="#">Zhang social media pop star also known innocent</a>
									</h2>
									<div class="post-meta mb-7 p-0">
										<span class="post-date"><i class="fa fa-clock-o"></i> 29 July, 2020</span>
									</div>
								</div><!-- Post content end -->
							</div>
						</div><!-- col end -->
					@endforeach
				</div><!-- row end -->
			</div>
			<!-- realted post end -->
			<div class="gap-30"></div>
			{{-- <!-- comments start -->
			<div class="comments-area">
				<h3 class="block-title"><span>03 Comments</span></h3>
				<ul class="comments-list">
					<li>
						<div class="comment">
							<img class="comment-avatar pull-left" alt="" src="{{ asset('/blog') }}/images/news/user1.png">
							<div class="comment-body">
								<div class="meta-data">
									<span class="comment-author">Michelle Aimber</span>
								</div>
								<div class="comment-content">
								<p>High Life tempor retro Truffaut. Tofu mixtape twee, assumenda quinoa flexitarian aesthetic artisan vinyl pug. Chambray et Carles Thundercats cardigan actually, magna bicycle rights.</p></div>
								<div class="text-left">
									<a class="comment-reply" href="#">Reply</a>
								</div>	
							</div>
						</div><!-- Comments end -->

						<ul class="comments-reply">
							<li>
								<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="{{ asset('/blog') }}/images/news/user2.png">
									<div class="comment-body">
										<div class="meta-data">
											<span class="comment-author">Genelia Dusteen</span>
										</div>
										<div class="comment-content">
										<p>Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
										<div class="text-left">
											<a class="comment-reply" href="#">Reply</a>
										</div>	
									</div>
								</div><!-- Comments end -->
							</li>
						</ul><!-- comments-reply end -->
							<div class="comment last">
								<img class="comment-avatar pull-left" alt="" src="{{ asset('/blog') }}/images/news/user1.png">
								<div class="comment-body">
									<div class="meta-data">
										<span class="comment-author">Michelle Aimber</span>
									</div>
									<div class="comment-content">
									<p>VHS Wes Anderson Banksy food truck vero. Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
									<div class="text-left">
										<a class="comment-reply" href="#">Reply</a>
									</div>	
								</div>
							</div><!-- Comments end -->
					</li><!-- Comments-list li end -->
				</ul><!-- Comments-list ul end -->
			</div><!-- comment end -->
			<!-- comment form -->
			<div class="gap-50 d-none d-md-block"></div>
			<div class="comments-form">
				<h3 class="title-normal">Leave a comment</h3>
				<form method="POST" action="#">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control input-msg required-field" id="message" placeholder="Your Comment" rows="10" required=""></textarea>
							</div>
						</div><!-- Col end -->

						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required="">
							</div>
						</div><!-- Col end -->

						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required="">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control" placeholder="Your Website" type="text" required="">
							</div>
						</div>
					</div><!-- Form row end -->
					<div class="clearfix">
						<button class="comments-btn btn btn-primary" type="submit">Post Comment</button> 
					</div>
				</form><!-- Form end -->
			</div><!-- comment form end --> --}}
		</div>
	</div><!-- single-post end -->
@endsection