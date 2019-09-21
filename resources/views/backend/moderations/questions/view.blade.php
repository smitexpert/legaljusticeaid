@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/moderations/questions') }}">
        <i class="mdi mdi-arrow-left"></i> Back
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Question: {{ $question->title }}</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $question->details !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection