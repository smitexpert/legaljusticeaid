@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/blogs/categories') }}">
        <i class="mdi mdi-arrow-left"></i> Backe
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
                    <h4>Trash List</h4>
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px;">#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ url("/admin/blogs/categories/restore") }}/{{ $category->id }}" class="btn btn-sm btn-info">Restore</a>
                                                            <a href="{{ url("/admin/blogs/categories/delete") }}/{{ $category->id }}" class="btn btn-sm btn-danger">Remove</a>
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
            $('.table').DataTable();
        });
    </script>
@endpush