@extends('admin.layout.master')
@section('heading','Edit Job Salary Range')

@section('button')
<div class="ml-auto">
    <a href="{{ route('admin_job_salary_range') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Show All</a>
</div>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_salary_range_update',$single_job_salary_range->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $single_job_salary_range->name }}">
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

