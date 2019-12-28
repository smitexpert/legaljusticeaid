@extends('frontend.layouts.me')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="inner-content">
                    <div class="listWrpService">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <div class="listImg detailImg"><img src="http://127.0.0.1:8000/uploaded/lawyer_images/91.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3><strong><a href="http://127.0.0.1:8000/user/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a></strong></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">
                                <a class="btn btn-success" href="{{ url('/new/advices') }}">Request For Advice</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="listWrpService">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs">
                                    <li @if(url()->current() == url('me')) class="active" @endif><a href="{{ url('me') }}">Feed</a></li>
                                    <li @if(url()->current() == url('me/questions')) class="active" @endif><a href="{{ url('me/questions') }}">Questions</a></li>
                                    <li @if(url()->current() == url('me/responses')) class="active" @endif><a href="{{ url('me/responses') }}">Responses</a></li>
                                    <li class="pull-right">
                                        <a href="#">Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection