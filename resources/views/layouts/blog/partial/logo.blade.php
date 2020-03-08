<a href="{{ route('blog.index') }}">
    <img src="@if($SiteOptions != null){{ asset("uploaded/logo") }}/{{ $SiteOptions->logo }}@else{{ asset("uploaded/logo/default-logo.jpg") }}@endif" alt=""/>
 </a>