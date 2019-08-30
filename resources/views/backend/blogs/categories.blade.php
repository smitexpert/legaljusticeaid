@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Name Here</td>
                                        <td>Active</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Remove</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="category" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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