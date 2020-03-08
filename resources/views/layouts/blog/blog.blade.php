@extends('layouts.blog.master')
@section('master')
<div class="col-lg-8">
	@yield('contents')
</div><!-- col-lg-8 -->
<div class="col-lg-4">
	@include('layouts.blog.partial.sidebar')
</div>
@endsection