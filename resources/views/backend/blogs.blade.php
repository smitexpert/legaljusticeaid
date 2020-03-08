@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/add/blogs') }}">
        <i class="mdi mdi-plus"></i> Add New Post
    </a>
</li>
@if (Auth::user()->user_role <= 2)
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-info" href="{{ url('/admin/all/blogs') }}">
        <i class="mdi mdi-magnify"></i> View All Posts
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/all/trush/blogs') }}">
        <i class="mdi mdi-magnify"></i> All Trush
    </a>
</li>
@endif
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/trush/blogs') }}">
        <i class="mdi mdi-magnify"></i> Trush
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
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ date('Y M d', strtotime($post->created_at)) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/admin/blogs/remove') }}/{{ $post->id }}" class="btn btn-sm btn-danger">Remove</a>
                                                    <a href="{{ url('/admin/blogs/edit') }}/{{ $post->id }}" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="{{ url('/blogs') }}/{{ $post->slug }}" class="btn btn-sm btn-primary" target="_blank">View</a>
                                                </div>
                                            </td>
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