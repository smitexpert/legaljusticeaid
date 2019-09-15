@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/moderations/comments/trush') }}">
        <i class="mdi mdi-magnify"></i> Trush
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/moderations/comments/all') }}">
        <i class="mdi mdi-magnify"></i> All
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
                    <h4>Pending Comments</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td><h5>{{ $comment->post()->first()->title }}</h5></td>
                                            <td><p>{{ $comment->comment }}</p></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/admin/moderations/comments/approve') }}/{{ $comment->id }}" class="btn btn-success btn-sm">Approve</a>
                                                    <a href="{{ url('/admin/moderations/comments/remove') }}/{{ $comment->id }}" class="btn btn-danger btn-sm">Remove</a>
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
         $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@endpush