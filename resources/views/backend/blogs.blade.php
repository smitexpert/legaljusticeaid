@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/add/blogs') }}">
        <i class="mdi mdi-plus"></i> Add New Post
    </a>
</li>
@if (Auth::user()->user_role >= 2)
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-info" href="{{ url('/admin/all/blogs') }}">
        <i class="mdi mdi-magnify"></i> View All Posts
    </a>
</li>
@endif

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Blog Posts</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Title</th>
                                        <th>Post By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Some Word Of Posts Title</td>
                                        <td>User Name</td>
                                        <td>29 Jul 2019</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-danger">Remove</a>
                                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                <a href="#" class="btn btn-sm btn-primary" target="_blank">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.table').DataTable({
            "order": [[ 0, "desc" ]],

        });
    });
</script>
@endpush