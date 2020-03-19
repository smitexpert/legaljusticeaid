@extends('layouts.site')
@section('content')
    <!-- Featured Section Start -->
    <section class="section featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach (App\FeaturedPost::get() as $post)
                                @if ($loop->index == 0)
                                    <div class="featured_one">
                                        <div class="post">
                                            <a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->blog_post->cover }}" alt=""></a>
                                            <h2 class="title"><a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}">{{ $post->blog_post->title }}</a></h2>
                                            <p>
                                                {{ str_limit(strip_tags($post->blog_post->article), 300) }}
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            @foreach (App\FeaturedPost::get() as $post)
                                @if ($loop->index > 0)
                                    <div class="featured_two">
                                        <a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->blog_post->cover }}" alt=""></a>
                                        <h2><a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}">{{ $post->blog_post->title }}</a></h2>
                                    </div>
                                @endif
                                @if ($loop->index == 2)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        @foreach (App\FeaturedPost::get() as $post)
                            @if ($loop->index > 2)
                                <div class="col-lg-4">
                                    <div class="featured_two">
                                        <a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->blog_post->cover }}" alt=""></a>
                                        <h2><a href="{{ url('blogs') }}/{{ $post->blog_post->slug }}">{{ $post->blog_post->title }}</a></h2>
                                    </div>
                                </div>
                            @endif
                        @endforeach                        
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
                                @foreach (App\HomeCategory::where('table_name', 3)->get() as $item)
                                    @foreach ($item->category->posts as $post)
                                        <div class="col-lg-6">
                                            <div class="item">
                                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                                <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                            </div>
                                        </div>
                                        @if ($loop->index == 1)
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="row">
                                @forelse (App\HomeCategory::where('table_name', 3)->get() as $item)
                                    @foreach ($item->category->posts as $post)
                                       @if ($loop->index > 1)
                                       <div class="col-lg-3">
                                            <div class="item">
                                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                                <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                            </div>
                                        </div>
                                       @endif
                                       @if ($loop->index == 5)
                                           @break
                                       @endif
                                    @endforeach
                                @empty
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Option 3</h3>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="category_three">
                        <div class="header">
                            @forelse (App\HomeCategory::where('table_name', 4)->get() as $item)
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                            @empty
                                <a href="#">Option 4</a>
                            @endforelse
                        </div>
                        <div class="body">
                            @foreach (App\HomeCategory::where('table_name', 4)->get() as $item)
                                @foreach ($item->category->posts as $post)
                                    <div class="big">
                                        <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                        <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    </div>
                                    @if ($loop->index == 0)
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                            <div class="small">
                                @forelse (App\HomeCategory::where('table_name', 4)->get() as $item)
                                    @foreach ($item->category->posts as $post)
                                        @if ($loop->index > 0)
                                            <div class="item">
                                                <img src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt="">
                                                <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                            </div>
                                        @endif
                                        @if ($loop->index == 4)
                                            @break
                                        @endif
                                    @endforeach
                                @empty
                                    <h3 class="text-center">Option 4</h3>
                                @endforelse
                            </div>
                        </div>
                        <div class="footer">
                            @forelse (App\HomeCategory::where('table_name', 4)->get() as $item)
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">More >></a>
                            @empty
                                <a href="#">More >></a>
                            @endforelse
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
                @forelse (App\HomeCategory::where('table_name', 5)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 5</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 5</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 6)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 6</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 6</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 7)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 7</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 7</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 8)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 8</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 8</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
    </section>

    <!-- Content Section Four Start -->
    <section class="section content_four">
        <div class="container">
            @forelse (App\HomeCategory::where('table_name', 9)->get() as $item)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-left">
                            <h4 class="category_one"><a href="{{ url('blogs/category') }}/{{ $item->category->name }}">{{ $item->category->name }}</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <h6 class="read_more"><a href="{{ url('blogs/category') }}/{{ $item->category->name }}">Read More >></a></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($item->category->posts as $post)
                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                            </div>
                        </div>
                        @if ($loop->index == 3)
                            @break
                        @endif
                    @endforeach
                </div>                
            @empty
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-left">
                            <h4 class="category_one"><a href="#">Option 9</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <h6 class="read_more"><a href="#">Read More >></a></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center">Option 9</h2>
                    </div>
                </div>                
            @endforelse
        </div>
    </section>

    <!-- Content Section Five Start -->
    <section class="section content_three">
        <div class="container">
            <div class="row">
                @forelse (App\HomeCategory::where('table_name', 10)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 10</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 10</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 11)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 11</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 11</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 12)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 12</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 12</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 13)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 13</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 13</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
    </section>

    <!-- Content Section Six Start -->
    <section class="section content_six">
        <div class="container">
            <div class="row">
                @forelse (App\HomeCategory::where('table_name', 14)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 14</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 14</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 15)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 15</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 15</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 16)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 16</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 16</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                @forelse (App\HomeCategory::where('table_name', 17)->get() as $item)  
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($item->category->posts as $post)
                                    @if ($loop->index == 0)
                                        <div class="big">
                                            <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index > 0)
                                        <div class="item">
                                            <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        </div>
                                    @endif
                                    @if ($loop->index == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div class="footer">
                                <a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">All Posts</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="category_three">
                            <div class="header">
                                <h2>
                                    <a href="#">Option 17</a>
                                    <span class="liner"></span>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="big">
                                    <h4>Option 17</h4>
                                </div>
                                <div class="footer">
                                    <a href="#">All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection