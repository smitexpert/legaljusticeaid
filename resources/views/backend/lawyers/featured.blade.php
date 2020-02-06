@extends('backend.layouts.app')
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
                                    @foreach ($lawyers as $data)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->experience }} Yrs</td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($data->verified == 1)
                                                    <a href="{{ url('/admin/lawyers/featured') }}/{{ $data->id }}/remove" class="btn btn-sm btn-danger">Remove From Featured</a>
                                                @else
                                                    <a href="{{ url('/admin/lawyers/featured') }}/{{ $data->id }}/add" class="btn btn-sm btn-info">Add To Featured</a>
                                                @endif
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