@extends('backend.layouts.app')
@push('styles')
    <style>
        .lawyer-img{
            text-align: center;
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 500px;
            margin: 0 auto;
        }

        .lawyer-img img {
            width: 150px;
            height: auto;
        }
    </style>
@endpush
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/ratings') }}">
        <i class="mdi mdi-arrow-left"></i> Back
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Review Ratings</h4>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lawyer-img">
                                        <img src="{{ asset('uploaded/lawyer_images') }}/{{ $rating->lawyer->picture }}" alt="">
                                    </div>
                                    <div class="ratting">
                                        <ul>
                                            {!! SingleRating($rating->ratings) !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                    <div class="col-md-12">
                                        <h6>Name:</h6>
                                        <h2>{{ $rating->lawyer->name }}</h2>
                                    </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>User:</h6>
                                    <h4>{{ $rating->user->name }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-left">
                                        <a href="{{ url('admin/ratings/remove') }}/{{ $rating->id }}" class="btn btn-sm btn-danger">Remove</a>
                                        @if ($rating->status == 0)
                                            <a href="{{ url('admin/ratings/approve') }}/{{ $rating->id }}" class="btn btn-sm btn-success">Approve</a>
                                        @else
                                            <a href="{{ url('admin/ratings/disapprove') }}/{{ $rating->id }}" class="btn btn-sm btn-warning">Disapprove</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Feedback</h3>
                                    <p>
                                        {{ $rating->feedback }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection