@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/services/new') }}">
        <i class="mdi mdi-plus"></i> Add New Service
    </a>
</li>
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-warning" href="{{ url('/admin/moderations/answers/trash') }}">
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
                                        <th>Posted By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($answers as $answer)
                                        <tr>
                                            <td>{{ strip_tags($answer->answer) }}</td>
                                            <td>{{ $answer->question->title }}</td>
                                            <td>{{ $answer->user->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.answer.remove', ['id' => $answer->id]) }}" class="btn btn-danger btn-sm">Remove</a>
                                                    <a target="_blank" href="{{ route('advice.single', ['slug' => $answer->question->id]) }}#advice_answer_{{ $answer->id }}" class="btn btn-info btn-sm"><span class="fa fa-search"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach --}}
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