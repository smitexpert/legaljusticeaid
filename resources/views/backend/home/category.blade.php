@extends('backend.layouts.app')
@section('topbutton')
<li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
    <a class="btn btn-sm btn-success" href="{{ url('/admin/blog/slider') }}">
        Back
    </a>
</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Set Category
            </div>
            <div class="card-body">
                <form action="{{ route('admin.home.category') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="option">Select Option</label>
                                        <select name="option" id="option" class="form-control" required>
                                            <option value=""></option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <option value="3">Category 3</option>
                                            <option value="4">Category 4</option>
                                            <option value="5">Category 5</option>
                                            <option value="6">Category 6</option>
                                            <option value="7">Category 7</option>
                                            <option value="8">Category 8</option>
                                            <option value="9">Category 9</option>
                                            <option value="10">Category 10</option>
                                            <option value="11">Category 11</option>
                                            <option value="12">Category 12</option>
                                            <option value="13">Category 13</option>
                                            <option value="14">Category 14</option>
                                            <option value="15">Category 15</option>
                                            <option value="16">Category 16</option>
                                            <option value="17">Category 17</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <select name="category" id="category" class="form-control selectpicker" data-live-search="true" required>
                                            <option value=""></option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-success">SUBMIT</button>
                                </div>
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

</script>
@endpush