@extends("frontend.layouts.blog")
@section('title', 'Legal Study Blog')
@section('contents')  
<div class="col-md-8"> 
    <!-- Blog List start -->
    <div class="blogWraper">
      <ul class="blogList">
          @forelse ($posts as $post)
          <li>
            <div class="row">
                <div class="col-md-5 col-sm-4">
                <div class="postimg"><img src="{{ asset("/uploaded/post_thumb/") }}/{{ $post->cover }}" alt="{{ $post->title }}">
                    <div class="date"> {{ date('d', strtotime($post->created_at)) }} <span>{{ strtoupper(date('M', strtotime($post->created_at))) }}</span></div>
                </div>
                </div>
                <div class="col-md-7 col-sm-8">
                <div class="post-header">
                    <h4><a href="/blogs/{{ $post->slug }}">{{ $post->title }}</a></h4>
                    <div class="postmeta">By : <span>{{ $post->user->name }} </span> Category : <span><a href="{{ url('blogs/category') }}/@foreach($post->category as $cat){{ $cat->slug }}@endforeach">
                      @foreach ($post->category as $cat)
                          {{ $cat->name }}
                      @endforeach
                    </a></span></div>
                </div>
                <p>{{ str_limit(strip_tags($post->article), 100, '...') }}</p>
                <div class="readmore"><a href="/blogs/{{ $post->slug }}">Read More</a></div>
                </div>
            </div>
            </li>
          @empty
              <h1>No Post Found</h1>
          @endforelse
      </ul>
    </div>
    
    <!-- Pagination -->
    <div class="pagiWrap">
      <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection