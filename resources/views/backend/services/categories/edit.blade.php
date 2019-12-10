@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/categories/services/') }}">
        <i class="mdi mdi-arrow-left"></i> Back
    </a>
</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Service Categories</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('/admin/categories/services') }}/{{ $category->id }}/edit" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="name" class="form-control" value="@if(old('name')){{ old('name') }}@else{{ $category->name }}@endif">
                                            @error('name')
                                            <label class="error mt-2 text-danger" for="">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection