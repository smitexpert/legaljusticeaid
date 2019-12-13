@extends("frontend.layouts.service")
@section('title', 'Legal Study Blog')
@section('contents')
        <div class="col-md-8">
			<div class="serviceWrp">
					@foreach ($categories as $category)
						@if((($loop->index+1) % 2) == 1)
							<div class="row">
						@endif
						<div class="col-md-6">
							<div class="listWrpService">
								<h3>{{ $category->name }}</h3>
								<ul class="serviceName">
									@foreach ($category->services as $service)
										<li><h4><a href="{{url('/services')}}/{{ $service->slug }}">{{ $service->name }}</a></h4></li>
									@endforeach
								</ul>
							</div>
						</div>
						@if((($loop->index+1) % 2) == 0)
							</div>
						@endif
					@endforeach
			</div>
        </div>
@endsection