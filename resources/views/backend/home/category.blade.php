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
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="hidden" name="table_one" value="table_one">
                                    <label for="">Category One</label>
                                    
                                    <select class="form-control selectpicker" data-live-search="true" name="cat_one" id="cat_one" required>
                                        <option value="">SELECT</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(App\HomeCategory::where('table_name', 'table_one')->where('category_id', $category->id)->count() > 0) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="hidden" name="table_two" value="table_two">
                                    <label for="">Category Two</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="cat_two" id="cat_two" required>
                                        <option value="">SELECT</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(App\HomeCategory::where('table_name', 'table_two')->where('category_id', $category->id)->count() > 0) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-md btn-success">SAVE</button>
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