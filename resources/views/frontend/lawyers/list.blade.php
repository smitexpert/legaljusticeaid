@extends("frontend.layouts.lawyer")
@section('title', 'Find A Lawyer')
@section('contents')  
<div class="col-md-8">
    <div class="attorneyWrp">
        <ul>
            @forelse($lawyers as $lawyer)
            <li>
                <div class="listWrpService">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-3">
                        <div class="listImg"><img src="{{ asset("uploaded/lawyer_images") }}/{{ $lawyer->picture }}" alt="">
                            <ul class="attorney-social">
                                {!! LawyerRating($lawyer->id) !!}
                            </ul>
                        </div>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                        <h3><a href="{{ url("lawyers") }}/{{ $lawyer->slug }}">{{ $lawyer->name }}</a></h3>
                        <ul class="featureInfo">
                            <li><b>Experience: </b><i>{{ $lawyer->experience }} Years</i></li>
                            <li><b>Location: </b>{{ $lawyer->location }}</li>
                        </ul>
                        <p>
                            <b>Practice Areas: </b>
                            <i>
                                @foreach ($lawyer->practiceAreas as $practiceArea)
                                    @if($loop->index < 5)
                                        @if($loop->index > 0)
                                            , {{ $practiceArea->name }}
                                        @else
                                            {{ $practiceArea->name }}
                                        @endif
                                     @endif
                                @endforeach
                                +more
                            </i>
                        </p>
                        <p>
                            <b>Courts: </b>
                            <i>
                                @foreach ($lawyer->courts as $court)
                                    @if($loop->index < 5)
                                        @if($loop->index > 0)
                                            , {{ $court->name }}
                                        @else
                                            {{ $court->name }}
                                        @endif
                                     @endif
                                @endforeach
                                +more
                            </i>
                        </p>
                        <ul class="attorney-btns">
                            <li><a href="{{ url("lawyers") }}/{{ $lawyer->slug }}">Contact Now</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </li>
            @empty
                <h1>No Lawyers Found</h1>
            @endforelse
        </ul>
    </div>
    <div class="text-center">
            {{ $lawyers->links() }}
    </div>
    </div>
@endsection