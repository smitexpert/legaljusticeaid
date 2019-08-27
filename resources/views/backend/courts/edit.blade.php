@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/courts') }}">
        <i class="mdi mdi-arrow-left"></i> Go Back
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Court Name</h4>
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <form action="{{ url('/admin/courts/update') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group @error('courts') has-danger @enderror">
                                    <label for="">Court Name</label>
                                    <input type="hidden" name="id" value="{{ $courts->id }}">
                                    <input type="text" class="form-control" name="courts" value="@if(old('courts')){{old('courts')}}@else{{$courts->name}}@endif">
                                    @error('courts')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button class="btn btn-success">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection