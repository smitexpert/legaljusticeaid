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
        @if (session('commentStatus'))
            <li>
                <p class="text-center">
                    {{ session('commentStatus') }}
                </p>
            </li>        
        @endif
        <li>
            <div class="row">
                <div class="col-md-12">
                    @if (Auth::user())
                    <form action="{{ url('blog/comment') }}/{{ $post->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Write Your Comment</label>
                            <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-success">POST</button>
                        </div>
                    </form>
                    @else
                        <div class="text-center">
                            Please <a href="{{ url('login') }}">Login</a> to Comment This Post
                        </div>
                    @endif
                    
                </div>
            </div>
        </li>
            @forelse ($post->comments()->where('status', '1')->get() as $comment)
                <li>
                    <p>{{ $comment->comment }}</p>
                    <h5 style="text-align:right; font-style:italic;">{{ $comment->username()->first()->name }}</h5>
                </li>
            @empty
                <li>
                    <h4>No Comment Found!</h4>
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection