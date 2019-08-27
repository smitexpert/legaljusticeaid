@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/user/add') }}">
        <i class="mdi mdi-plus"></i> Add New User
    </a>
</li>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Table</h4>

                @if (session('terminate'))
                <p class="card-description">
                    {{ session('terminate') }}
                </p>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th style="text-align: right">#</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role_check->rule_name }}</td>
                                        @if (Auth::user()->email != $user->email)
                                        <td><a style="float: right;" href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                                        <td><a href="{{ url('admin/user/terminate/'.$user->id) }}" class="btn btn-sm btn-danger">Terminate</a></td>
                                        @else
                                        <td style="float: right;"></td>
                                        <td></td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Terminated User</h4>

                @if (session('deleted'))
                <p class="card-description">
                    {{ session('deleted') }}
                </p>
                @endif
                <div class="table-responsive">
                    <table class="table" id="terminated_user">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th style="text-align: right">#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($terminatedUser as $terminateUser)
                            <tr>
                                <td>{{ $terminateUser->name }}</td>
                                <td>{{ $terminateUser->email }}</td>
                                <td>{{ $terminateUser->role_check->rule_name }}</td>
                                <td><a style="float: right;" href="{{ url('admin/user/restore/'.$terminateUser->id) }}" class="btn btn-sm btn-info">Restore</a></td>
                                <td><a href="{{ url('admin/user/delete/'.$terminateUser->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No User Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    //      $('.table').DataTable();
    $(document).ready(function() {
        $('#user_table').DataTable();
        $('#terminated_user').DataTable();
    });

</script>
@endpush
