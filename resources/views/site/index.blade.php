@extends('layouts.site')
@section('content')
    <!-- Featured Section Start -->
    <section class="section featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="featured_one">
                                <div class="post">
                                    <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                    <h2 class="title"><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore voluptatem molestiae magni optio deleniti repellat? Sed atque libero harum quia ipsum dolorum deleniti, architecto, praesentium doloribus nisi ut minima reiciendis sequi! Velit illo voluptatem porro ex facere et in nesciunt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="featured_two">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                            </div>
                            <div class="featured_two">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="featured_two">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="featured_two">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="featured_two">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @include('site.partial.sidebar')
            </div>
        </div>
    </section>

    <!-- Ads 2 Section Start -->
    <section class="section ads_two">
        <div class="container">
            <div class="text-center">Ads Space</div>
        </div>
    </section>

    <!-- Content Section One Start -->
    <section class="section content_one">
        <div class="container">
            <div class="row">
                @forelse (App\HomeCategory::where('table_name', 2)->get() as $item)
                    <div class="col-lg-6">
                        <div class="text-left">
                            <h4 class="category_one"><a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">
                                {{ $item->category->name }}
                            </a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <h6 class="read_more"><a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">Read More >></a></h6>
                        </div>
                    </div>
                @empty
                <div class="col-lg-6">
                    <div class="text-left">
                            <h4 class="category_one"><a href="#">
                                Category 2
                            </a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <h6 class="read_more"><a href="#">Read More >></a></h6>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="row">
                @forelse (App\HomeCategory::where('table_name', 2)->get() as $item)
                    @foreach ($item->category->posts as $post)
                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                <h4><a href="{{ $post->slug }}">{{ $post->title }}</a></h4>
                            </div>
                        </div>
                        @if($loop->index == 3)
                            @break
                        @endif
                    @endforeach
                @empty
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>Category 2 Option</h3>
                        </div>
                    </div>
                @endforelse
                
            </div>
        </div>
    </section>

    <!-- Content Section Two Start -->
    <section class="section content_two">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="category_two">
                        <div class="header">
                            @forelse (App\HomeCategory::where('table_name', 3)->get() as $item)
                                <h4 class="category_one"><a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">
                                    {{ $item->category->name }}
                                </a></h4>
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            @empty
                                <h2>
                                    <a href="#">Category 3</a>
                                    <span class="liner"></span>
                                </h2>
                            @endforelse
                        </div>
                        <div class="body">
                            <div class="row big">
                                <div class="col-lg-6">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</a></h4>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing.</a></h4>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing.</a></h4>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing.</a></h4>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item">
                                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                        <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing.</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="category_three">
                        <div class="header">
                            <a href="#">Category Three</a>
                        </div>
                        <div class="body">
                            <div class="big">
                                <img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt="">
                                <h4><a href="#">Lorem ipsum dolor sit.</a></h4>
                            </div>
                            <div class="small">
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                                <div class="item">
                                    <img src="https://via.placeholder.com/510x350.png" alt="">
                                    <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">More >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ads 2 Section Start -->
    <section class="section ads_two">
        <div class="container">
            <h2>Ad Space</h2>
        </div>
    </section>

    <!-- Content Section Three Start -->
    <section class="section content_three">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section Four Start -->
    <section class="section content_four">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-left">
                        <h4 class="category_one"><a href="#">Category Two</a></h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-right">
                        <h6 class="read_more"><a href="#">Read More >></a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="item">
                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                        <h4><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                        <h4><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                        <h4><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                        <h4><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section Five Start -->
    <section class="section content_three">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section Six Start -->
    <section class="section content_six">

    </section>
    <section class="section content_six">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category_three">
                        <div class="header">
                            <h2>
                                <a href="#">Category Three</a>
                                <span class="liner"></span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="big">
                                <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                            <div class="item">
                                <h4><a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a></h4>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="#">All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection