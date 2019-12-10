@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/categories/services/trash') }}">
        <i class="mdi mdi-magnify"></i> Trash
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
                    <h4>Service Categories</h4>
                    <div class="row">
                        <div class="col-md-6">
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
                                                    <a href="{{ url("/admin/categories/services") }}/{{ $category->id }}/edit" class="btn btn-sm btn-info"><span class="fa fa-gear"></span></a>
                                                    <form action="/admin/categories/services/{{ $category->id }}" method="POST" onsubmit="return confirm('Are You Sure?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ url('/admin/categories/services') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                            <label class="error mt-2 text-danger" for="">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">SUBMIT</button>
                                        </div>
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
        $(document).ready(function(){
            $('.table').DataTable();
        });
    </script>
@endpush