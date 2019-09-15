@extends("frontend.layouts.advice")
@section('title', 'Advice - '.$advice->title)
@push('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}textEditor/summernote.css">
    <style>
        .btn-check {
            color: green;
            background: none;
            border: none;
            font-size: 18px;
        }
    </style>
@endpush
@section('contents')  
<div class="col-md-8"> 
<!-- Blog List start -->
    <div class="blogWraper blogdetail">
        <ul class="blogList">
            <li>
                <div class="post-header margin-top30 headingTitle">
                    <h1>{{ $advice->title }}</h1>
                    <div class="postmeta">Category : <span><a href="#">{{ $advice->category()->first()->name }}</a></span></div>
                </div>
                {!! $advice->details !!}
            </li>
            
            @if(Auth::user())
            
                @if ($advice->answers->where('user_id', Auth::user()->id)->count() == 0)
                    <li>
                        <form action="{{ url('/advice/') }}/{{ $advice->slug }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Write Your Advice Here</label>
                                        <textarea name="answer" id="details" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endif
            
            @endif


            @forelse ($advice->answers as $answer)
                <li>
                    @if ($advice->user_id == Auth::user()->id)
                        <form action="{{ url('/advice') }}/mark/{{ $advice->slug }}" method="POST">
                            @csrf
                            <input type="hidden" name="markid" value="{{ $answer->id }}">
                            <button title="Mark as Wright Answer" class="btn-check" type="submit"><span class="fa fa-check"></span></button>
                        </form>
                    @endif
                    {!! $answer->answer !!}
                    <p class="text-right">
                        <i>{{ $answer->user()->first()->name }}</i>
                    </p>
                </li>
            @empty
                <li>
                    <div class="text-center">
                        <h3>No Answer Found!</h3>
                    </div>
                </li>
            @endforelse
            
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
                    placeholder: 'Write Your Advice Here...',
                    height: 200,
                });

            });
    </script>
@endpush