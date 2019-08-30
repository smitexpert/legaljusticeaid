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
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add New Post</h4>
                    <form action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="details" id="details" cols="30" rows="10">{{ old("details") }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button class="btn btn-success" >POST</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('textEditor/summernote.js') }}"></script>
<script>
    $(document).ready(function() {

        $('#details').summernote({
            placeholder: 'Write Something Here...',
            height: 300,
        });

    });
    
</script>
@endpush