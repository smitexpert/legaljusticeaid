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
                    <h4><a @if($advice->is_answerd == 1)style="color: green;"@endif href="{{ url('/advice') }}/{{ $advice->id }}">{{ $advice->title }}</a></h4>
                    <div class="postmeta">From : <a href="{{ url('/advice') }}/category/@foreach ($advice->category as $cat){{ $cat->slug }} @endforeach">@foreach ($advice->category as $cat)
                        {{ $cat->name }}
                    @endforeach</a></div>
                </div>
                <p>{{ str_limit(strip_tags($advice->details), 100, '...') }}</p>
                <div class="row">
                  <div class="col-xs-6">
                    <h4 class="text-primary">Response <span class="badge">{{ $advice->answers->count() }}</span></h4>
                  </div>
                  <div class="col-xs-6">
                      <div class="readmore text-right">
                        <a href="{{ url('/advice') }}/{{ $advice->id }}">Read More</a></div>
                      </div>
                  </div>
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