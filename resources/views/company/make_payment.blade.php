@extends('front.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Payment</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('company_dashboard') }}">Dashboard</a>
                        </li>
                        <li class="list-group-item active">
                            <a href="{{ route('company_make_payment') }}">Make Payment</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company-orders.html">Orders</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company-job-add.html"
                                >Create Job</a
                            >
                        </li>
                        <li class="list-group-item">
                            <a href="company-jobs.html">All Jobs</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company-photos.html">Photos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company-videos.html">Videos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company-applications.html"
                                >Candidate Applications</a
                            >
                        </li>
                        <li class="list-group-item">
                            <a href="company-edit-profile.html"
                                >Edit Profile</a
                            >
                        </li>
                        <li class="list-group-item">
                            <a href="login.html">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <h4>Current Plan</h4>
                <div class="row box-items mb-4">
                    <div class="col-md-4">
                        <div class="box1">
                            @if ($current_plan == null)
                            <span class="text-danger">
                                No Plan Available
                            </span>
                            @else

                            <h4>${{ $current_plan->rPackage->package_price}}</h4>
                            <p>{{ $current_plan->rPackage->package_name }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <h4>Choose Plan and Make Payment</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <form action="{{ route('company_paypal') }}" method="post">
                            @csrf
                        <tr>
                            <td>
                                <select name="package_id" class="form-control select2">
                                @foreach ($packages as $item)
                                <option value="{{ $item->id }}">{{ $item->package_name }}$ {{ $item->package_price }}</option>
                                @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="" class="btn btn-primary">Pay with PayPal</>
                            </td>
                        </tr>
                        </form>
                        <form action="{{ route('company_stripe') }}" method="post">
                            @csrf
                        <tr>
                            <td><select name="package_id" class="form-control select2">
                                @foreach ($packages as $item)
                                <option value="{{ $item->id }}">{{ $item->package_name }}$ {{ $item->package_price }}</option>
                                @endforeach
                                </select></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Pay with Stripe</>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
