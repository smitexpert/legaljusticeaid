@extends("frontend.layouts.service")
@section('title', 'Legal Study Blog')
@section('contents')
    <div class="col-md-8">
        <div class="blogWraper blogdetail">
            <ul class="blogList">
                <li>
                    <div class="post-header margin-top30 headingTitle">
                        <h1>{{ $service->title }}</h1>
                    </div>
                    {!! $service->description !!}
                </li>
            </ul>
        </div>
    </div>
@endsection