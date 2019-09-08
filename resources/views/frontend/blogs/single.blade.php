@extends("frontend.layouts.blog")
@section('title', ''.$post->title)
@section('contents')  
<div class="col-md-8"> 
<!-- Blog List start -->
    <div class="blogWraper blogdetail">
        <ul class="blogList">
        <li>
            <div class="postimg"><img src="{{ asset('/uploaded/post_images') }}/{{ $post->cover }}" alt="Blog Title">
                <div class="date"> {{ date('d', strtotime($post->created_at)) }} <span>{{ strtoupper(date('M', strtotime($post->created_at))) }}</span></div>
            </div>
            <div class="post-header margin-top30">
                <h4>{{ $post->title }}</h4>
                <div class="postmeta">By : <span>{{ $post->user()->first()->name }} </span> Category : <span>{{ $post->category()->first()->name }}</span></div>
            </div>
            {!! $post->article !!}
        </li>
        </ul>
    </div>
</div>
@endsection