@extends('backend.layouts.app')
@push('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('textEditor/summernote.css') }}">
<style>
.Editor-container a {
    padding: 8px;
}
.Editor-container a i {
    font-size: 14px;
}
</style>
@endpush
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/lawyers') }}">
        <i class="mdi mdi-arrow-left"></i> Go Back
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
            <div class="card">
                <div class="card-body">
                    <h4>Add New Lawyer</h4>
                    <div class="row">
                        <div class="col-md-12">
                        <form action="{{ url('/admin/lawyers/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group @error("name") has-danger @enderror">
                                            <label for="">Lawyer Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old("name") }}">
                                        @error('name')
                                        <label class="error mt-2 text-danger">{{ $message }}</label>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error("email") has-danger @enderror">
                                            <label for="">Lawyer Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old("email") }}">
                                            @error('email')
                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error("phone") has-danger @enderror">
                                            <label for="">Lawyer Phone No.</label>
                                            <input type="tel" name="phone" class="form-control" value="{{ old("phone") }}">
                                            @error('phone')
                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error("location") has-danger @enderror">
                                            <label for="">Lawyer Address</label>
                                            <input type="text" name="location" class="form-control" value="{{ old("location") }}">
                                            @error('location')
                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error("experience") has-danger @enderror">
                                            <label for="">Lawyer Experience</label>
                                            <input min="0" type="number" step="0.1" name="experience" class="form-control" value="{{ old("experience") }}">
                                            @error('experience')
                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error("gender") has-danger @enderror">
                                            <label for="">Select Gender</label>
                                            <select name="gender" id="" class="form-control" value="{{ old("gender") }}">
                                                <option value="">--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error("description") has-danger @enderror">
                                        <label for="">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old("description") }}</textarea>
                                    @error('description')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error("picture") has-danger @enderror">
                                        <label for="">Select Image</label>
                                        <input type="file" name="picture" class="form-control">
                                        @error('picture')
                                        <label class="error mt-2 text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
@push('scripts')
<script src="{{ asset('textEditor/summernote.js') }}"></script>
<script>
    $(document).ready(function() {
        
        // var oldDescription = $("#description").val();

        // $('#description').Editor();
        // $('#description').Editor("setText", oldDescription);
        
        // $("form").submit(function(){
        //     var description = $('#description').Editor("getText");
        //     $("#description").val(description);
        // })

        $('#description').summernote({
            placeholder: 'Write Something Here...',
            height: 300,
        });

    });
    
</script>
@endpush