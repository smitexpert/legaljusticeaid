@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/blog/list') }}">
        Add Item From Post
    </a>
</li>
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
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $post->blog_post->title }}</td>
                                        <td>{{ $post->blog_post->user->name }}</td>
                                        <td>{{ date('Y M d', strtotime($post->blog_post->created_at)) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/admin/blog/slider/remove') }}/{{ $post->id }}" class="btn btn-sm btn-danger">Remove</a>
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