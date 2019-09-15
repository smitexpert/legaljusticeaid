@extends("frontend.layouts.advice")
@section('title', 'Legal Study Blog')
@push('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}textEditor/summernote.css">
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/bootstrap-select.min.css">
@endpush
@section('contents')  
<div class="col-md-8"> 
    <!-- Blog List start -->
    <div class="blogWraper">
      <ul class="blogList">
         <li>
            <form action="{{ url('/new/advices') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="">Title</label>
                            <input name="title" type="text" class="form-control" value="{{ old('title') }}">
                            @error('title') <label for="" class="has-error"><p style="color: red">{{ $message }}</p></label> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('details') has-error @enderror">
                            <label for="">Details</label>
                            <textarea name="details" id="details" cols="30" rows="20" class="form-control">
                                {{ old('details') }}
                            </textarea>
                            @error('details') <label for="" class="has-error"><p style="color: red">{{ $message }}</p></label> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group @error('category') has-error @enderror">
                            <br>
                            <label for="">Select Category</label>
                            <select name="category" id="" class="form-control selectpicker" data-live-search="true">
                                <option value="">--</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <label for="" class="has-error"><p style="color: red">{{ $message }}</p></label> @enderror
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-right">
                        <br>
                        <br>
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
          </li>
      </ul>
    </div>
  </div>
@endsection
@push('scripts')
<script src="{{ asset('/') }}textEditor/summernote.js"></script>
<script src="{{ asset('/') }}dist/js/bootstrap-select.min.js"></script>
    <script>
            $(document).ready(function() {

            $('#details').summernote({
                placeholder: 'Write Something Here...',
                height: 300,
            });

            $(".selectpicker").selectpicker();

            });
    </script>
@endpush