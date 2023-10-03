@extends('admin.layout.master')
@section('heading','Home Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_page_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row custom-tab">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">

                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Search</button>

                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Job Category</button>

                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Why Choose Us</button>

                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Featured Jobs</button>

                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Testimonial</button>

                                    <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">Blog</button>

                                    <button class="nav-link" id="v-pills-7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-7" type="button" role="tab" aria-controls="v-pills-7" aria-selected="false">SEO Section</button>

                                </div>

                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                        <!-- Search Section Start -->
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

                                            </div>
                                        </div>
                                        <!-- Search Section End -->
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">
                                        <!-- Category Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="job_category_heading" value="{{ $home_page->job_category_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Subheading </label>
                                                    <input type="text" class="form-control" name="job_category_subheading" value="{{ $home_page->job_category_subheading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="job_category_status" class="form-control">
                                                        <option value="Show" @if($home_page->job_category_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_page->job_category_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Category Section End -->
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="0">
                                        <!-- Why Choose Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="why_choose_heading" value="{{ $home_page->why_choose_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Subheading </label>
                                                    <input type="text" class="form-control" name="why_choose_subheading" value="{{ $home_page->why_choose_subheading }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Existing Background</label>
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$home_page->why_choose_background) }}" alt="" class="profile-photo w_400">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Background</label>
                                                    <input type="file" class="form-control mt_10" name="why_choose_background" value="{{ $home_page->why_choose_background }}" >
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="why_choose_status" class="form-control">
                                                        <option value="Show" @if($home_page->why_choose_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_page->why_choose_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Why Choose Section End -->
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab" tabindex="0">
                                        <!-- Featured Jobs Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="featured_jobs_heading" value="{{ $home_page->featured_jobs_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">text </label>
                                                    <input type="text" class="form-control" name="featured_jobs_text" value="{{ $home_page->featured_jobs_text }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="featured_jobs_status" class="form-control">
                                                        <option value="Show" @if($home_page->featured_jobs_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_page->featured_jobs_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Featured Jobs Section End -->
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab" tabindex="0">
                                        <!-- Blog Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="blog_heading" value="{{ $home_page->blog_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Subheading</label>
                                                    <input type="text" class="form-control" name="blog_subheading" value="{{ $home_page->blog_subheading }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="blog_status" class="form-control">
                                                        <option value="Show" @if($home_page->blog_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_page->blog_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Featured Jobs Section End -->
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab" tabindex="0">
                                        <!-- SEO Section Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" value="{{ $home_page->title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea name="meta_description" id="" cols="30" rows="10" class="form-control h_100">{{ $home_page->meta_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SEO Section End -->
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
