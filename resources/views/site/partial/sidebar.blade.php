<div class="col-lg-4">
    <div class="widget category_one">
        
        @forelse (App\HomeCategory::where('table_name', 1)->get() as $item)
            <div class="header">
                <h3><a href="{{ url('blogs/category') }}/{{ $item->category->slug }}">{{ $item->category->name }}</a></h3>
            </div>
        @empty
            <div class="header">
                <h3><a href="#">Category 1</a></h3>
            </div>
        @endforelse
        <div class="body">
            @forelse (App\HomeCategory::where('table_name', 1)->get() as $item)
                @foreach ($item->category->posts as $post)
                    <div class="item">
                        <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ asset('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                        <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                    </div>
                    @if ($loop->index == 1)
                        @break
                    @endif
                @endforeach
            @empty
                <div class="item">
                    <h4>Category 1</h4>
                </div>
            @endforelse
        </div>
    </div>
    <div class="widget tab">
        <div class="header">
            <ul id="widget_tab">
                <li class="active" id="recent"><a href="#">Recent</a></li>
                <li id="popular"><a href="#">Populer</a></li>
            </ul>
        </div>
        <div class="body">
            <div id="recent_post" class="tab_post show">
                @foreach (App\BlogPost::orderBy('id', 'desc')->limit(10)->get() as $post)
                    <div class="item">
                        <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ url('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                        <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                    </div>
                @endforeach
            </div>
            <div id="popular_post" class="tab_post">
                @foreach (App\BlogPost::withCount('comments')->orderBy('comments_count', 'desc')->limit(10)->get() as $post)
                    <div class="item">
                        <a href="{{ url('blogs') }}/{{ $post->slug }}"><img class="img-fluid" src="{{ url('uploaded/post_images') }}/{{ $post->cover }}" alt=""></a>
                        <h4><a href="{{ url('blogs') }}/{{ $post->slug }}">{{ $post->title }}</a></h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>