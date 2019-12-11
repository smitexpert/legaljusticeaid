@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/services/new') }}">
        <i class="mdi mdi-plus"></i> Add New Service
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/services/trash') }}">
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
                    <h4>Service List</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Posted By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->user->name }}</td>
                                            <td>{{ $service->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ url('/') }}/admin/services/{{ $service->id }}" onsubmit="return confirm('Are You Sure?')" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                                    </form>
                                                    <a href="{{ url('/') }}/admin/services/{{ $service->id }}/edit" class="btn btn-sm btn-info"><span class="fa fa-gear"></span></a>
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