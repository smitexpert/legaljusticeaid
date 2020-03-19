@extends('layouts.site')
@section('title', ''.$post->title)
@section('content')
    <!-- Category Content Start -->
    <section class="section category_content featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single_post">
                        <h2 class="post_title"><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                        <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                        <hr>

                        {!! $post->article !!}

                        <hr>
                        <div class="read_more_topic">
                            <div class="header">
                                <h3>Read More <span class="line"></span></h3>
                            </div>
                            <div class="body">
                                <div class="row">
                                    @foreach ($relateds as $post)
                                        <div class="col-lg-4">
                                            <div class="post_item">
                                                <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                                                <h2><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @include('site.partial.sidebar')
            </div>
        </div>
    </section>
@endsection