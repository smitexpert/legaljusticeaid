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
    <a class="btn btn-sm btn-success" href="{{ url('/admin/lawyers') }}">
        <i class="mdi mdi-arrow-left"></i> Go Back
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-info" href="{{ url('/admin/lawyers/edit/') }}/{{ $lawyer->id }}">
        <i class="mdi mdi-pencil-box-outline"></i> Edit
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>View <i style="text-decoration: underline; color:chocolate;">{{ $lawyer->name }}</i> Profile</h4>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lawyer-img">
                                        <img src="{{ asset('/uploaded/lawyer_images') }}/{{ $lawyer->picture }}" alt="">
                                    </div>
                                    <div class="ratting">
                                        <ul>
                                            {!! $rating !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                    <div class="col-md-12">
                                        <h6>Name:</h6>
                                        <h2>{{ $lawyer->name }}</h2>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{ $lawyer->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>:</td>
                                                <td>{{ $lawyer->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Experience</td>
                                                <td>:</td>
                                                <td>{{ $lawyer->experience }} Yrs</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>:</td>
                                                <td>{{ ucfirst($lawyer->gender) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td>:</td>
                                                <td>{{ $lawyer->location }}</td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Courts</h3>
                                    <table class="table">
                                        @foreach ($lawyer->courts as $court)
                                        <tr>
                                            <td>{{ $court->name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Practice Areas</h3>
                                    <table class="table">
                                        @foreach ($lawyer->practiceAreas as $practiceArea)
                                        <tr>
                                            <td>{{ $practiceArea->name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Specialization</h3>
                                    <table class="table">
                                        @foreach ($lawyer->specializations as $specialization)
                                        <tr>
                                            <td>{{ $specialization->name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="description">
                                        {!! $lawyer->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection