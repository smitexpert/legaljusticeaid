@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/moderations/questions') }}">
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
                                                    <a href="{{ url('/admin/moderations/questions/restore') }}/{{ $question->id }}" class="btn btn-success btn-sm">Restore</a>
                                                    <a href="{{ url('/admin/moderations/questions/delete') }}/{{ $question->id }}" class="btn btn-danger btn-sm">Delete</a>
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