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

            {{-- <div class="widget">
                <h5 class="widget-title">Categories</h5>
                <ul class="categories">
                    @foreach (App\BlogCategory::all() as $category)
                        <li><a href="{{ url('blogs/category') }}/{{ $category->slug }}"> {{ $category->name }} ({{ App\BlogPostCategory::where('cateogry_id', $category->id)->count() }})</a></li>
                    @endforeach
                </ul>
            </div> --}}
            
            <!-- Related practice -->
            <div class="sidebar-find">
                <div class="text-center">
                    <a href="{{ url('lawyers') }}">
                        <div class="img-center">
                            <img src="{{ url('frontend/images') }}/lawyer.png" alt="" class="img-circle img-responsive">
                        </div>
                        <h1 class="fint-text">FIND A LAWYER</h1>
                    </a>
                </div>
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