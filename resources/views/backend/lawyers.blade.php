@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/lawyers/add') }}">
        <i class="mdi mdi-plus"></i> Add New Lawyer
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/lawyers/trush') }}">
        <i class="mdi mdi-magnify"></i> View Trushed Lawyers
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session("message"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Lawyer List</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Experience</th>
                                        <th>Court</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->experience }} Yrs</td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/admin/lawyers/edit') }}/{{ $data->id }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ url('/admin/lawyers/property') }}/{{ $data->id }}" class="btn btn-sm btn-primary">Property</a>
                                                <a href="{{ url('/admin/lawyers/delete') }}/{{ $data->id }}" class="btn btn-sm btn-warning">Delete</a>
                                                <a href="{{ url('/admin/lawyers/view') }}/{{ $data->id }}" class="btn btn-sm btn-success">View</a>
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