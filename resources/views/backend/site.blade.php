@extends('backend.layouts.app')
@section('topbutton')

@if ($sites != null)
    <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
        <a class="btn btn-sm btn-success" href="{{ url('/admin/site/logo') }}">
            <i class="mdi mdi-plus"></i> Add Logo
        </a>
    </li>
@endif


@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Site Settings</h4>

                @if (session('terminate'))
                <p class="card-description">
                    {{ session('terminate') }}
                </p>
                @endif
                
                <form action="{{ url("admin/site") }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="">Site Name</label>
                                <input type="text" name="name" class="form-control" value="@if(old('name')){{old('name')}}@elseif($sites!=null){{ $sites->name }}@endif">
                                @error('name')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group @error('phone') has-danger @enderror">
                                <label for="">Contact Phone</label>
                                <input type="text" name="phone" class="form-control" value="@if(old('phone')){{old('phone')}}@elseif($sites!=null){{ $sites->phone }}@endif">
                                @error('phone')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label for="">Contact Email</label>
                                <input type="text" name="email" class="form-control" value="@if(old('email')){{old('email')}}@elseif($sites!=null){{ $sites->email }}@endif">
                                @error('email')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('address') has-danger @enderror">
                                <label for="">Contact Address</label>
                                <input type="text" name="address" class="form-control" value="@if(old('address')){{old('address')}}@elseif($sites!=null){{ $sites->address }}@endif">
                                @error('address')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('description') has-danger @enderror">
                                <label for="">Site Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">@if(old('description')){{old('description')}}@elseif($sites!=null){{ $sites->description }}@endif</textarea>
                                @error('description')
                                    <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">SUBMIT</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush
