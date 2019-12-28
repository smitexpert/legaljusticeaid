@extends('frontend.layouts.me')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="inner-content">
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
                    <div class="listWrpService">
                        <h3>Notifications</h3>
                        @foreach (Auth::user()->notifications()->limit(50)->get() as $notification)
                        @php
                            $notification->markAsRead();
                        @endphp
                            @if ($notification->type == 'App\Notifications\AnswerNotification')
                                <a class="notification-preview" href="#">
                                    <div class="preview-thumb">
                                        <div class="preview-icon bg-success">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                    </div>
                                    <div class="preview-content">
                                        <h6><b>Answered:</b> {{ str_limit($notification->data['advice'], 30) }}</h6>
                                        <p>{{ $notification->data['user'] }} - {{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            @endif
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection