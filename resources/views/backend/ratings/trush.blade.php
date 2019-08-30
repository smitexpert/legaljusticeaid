@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/ratings') }}">
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
                    <h4>Ratings List</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width: 10px; text-align: center;">#</td>
                                        <td style="width: 30px;">Ratings</td>
                                        <td>Feedback</td>
                                        <td>Lawyer</td>
                                        <td>User</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ratings as $rating)
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td class="text-center">{{ $rating->ratings }}</td>
                                            <td>{{ str_limit($rating->feedback, $limit = 30, $end = '...') }}</td>
                                            <td><a href="{{ url('lawyers') }}/{{ $rating->lawyer->slug }}" target="_blank">{{ $rating->lawyer->name }}</a></td>
                                            <td><a href="{{ url('admin/user') }}">{{ $rating->user->name }}</a></td>
                                            <td>@if ($rating->status == 0)
                                                Pending
                                            @else
                                                Active
                                            @endif</td>
                                            <td>
                                                    <div class="btn-group">
                                                        <a href="{{ url('admin/ratings/restore') }}/{{ $rating->id }}" class="btn btn-sm btn-primary">Resoter</a>
                                                        <a href="{{ url('admin/ratings/delete') }}/{{ $rating->id }}" class="btn btn-sm btn-danger" >Delete</a>
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
            $('.table').DataTable({
                "order": [[ 0, "desc" ]],

            });
        });
        
    </script>
@endpush