@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/moderations/questions/approval') }}">
        <i class="mdi mdi-magnify"></i> Approval
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/moderations/questions/trush') }}">
        <i class="mdi mdi-magnify"></i> Trush
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
                    <h4>Question List For Moderation</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>User</th>
                                        <th>Is Answered?</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->user->name }}</td>
                                            <td>{{ $question->is_answerd }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/admin/moderations/questions/remove') }}/{{ $question->id }}" class="btn btn-danger btn-sm">Remove</a>
                                                    <a href="{{ url('/admin/moderations/questions/view') }}/{{ $question->id }}" class="btn btn-primary btn-sm">View</a>
                                                    @if($question->status == true)
                                                        <a href="{{ url('/admin/moderations/questions/disapprove') }}/{{ $question->id }}" class="btn btn-warning btn-sm">Disapprove</a>
                                                    @else
                                                        <a href="{{ url('/admin/moderations/questions/approve') }}/{{ $question->id }}" class="btn btn-success btn-sm">Approve</a>
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