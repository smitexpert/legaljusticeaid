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

            @yield('recentanswered')
            
            <div class="widget">
                <h5 class="widget-title">Adivce Categories</h5>
                <ul class="categories">
                    @foreach (App\PracticeArea::with('advices')->get() as $area)
                        <li><a href="{{ url('/advice/category') }}/{{ $area->slug }}"> {{ $area->name }} ({{ $area->advices->count() }})</a></li>
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