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
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/blogs') }}">
        <i class="mdi mdi-arrow-left"></i> Backe
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add New Post</h4>
                    <form action="/admin/add/blogs" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                         <div class="float-right">
                                                <button class="btn btn-success" >POST</button>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group @error('title') has-danger @enderror">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                            @error('title')
                                                <label for="" class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error('feature-img') has-danger @enderror">
                                            <label for="">Select Feature Image</label>
                                            <input type="file" name="feature-img" class="form-control" value="{{ old('feature-img') }}">
                                            @error('feature-img')
                                            <label for="" class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('details') has-danger @enderror">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="details" id="details" cols="30" rows="10">{{ old("details") }}</textarea>
                                            @error('details')
                                                <label for="" class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group @error('category') has-danger @enderror">
                                            <label for="">Select Category</label>
                                            <select name="category" id="" class="form-control selectpicker" data-live-search="true">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <label for="" class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group  @error('tags') has-danger @enderror">
                                            <label for="">Input Tags</label>
                                            <input name="tags" id="tags" onkeydown="postTags(event)" type="text" class="form-control">
                                            @error('tags')
                                                <label for="" class="error mt-2 text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Tags:</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-tags">
                                                </div>
                                            </div>
                                        </div>
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

        $(".selectpicker").selectpicker();

    });

    function postTags(event){
        var tag = $(event.target).val();
        var x = event.which || event.keyCode;
        if((x==13) || (x==188)){
            event.preventDefault();
            $(".input-tags").append('<div class="tag">'+tag+' <i onclick="removeTags(event)" class="fa fa-close"></i><input type="hidden" name="tags[]" value="'+tag+'"></div>');
            $(event.target).val("");
        }
    }

    function removeTags(event){
        $(event.target).closest('.tag').remove();
    }
    
</script>
@endpush