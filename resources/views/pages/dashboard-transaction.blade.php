@extends('layouts.dashboard')

@section('title')
    Dashboard - Transaction
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">
                    Big result start from the small one
                </p>
            </div>

            <div class="dashboard-content mt-4 mt-ld-5">
                <div class="row mt-4 recent-transaction">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Sell Product</a>
                            </li>
                            <li class="nav-item ml-5" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Buy Product</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                @foreach ($sellTransactions as $transaction)
                                    <a href="{{ route('dashboard-transaction-detail', $transaction->id) }}"
                                        class="card card-list mt-3">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-1 mb-3">
                                                    <div class="img-box">
                                                        <img src="{{ Storage::url($transaction->product->galleries->first()->photos) }}"
                                                            class="img-fluid" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 detail">
                                                    {{ $transaction->product->name }}
                                                </div>
                                                <div class="col-lg-4 text-lg-center detail">
                                                    {{ $transaction->transaction->user->name }}
                                                </div>
                                                <div class="col-lg-4 text-lg-center detail">
                                                    @php
                                                        $date = $transaction->created_at;
                                                        $date_carbon = \Carbon\Carbon::parse($date)->isoFormat('dddd, D MMM Y | H:m');
                                                    @endphp
                                                    {{ $date_carbon }}
                                                </div>
                                                <div class="col-lg-1">
                                                    <i class="bx bx-chevron-right bx-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                @foreach ($buyTransactions as $transaction)
                                    <a href="{{ route('dashboard-transaction-detail', $transaction->id) }}"
                                        class="card card-list mt-3">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-1 mb-3">
                                                    <div class="img-box">
                                                        <img src="{{ Storage::url($transaction->product->galleries->first()->photos) }}"
                                                            class="img-fluid" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 detail">
                                                    {{ $transaction->product->name }}
                                                </div>
                                                <div class="col-lg-4 text-lg-center detail">
                                                    {{ $transaction->product->user->store_name }}
                                                </div>
                                                <div class="col-lg-4 text-lg-center detail">
                                                    @php
                                                        $date = $transaction->created_at;
                                                        $date_carbon = \Carbon\Carbon::parse($date)->isoFormat('dddd, D MMM Y | H:m');
                                                    @endphp
                                                    {{ $date_carbon }}
                                                </div>
                                                <div class="col-lg-1">
                                                    <i class="bx bx-chevron-right bx-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
