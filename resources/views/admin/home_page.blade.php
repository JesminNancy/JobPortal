@extends('admin.layout.master')
@section('heading','Home Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Search
                                    </a>
                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Category
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                        <!-- Search Section Start -->
                                        <form action="{{ route('admin_home_page_update') }}" method="post">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="heading" value="{{ $home_page->heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">text</label>
                                                    <textarea name="text" id="" cols="30" rows="10" class="form-control h_100">{{ $home_page->text }}</textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="form-label">Job Title *</label>
                                                        <input type="text" class="form-control" name="job_title" value="{{ $home_page->job_title }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="form-label">Job Location *</label>
                                                        <input type="text" class="form-control" name="job_location" value="{{ $home_page->job_location }}">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="form-label">Job Category *</label>
                                                        <input type="text" class="form-control" name="job_category" value="{{ $home_page->job_category }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="form-label">Search *</label>
                                                        <input type="text" class="form-control" name="search" value="{{ $home_page->search }}">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Existing Background</label>
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$home_page->backgroud) }}" alt="" class="profile-photo w_400">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Background</label>
                                                    <input type="file" class="form-control mt_10" name="backgroud" value="{{ $home_page->backgroud }}" >
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search Section End -->
                                    </div>

                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <!-- Category Section Start -->

                                        <!-- Category Section End -->
                                    </div>
                                </div>
                            </div>
                        </div>






                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
