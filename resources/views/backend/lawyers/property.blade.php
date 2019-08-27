@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/lawyers') }}">
        <i class="mdi mdi-arrow-left"></i> Go Back
    </a>
</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Set Lawyer Property</h4>
                    @if (session("status"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <br>
                    <form action="{{ url("/admin/lawyers/property/") }}/{{ $lawyerId }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Select Courts</h5>
                                        <br>
                                        <table class="table" id="court">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courts as $court)
                                                <tr>
                                                    <td style="width: 10px"><input id="court{{$court->id}}" type="checkbox" name="courts[]" value="{{$court->id}}"></td>
                                                    <td><label for="court{{$court->id}}">{{ $court->name }}</label></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Select Specialization</h5>
                                        <br>
                                        <table class="table" id="specialization">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($specializations as $specialization)
                                                <tr>
                                                    <td style="width: 10px"><input id="specialization{{$specialization->id}}" type="checkbox" name="specializations[]" value="{{$specialization->id}}"></td>
                                                    <td><label for="specialization{{$specialization->id}}">{{ $specialization->name }}</label></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Select Practice Area</h5>
                                        <br>
                                        <table class="table" id="practiceArea">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($practiceAreas as $practiceArea)
                                                <tr>
                                                    <td style="width: 10px;"><input id="practiceArea{{$practiceArea->id}}" type="checkbox" name="practiceareas[]" value="{{$practiceArea->id}}"></td>
                                                    <td><label for="practiceArea{{$practiceArea->id}}">{{ $practiceArea->name }}</label></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <button class="btn btn-success">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
         $(document).ready(function() {
            $('#practiceArea').DataTable();
            $('#specialization').DataTable();
            $('#court').DataTable();
        });
    </script>
@endpush