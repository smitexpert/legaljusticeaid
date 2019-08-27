@extends('backend.layouts.app')
@section('topbutton')

<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/site') }}">
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
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Logo</h4>
                
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url("admin/site/logo/header") }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('header_logo') has-danger @enderror">
                                        <label for="">Select Header Logo</label>
                                        <input name="header_logo" type="file" class="form-control">
                                        @error('header_logo')
                                            <label for="" class="error text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                            <form action="{{ url("admin/site/logo/footer") }}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('footer_logo') has-danger @enderror">
                                        <label for="">Select Footer Logo</label>
                                        <input name="footer_logo" type="file" class="form-control">
                                        @error('footer_logo')
                                            <label for="" class="error text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success">Upload</button>
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
<script>

</script>
@endpush
