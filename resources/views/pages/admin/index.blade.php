@extends('layouts.admin')

@section('title')
    Admin Dashboard - Home
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>

            <div class="dashboard-content mt-4 mt-ld-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-md-3 mb-2 pl-3">
                            <div class="card-body">
                                <h5 class="card-dashboard-title">Customer</h5>
                                <h2 class="card-dashboard-subtitle">{{ $customer }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-2 mb-md-0 pl-3">
                            <div class="card-body">
                                <h5 class="card-dashboard-title">Revenue</h5>
                                <h2 class="card-dashboard-subtitle">${{ $revenue }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-2 pl-3">
                            <div class="card-body">
                                <h5 class="card-dashboard-title">Transaction</h5>
                                <h2 class="card-dashboard-subtitle">{{ $transaction }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
