@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/blogs/categories') }}">
        <i class="mdi mdi-arrow-left"></i> Backe
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
                    <h4>Edit Category</h4>
                    <form action="{{ url('admin/blogs/categories/edit') }}/{{ $category->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" name="category" class="form-control" value="@if(old('category')){{ old('category') }}@else{{ $category->name }}@endif">
                                    @error('category')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button class="btn btn-block btn-success" type="submit">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection