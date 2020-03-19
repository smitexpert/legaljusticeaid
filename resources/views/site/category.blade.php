@extends('layouts.site')
@section('title', 'Category: '.$categoryPosts)
@section('content')
    <!-- Category Content Start -->
    <section class="section category_content featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($categoryPosts as $post)
                            @if ($loop->index == 0)
                                <div class="col-lg-12">
                                    <div class="big_content">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="post">
                                                    <h2><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                                                    <p>
                                                        {{ str_limit(strip_tags($post->article), 300) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6">
                                    <div class="small_content">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" class="img-fluid" alt=""></a>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    {{ $categoryPosts->links() }}
                </div>
                @include('site.partial.sidebar')
            </div>
        </div>
    </section>
@endsection