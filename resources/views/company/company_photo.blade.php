@extends('front.layout.app')

@section('main_content')

<div
class="page-top"
style="background-image: url('uploads/banner.jpg')"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Photos</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <h4>Add Photo</h4>
            <form action="{{ route('company_photo_submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <input type="file" name="photo" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm"
                            value="Submit"/>
                    </div>
                </div>
            </form>

            <h4 class="mt-4">Existing Photos</h4>
            <div class="photo-all">
                @if($company_photos->count() == 0)
                <div class="row">
                    <div class="col-md-12 text-danger">
                        No Photo is Found
                    </div>
                </div>
                @endif
                <div class="row">
                    @foreach($company_photos as $item)
                    <div class="col-md-6 col-lg-3 mt-1">
                        <div class="item">
                            <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                                <img
                                    src="{{ asset('uploads/'.$item->photo) }}" alt="company_photo" />
                                <div class="icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="bg"></div>
                            </a>
                        </div>
                        <a href="{{ route('company_photo_delete',$item->id) }}" class="btn btn-success mb-1" onClick="return confirm('Are you sure?');">Delete</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
