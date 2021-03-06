@extends('layouts.blog.blog')
@section('contents')
    <div class="row">
        <div class="col-12">
            <h2 class="block-title">
                <span class="title-angle-shap"> Category :  {{ $category->name }} </span>
            </h2>
        </div><!-- col end -->
    </div><!-- row end -->
    <div class="row ts-gutter-10">
        @foreach ($categoryPosts as $post)
            <div class="col-md-6">
                <div class="post-block-style">
                    <div class="post-thumb">
                        <a href="{{ url('/blogs') }}/{{ $post->slug }}">
                            <img class="img-fluid" src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="">
                        </a>
                        <div class="grid-cat">
                            <a class="post-cat lifestyle" href="{{ url('blogs/category') }}/{{ $category->slug }}">{{ $category->name }}</a>
                        </div>
                    </div>
                    
                    <div class="post-content">
                        <h2 class="post-title title-md">
                            <a href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a>
                        </h2>
                        <div class="post-meta mb-7">
                            <span class="post-author"><i class="fa fa-user"></i> {{ $post->user->name }}</span>
                            <span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($post->created_at)) }}</span>
                        </div>
                        <p>{{ Str::limit(strip_tags($post->article), 100) }}</p>
                    </div><!-- Post content end -->
                </div>
            </div><!-- col end -->
        @endforeach
        
    </div><!-- row end -->
    <div class="gap-30 d-none d-md-block"></div>
    <div class="row">
        <div class="col-12">
            {{ $categoryPosts->links('layouts.blog.partial.pagination') }}
        </div>
    </div>
@endsection