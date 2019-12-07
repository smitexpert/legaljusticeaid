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
                <h5 class="widget-title">Adivce Categories</h5>
                <ul class="categories">
                    @foreach (App\PracticeArea::all() as $advice)
                        <li><a href="{{ url('/advice/category') }}/{{ $advice->slug }}"> {{ $advice->name }} ({{ App\AdviceCategory::where('practicearea_id', $advice->id)->count() }})</a></li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Related practice -->
            <div class="widget cases">
                <h5 class="widget-title">Related practice</h5>
                <ul class="papu-post">
                <li>
                    <div class="media-left"> <a href="#"><img src="images/denterpse-corruption.jpg" alt=""></a> </div>
                    <div class="media-body">
                    <h3> <a class="media-heading" href="#">Criminal Tax Fraud</a> </h3>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </li>
                <li>
                    <div class="media-left"> <a href="#"><img src="images/child-sexual.jpg" alt=""></a> </div>
                    <div class="media-body">
                    <h3> <a class="media-heading" href="#">Child Sexual Abuse</a> </h3>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </li>
                <li>
                    <div class="media-left"> <a href="#"><img src="images/drug-injury.jpg" alt=""></a> </div>
                    <div class="media-body">
                    <h3> <a class="media-heading" href="#">Drug Injury</a> </h3>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </li>
                <li>
                    <div class="media-left"> <a href="#"><img src="images/illegal-construction.jpg" alt=""></a> </div>
                    <div class="media-body">
                    <h3> <a class="media-heading" href="#">Illegal Construction</a> </h3>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </li>
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