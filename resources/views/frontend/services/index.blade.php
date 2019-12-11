@extends("frontend.layouts.service")
@section('title', 'Legal Study Blog')
@section('contents')
        <div class="col-md-8">
			<div class="serviceWrp">
				<div class="row">
					@foreach ($categories as $category)
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
					@endforeach
				</div>
			</div>
        </div>
@endsection