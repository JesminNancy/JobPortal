@extends('admin.layout.master')

@section('heading', 'FAQ Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_page_update') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $page_faq_data->heading }}">
                        </div>

                        <h4 class="seo_section">SEO Section</h4>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $page_faq_data->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_faq_data->meta_description }}</textarea>
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
