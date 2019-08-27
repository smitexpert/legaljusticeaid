@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/user') }}">
        <i class="mdi mdi-arrow-left"></i> Go Back
    </a>
</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <form class="forms-sample" method="POST" action="{{ url('/admin/user/edit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> {{ session('update') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="name">Name</label>
                            <input type="hidden" name="id" value="{{ $userId->id }}">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="@if(old('name')){{ old('name') }}@else{{ $userId->name }}@endif">
                                @error('name')
                                <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@if(old('email')){{ old('email') }}@else{{ $userId->email }}@endif" readonly>
                                @error('email')
                                <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group @error('user_role') has-danger @enderror">
                                <label for="user_type">User Type</label>
                                <select class="form-control" name="user_role" id="user_role" value="{{ old('user_role') }}">
                                   <option value=""></option>
                                    @foreach ($userRoles as $userRole)
                                    @if($userId->user_role == $userRole->id )
                                    <option value="{{ $userRole->id }}" selected>{{ $userRole->rule_name }}</option>
                                    @else
                                    <option value="{{ $userRole->id }}">{{ $userRole->rule_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('user_role')
                                <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                @enderror
                            </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-info btn-block">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection