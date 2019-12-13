@extends("frontend.layouts.lawyer")
@section('title', "Lawyer ".$lawyer->name)
@section('contents')  
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="attorneyWrp">
                <ul>
                    <li>
                    <div class="listWrpService">
                        <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <div class="listImg detailImg"><img src="{{ asset("uploaded/lawyer_images") }}/{{ $lawyer->picture }}" alt="">
                            <ul class="attorney-social">
                                {!! LawyerRating($lawyer->id) !!}
                            </ul>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <h3><strong><a href="{{ url("lawyers") }}/{{ $lawyer->slug }}">{{ $lawyer->name }}</a></strong></h3>
                            <ul class="featureInfo">
                            <li><i class="fa fa-phone" aria-hidden="true"></i> @if($SiteOptions != null)<span>{{ $SiteOptions->phone }}</span>@else{{ '0123 - 456 - 780' }}@endif</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>@if($SiteOptions != null)<span>{{ $SiteOptions->email }}</span>@else{{ 'info@site.com' }}@endif</li>
                            </ul>
                            <p>
                                <b>Practice Areas: </b>
                                @foreach ($lawyer->practiceAreas as $practiceArea)
                                    @if($loop->index > 0)
                                        , <a href="{{ url("lawyers/practice-areas") }}/{{ $practiceArea->slug }}">{{ $practiceArea->name }}</a>
                                    @else
                                        <a href="{{ url("lawyers/practice-areas") }}/{{ $practiceArea->slug }}">{{ $practiceArea->name }}</a>
                                    @endif
                                @endforeach
                            </p>
                            <ul class="attorney-btns">
                            <li><a href="#contact">Contact Now</a></li>
                            </ul>
                        </div>
                        </div>
                        <h3 class="innerhead">Summary</h3>
                        
                        {!! $lawyer->description !!}
            
                        <br>
                        <ul class="edu">
                        <li>
                            <h4>Specializations:</h4>
                            <p>
                                @foreach ($lawyer->specializations as $specialization)
                                    @if($loop->index > 0)
                                        , <a href="{{ url("lawyers/specializations") }}/{{ $specialization->slug }}">{{ $specialization->name }}</a>
                                    @else
                                        <a href="{{ url("lawyers/specializations") }}/{{ $specialization->slug }}">{{ $specialization->name }}</a>
                                    @endif
                                @endforeach
                            </p>
                        </li>
                        <li>
                            <h4>Courts:</h4>
                            <p>
                                @foreach ($lawyer->courts as $court)
                                    @if($loop->index > 0)
                                        , <a href="{{ url("lawyers/courts") }}/{{ $court->slug }}">{{ $court->name }}</a>
                                    @else
                                        <a href="{{ url("lawyers/courts") }}/{{ $court->slug }}">{{ $court->name }}</a>
                                    @endif
                                @endforeach
                            </p>
                        </li>
                        </ul>
                    </div>
                    </li>
                </ul>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="edu">
                <li>
                    <h4>Lawyer Ratings</h4>
                </li>
                @if(session('message'))
                <li>
                    <p>{{ session('message') }}</p>
                </li>
                @endif
                @if ($errors->any())
                <li>
                    <p>Your Rating Already Submited!</p>
                </li>
                @endif
                @if (Auth::user())
                    @if ($lawyer->userRatings->where('users_id', Auth::user()->id)->count() > 0)
                        <li>
                            <h2>Your Ratings</h2>
                            <h3>{{ $lawyer->userRatings->where('users_id', Auth::user()->id)->first()->feedback_title }}</h3>
                            <ul class="attorney-social">
                                {!! SingleRating($lawyer->userRatings->where('users_id', Auth::user()->id)->first()->ratings) !!}
                            </ul>
                            <p>{{ $lawyer->userRatings->where('users_id', Auth::user()->id)->first()->feedback }}</p>
                        </li>
                    @else
                        <li>
                            <form action="/lawyers/{{ $lawyer->slug }}" method="POST">
                                @csrf
                                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="lawyer" value="{{ $lawyer->id }}">
                                    <h4>Rate The Lawyer</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="feedback">Feedback</label>
                                                <textarea class="form-control" name="feedback" id="feedback"></textarea>
                                                @error('feedback')
                                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">SUBMIT</button>
                                        </div>
                                    </div>
                                    
                            </form>
                        </li>
                    @endif
                @else
                    <li>
                        <p>Please Login To Give A Feedback To this lawyer</p>
                    </li>
                @endif
                @forelse ($lawyer->ratings as $rating)
                    <li>
                        <h3>{{ $rating->user->name }}</h3>
                        <ul class="attorney-social">
                            {!! SingleRating($rating->ratings) !!}
                        </ul>
                        <p>{{ $rating->feedback }}</p>
                    </li>
                    <div class="rating-pagination">
                        {{ $lawyer->ratings->links() }}
                    </div>

                @empty
                    <li>
                        <p>No Rating Founds!</p>
                    </li>
                @endforelse
                
            </ul>
        </div>
    </div>
</div>

@endsection