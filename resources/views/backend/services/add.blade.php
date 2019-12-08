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
.input-tags .tag{
        cursor: pointer;
        float: left;
        margin: 0 2px;
        padding: 2px;
    }
</style>
@endpush   
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/services') }}">
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
                    <h4>Add New Service</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button class="btn btn-success">POST</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input id="title" name="title" value="{{ old('title') }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control"></textarea>
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

            $('#description').summernote({
                placeholder: 'Write Something Here...',
                height: 300,
            });

            $(".selectpicker").selectpicker();

        });
        
         $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@endpush