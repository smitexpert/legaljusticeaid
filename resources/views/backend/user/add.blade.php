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
                <form class="forms-sample" method="POST" action="{{ url('/admin/user/add') }}">
                    @csrf
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
                        <div class="col-md-3">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group @error('email') has-danger @enderror">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group @error('password') has-danger @enderror">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                @error('password')
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
                                    <option value="{{ $userRole->id }}">{{ $userRole->rule_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_role')
                                    <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                                    @enderror
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success btn-block">ADD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
