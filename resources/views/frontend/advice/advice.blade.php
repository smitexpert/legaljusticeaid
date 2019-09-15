@extends("frontend.layouts.advice")
@section('title', 'Legal Study Blog')
@section('contents')  
<div class="col-md-8"> 
    <!-- Blog List start -->
    <div class="blogWraper">
      
        <div class="row">
            <div class="col-md-12">
              <div class="text-right">
                <a class="btn btn-success" href="/new/advices">Request For Advice</a>
              </div>
            </div>
          </div>
          <br>
      <ul class="blogList">
        @forelse ($advices as $advice)
          <li>
            <div class="row">
                <div class="col-md-12">
                <div class="post-header">
                    <h4><a @if($advice->is_answerd == 1)style="color: green;"@endif href="{{ url('/advice') }}/{{ $advice->slug }}">{{ $advice->title }}</a></h4>
                    <div class="postmeta">From : <a href="{{ url('/advice') }}/category/{{ $advice->category()->first()->slug }}">{{ $advice->category()->first()->name }}</a></div>
                </div>
                <p>{{ str_limit(strip_tags($advice->details), 100, '...') }}</p>
                <div class="readmore text-right"><a href="{{ url('/advice') }}/{{ $advice->slug }}">Read More</a></div>
                </div>
              </div>
            </li>
        @empty
            <h3>No Advice Question Found!</h3>
        @endforelse
         <div class="text-right">
            {{ $advices->links() }}
         </div>
      </ul>
    </div>
    
    <!-- Pagination -->
    <div class="pagiWrap">
      <div class="row">
        <div class="col-md-12 text-center">
            {{-- {{ $posts->links() }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection