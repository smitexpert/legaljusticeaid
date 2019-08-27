@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Court List</h4>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courtList as $court)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $court->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('/admin/courts/edit') }}/{{ $court->id }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('/admin/courts/delete') }}/{{ $court->id }}" class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Add New Court name</h4>
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ url("/admin/courts") }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('courts') has-danger @enderror">
                                <label for="">Court Name</label>
                                <input name="courts" type="text" class="form-control">
                                @error('courts')
                                <label class="error mt-2 text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Deleted Court</h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deletedList as $deleted)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $deleted->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('/admin/courts/restore') }}/{{ $deleted->id }}" class="btn btn-sm btn-primary">Resoter</a>
                                                <a href="{{ url('/admin/courts/remove') }}/{{ $deleted->id }}" class="btn btn-sm btn-danger">Remove</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
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