@extends('backend.layouts.app')
@section('content')
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
                                            <td>@if ($rating->status == 0)
                                                Pending
                                            @else
                                                Active
                                            @endif</td>
                                            <td>
                                                    <div class="btn-group">
                                                            <a href="{{ url('admin/ratings/delete') }}/{{ $rating->id }}" class="btn btn-sm btn-danger">Delete</a>
                                                            <a href="{{ url('admin/ratings/view') }}/{{ $rating->id }}" class="btn btn-sm btn-primary" >View</a>
                                                            @if ($rating->status == 0)
                                                                <a href="{{ url('admin/ratings/approve') }}/{{ $rating->id }}" class="btn btn-sm btn-success">Approve</a>
                                                            @else
                                                                <a href="{{ url('admin/ratings/disapprove') }}/{{ $rating->id }}" class="btn btn-sm btn-warning">Disapprove</a>
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
            $('.table').DataTable({
                "order": [[ 0, "desc" ]],

            });
        });
        
    </script>
@endpush