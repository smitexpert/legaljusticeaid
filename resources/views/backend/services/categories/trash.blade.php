@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/categories/services/') }}">
        <i class="mdi mdi-arrow-left"></i> Back
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
                    <h4>Service Categories Trash List</h4>
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
                                                    <a href="{{ url("/admin/categories/services/trash") }}/{{ $category->id }}/restore" class="btn btn-sm btn-success"><span class="fa fa-reply"></span></a>
                                                    <form action="/admin/categories/services/trash/{{ $category->id }}" method="POST" onsubmit="return confirm('Are You Sure?')">
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