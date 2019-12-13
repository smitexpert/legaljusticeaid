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
                <div class="listWrpService">
                    <h3>@foreach ($service->category as $category)
                        {{ $category->name }}
                    @endforeach</h3>
                    <ul class="serviceName">
                        @foreach ($relateds as $service)
                            <li><h4><a href="{{url('/services')}}/{{ $service->slug }}">{{ $service->name }}</a></h4></li>
                        @endforeach
                    </ul>
                </div>
            </ul>
        </div>
    </div>
@endsection