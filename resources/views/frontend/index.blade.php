@extends('frontend.layouts.app')
@section('title', 'Find Top Rated Lawyer Of Bangladesh')
@section('content')
    <!-- Revolution slider start -->
    {{-- <div class="tp-banner-container">
        <div class="tp-banner">
        <ul>
            <li data-slotamount="7" data-transition="fade" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{ url('frontend') }}/images/dummy.png" data-lazyload="{{ url('frontend') }}/images/banner2.jpg">
            <div class="caption lft large-title tp-resizeme slidertext2" data-x="left" data-y="150" data-speed="600" data-start="1600">Welcome To Global </div>
            <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="210" data-speed="600" data-start="2200"><span>Business LawFirm</span></div>
            <div class="caption lfb large-title tp-resizeme slidertext6" data-x="left" data-y="270" data-speed="600" data-start="2800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla<br/>
                efficitur consequat erat, id dignissim lacus.</div>
            <div class="caption lfl large-title tp-resizeme slidertext7" data-x="left" data-y="320" data-speed="600" data-start="3500"><a href="#">Contact Us <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
            </li>
        </ul>
        </div>
    </div> --}}
    <!-- Revolution slider end --> 
    
    <!-- Welcome start -->
    <div class="welcomeWrap">
        <div class="container">
        <div class="row">
            {{-- <div class="col-md-4">
            <div class="welImg"><img src="{{ url('frontend') }}/images/welcome-img.jpg" alt=""></div>
            </div> --}}
            <div class="col-md-12">
                <div class="headingTitle">
                    <h1 class="text-center">Find Top Rated <span>Lawyer Of Bangladesh</span></h1>
                </div>
                <p>Find High Court Lawyer, Suprime Court Lawyer From Anywhere in Bangladesh.</p>
                <br>
                <br>
            <div class="welcome-content-box row">
                <div class="col-md-4 col-sm-4 welcome-box text-center"> <img src="{{ url('frontend') }}/images/icon1.png" alt="">
                <a href="{{ url("lawyers") }}"><h4>Find A Lawyer</h4></a>
                <p>Search for Find a Top Rated Lawyer Near You.</p>
                </div>
                <div class="col-md-4 col-sm-4 welcome-box text-center"> <img src="{{ url('frontend') }}/images/icon2.png" alt="">
                <a href="#"><h4>Legal Services</h4></a>
                <p>Get Expert Legal Advice Within a Few Hours.</p>
                </div>
                <div class="col-md-4 col-sm-4 welcome-box text-center"> <img src="{{ url('frontend') }}/images/icon3.png" alt="">
                <a href="{{ url('/blogs') }}"><h4>Legal Study</h4></a>
                <p>Get Expert Legal Services on Phone Right Now.</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Welcome end --> 

    <div class="lawyer-wrap">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                <div class="headingTitle">
                    <h1>OUR TOP RATED <span>LAWYERS IN BANGLADESH</span></h1>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis leo eget maximus volutpat. Nulla eget bibendum urna, et vehicula ante. Donec et diam sodales, pellentesque est a, posuere ex. Curabitur mattis viverra semper.</p> --}}
                </div>
                </div>
            </div>
            <ul class="row lawyer-service">
                @forelse ($lawyers as $lawyer)
                <li class="col-md-4">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="lawyer-image"><img src="{{ asset("uploaded/lawyer_images") }}/{{ $lawyer->picture }}" alt=""></div>
                            </div>
                            <div class="col-md-7">
                                <div class="head"><a href="{{ url("lawyers") }}/{{ $lawyer->slug }}">{{ $lawyer->name }}</a></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="experts">
                                            {!! LawyerRating($lawyer->id) !!}
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="date">{{ $lawyer->experience }} Yrs Experience</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            @forelse ($lawyer->practiceAreas as $practiceArea)
                                                @if($loop->index < 1)
                                                    {{ $practiceArea->name }} +more
                                                @endif
                                            @empty
                                                Nothing to be show...
                                            @endforelse
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                    </div>
                </li>
                @empty
                    Please Add Lawyer
                @endforelse
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="lawyer-carousel owl-theme">
                        <div class="item">
                            <div class="court-name">
                                <p><a href="#">Practice Name</a></p>
                            </div>
                            <div class="lawyer-info-border">
                                <div class="lawyer-area">
                                    <div class="lawyer-img">
                                        <img src="{{ url('') }}/uploaded/lawyer_images/default.png" alt="">
                                    </div>
                                    <div class="lawyer-info">
                                        <p class="lawyer-name">
                                            <a href="#">Lawyer Name</a>
                                        </p>
                                        <ul class="experts">
                                            <li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        
                                        <p class="lawyer-address">
                                            <i class="fa fa-user"></i> Address
                                        </p>
                                        <p class="lawyer-experience">
                                            <i class="fa fa-user"></i> Experience
                                        </p>
                                    </div>
                                </div>
                                <p class="lawyer-practice-area">
                                    Practice Area: Here...
                                </p>
                            </div>
                            <div class="lawyer-category-btn">
                                <a href="#">View More Practice Name</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="court-name">
                                <p><a href="#">Practice Name</a></p>
                            </div>
                            <div class="lawyer-info-border">
                                <div class="lawyer-area">
                                    <div class="lawyer-img">
                                        <img src="{{ url('') }}/uploaded/lawyer_images/default.png" alt="">
                                    </div>
                                    <div class="lawyer-info">
                                        <p class="lawyer-name">
                                            <a href="#">Lawyer Name</a>
                                        </p>
                                        <ul class="experts">
                                            <li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        
                                        <p class="lawyer-address">
                                            <i class="fa fa-user"></i> Address
                                        </p>
                                        <p class="lawyer-experience">
                                            <i class="fa fa-user"></i> Experience
                                        </p>
                                    </div>
                                </div>
                                <p class="lawyer-practice-area">
                                    Practice Area: Here...
                                </p>
                            </div>
                            <div class="lawyer-category-btn">
                                <a href="#">View More Practice Name</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="court-name">
                                <p><a href="#">Practice Name</a></p>
                            </div>
                            <div class="lawyer-info-border">
                                <div class="lawyer-area">
                                    <div class="lawyer-img">
                                        <img src="{{ url('') }}/uploaded/lawyer_images/default.png" alt="">
                                    </div>
                                    <div class="lawyer-info">
                                        <p class="lawyer-name">
                                            <a href="#">Lawyer Name</a>
                                        </p>
                                        <ul class="experts">
                                            <li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li><li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        
                                        <p class="lawyer-address">
                                            <i class="fa fa-user"></i> Experience
                                        </p>
                                        <p class="lawyer-experience">
                                            <i class="fa fa-user"></i> Court Name
                                        </p>
                                    </div>
                                </div>
                                <p class="lawyer-practice-area">
                                    Practice Area: Here...
                                </p>
                            </div>
                            <div class="lawyer-category-btn">
                                <a href="#">View More Practice Name</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
    
    <!-- Attorney start -->
    
    <!-- Servise start -->
    <div class="service-wrap">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <div class="headingTitle">
                <h1>Our <span>Service</span></h1>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis leo eget maximus volutpat. Nulla eget bibendum urna, et vehicula ante. Donec et diam sodales, pellentesque est a, posuere ex. Curabitur mattis viverra semper.</p> --}}
            </div>
            </div>
        </div>
        <ul class="row serv-area">
            @foreach ($services as $service)
                <li class="col-md-3 col-sm-6">
                    <a href="{{ url('/services') }}/{{ $service->slug }}">
                    <div class="service-block">
                        <h4>{{ $service->name }}</h4>
                        <hr>
                        <p class="content">{{ str_limit(strip_tags($service->description), 100) }}</p>
                    </div>
                    </a>
                </li>
            @endforeach
        </ul>
        </div>
    </div>
    <!-- Servise end --> 
    
    
    <!-- Practice start -->
    <div class="practice-wrap">
        <div class="container">
        <div class="headingTitle">
            <h1>Latest <span>Blog</span></h1>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis leo eget maximus volutpat. Nulla eget bibendum urna, et vehicula ante. Donec et diam sodales, pellentesque est a, posuere ex. Curabitur mattis viverra semper.</p> --}}
        </div>
        <ul class="row">
            @forelse ($posts as $post)
                <li class="col-md-3 col-sm-6">
                    <div class="practiceImg"><img src="{{ asset("/uploaded/post_thumb/") }}/{{ $post->cover }}" alt="{{ $post->title }}"></div>
                    <div class="pracInfo">
                        <h3><a href="blogs/{{ $post->slug }}">{{ $post->title }}</a></h3>
                        {{-- <p>Lorem ipsum dolor sit amet, adipiscing elit quisque...</p> --}}
                        <div class="readmore"><a href="blogs/{{ $post->slug }}">Read More</a></div>
                    </div>
                </li>
            @empty
                No Post Found
            @endforelse
        </ul>
        </div>
    </div>
    <!-- Practice-wrap end --> 

    <div class="practice-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sidebar">
                                <div class="widget cases">
                                    <h5 class="widget-title">Popular Blog Post</h5>
                                    <ul class="papu-post">
                                        @foreach ($popular_posts as $post)
                                            <li>
                                                <div class="media-left"> <a href="{{ url('/blogs') }}/{{ $post->slug }}"><img src="{{ url('/uploaded/post_thumb') }}/{{ $post->cover }}" alt=""></a> </div>
                                                <div class="media-body">
                                                <h3> <a class="media-heading" href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a> </h3>
                                                <p>{{ str_limit(strip_tags($post->article), 100) }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sidebar">
                                <div class="widget cases">
                                    <h5 class="widget-title">Recent Question</h5>
                                    <ul class="papu-post">
                                        @foreach ($questions as $question)   
                                            <li>
                                                <div class="media-body">
                                                <h3> <a class="media-heading" href="{{ url('/advice') }}/{{ $question->id }}">{{ $question->title }}</a> </h3>
                                                <p>{{ str_limit(strip_tags($question->details), 100) }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.lawyer-carousel').owlCarousel({
            loop:true,
            nav:true,
            margin: 10,
            navText: ['<span class="fa fa-chevron-left"></span>', '<span class="fa fa-chevron-right"></span>'],
            responsive:{
                0:{
                    items:1
                },
                540:{
                    items:2
                },
                960:{
                    items:3
                }
            }
        })
    </script>
@endpush