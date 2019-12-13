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
                    <h5 class="widget-title">Practice Area</h5>
                    <ul class="categories">
                        @foreach (App\PracticeArea::with('practiceAreasLawyers')->get() as $category)
                            <li><a href="{{ url('/') }}/lawyers/practice-areas/{{ $category->slug }}"> {{ $category->name }} ({{ $category->practiceAreasLawyers->count() }})</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Lawyer By Court</h5>
                    <ul class="categories">
                        @foreach (App\Court::with('courts')->get() as $category)
                            <li><a href="{{ url('/') }}/lawyers/courts/{{ $category->slug }}"> {{ $category->name }} ({{ $category->courts->count() }})</a></li>
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