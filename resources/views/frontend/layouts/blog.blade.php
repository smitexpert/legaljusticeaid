@extends('frontend.layouts.app')
@push('styles')
    @stack('style')
@endpush
@section('content')

<div class="inner-content">
    <div class="container"> 
        
        <!-- attorney start -->
        <div class="row">
            @yield('contents')
        <div class="col-md-4"> 
            <!-- Side Bar -->
            <div class="sidebar"> 
            <!-- Search -->
            <div class="widget searchside">
                <h5 class="widget-title">Search</h5>
                <div class="search">
                <form>
                    <input type="text" class="form-control" placeholder="Search">
                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                </form>
                </div>
            </div>

            <div class="widget">
                <h5 class="widget-title">Categories</h5>
                <ul class="categories">
                    @foreach (App\BlogCategory::with('posts')->get() as $category)
                        <li><a href="{{ url('blogs/category') }}/{{ $category->slug }}"> {{ $category->name }} ({{ $category->posts->count() }})</a></li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Related practice -->
            <div class="widget cases">
                <h5 class="widget-title">Popular Post</h5>
                <ul class="papu-post">
                    @foreach ('App\BlogPost'::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get() as $post)
                        <li>
                            <div class="media-left"> <a href="{{ url('/blogs') }}/{{ $post->slug }}"><img src="{{ url('/uploaded/post_thumb') }}/{{ $post->cover }}" alt=""></a> </div>
                            <div class="media-body">
                            <h3> <a class="media-heading" href="{{ url('/blogs') }}/{{ $post->slug }}">{{ $post->title }}</a> </h3>
                            <p>{{ str_limit(strip_tags($post->article), 30) }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
        </div>
        <!-- practice detail end --> 
        
    </div>
</div>

    
@endsection
@push('scripts')
    @stack('script')
@endpush