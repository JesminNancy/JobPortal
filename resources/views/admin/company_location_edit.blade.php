@extends('admin.layout.master')
@section('heading','Edit Company Location')

@section('button')
<div class="ml-auto">
    <a href="{{ route('admin_company_location') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Show All</a>
</div>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_company_location_update',$single_company_location->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $single_company_location->name }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
