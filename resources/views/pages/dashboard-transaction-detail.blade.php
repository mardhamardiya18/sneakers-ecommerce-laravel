@extends('layouts.dashboard')

@section('title')
    Dashboard - Transaction Detail
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">No Transaction {{ $transaction->code }}</h2>
                <nav class="nav-bread mt-4 mb-3">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard-transaction') }}" class="text-dark">Transactions</a>
                        </li>
                        <li class="breadcrumb-item active">Transaction Detail</li>
                    </ol>
                </nav>
            </div>

            <div class="dashboard-content mt-4 mt-ld-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body py-5">
                                <div class="row justify-content-md-between justify-content-lg-start">
                                    <div class="col-md-4">
                                        <img src="{{ Storage::url($transaction->product->galleries->first()->photos) }}"
                                            class="img-fluid img-transaction-detail" alt="" />
                                    </div>
                                    <div class="col-md-3 offset-md-1 mt-4 mt-sm-0">
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Customer Name
                                            </p>
                                            <p class="text-detail">{{ $transaction->transaction->user->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Date of Transaction
                                            </p>
                                            <p class="text-detail">
                                                @php
                                                    $date = $transaction->created_at;
                                                    $date_carbon = \Carbon\Carbon::parse($date)->isoFormat('dddd, D MMM Y | H:m');
                                                @endphp
                                                {{ $date_carbon }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Total Amount
                                            </p>
                                            <p class="text-detail">@currency($transaction->transaction->total_price)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Product Name
                                            </p>
                                            <p class="text-detail">
                                                {{ $transaction->product->name }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Payment Status
                                            </p>
                                            <p class="text-detail text-danger">
                                                {{ $transaction->transaction->transaction_status }}</p>
                                        </div>
                                        <div class="form-group">
                                            <p class="label-detail text-muted m-0">
                                                Mobile Phone
                                            </p>
                                            <p class="text-detail">{{ $transaction->transaction->user->phone_number }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col">
                                        <h4>Shipping Information</h4>
                                    </div>
                                </div>

                                <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Address I
                                                </p>
                                                <p class="text-detail">
                                                    {{ $transaction->transaction->user->address_one }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Province
                                                </p>
                                                <p class="text-detail">
                                                    {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Postal Code
                                                </p>
                                                <p class="text-detail">{{ $transaction->transaction->user->zip_code }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Shipping Status
                                                </p>
                                                <select name="shipping_status" class="form-control mt-2" id="">
                                                    <option value="{{ $transaction->id }}" selected>
                                                        (Default){{ $transaction->shipping_status }}</option>
                                                    <option value="UNPAID">Unpaid</option>
                                                    <option value="PENDING">Pending</option>
                                                    <option value="SHIPPING">Shipping</option>
                                                    <option value="SUCCESS">Success</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 offset-md-1">
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Address II
                                                </p>
                                                <p class="text-detail">
                                                    {{ $transaction->transaction->user->address_two }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">City</p>
                                                <p class="text-detail">
                                                    {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">Country</p>
                                                <p class="text-detail">{{ $transaction->transaction->user->country }}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <p class="label-detail text-muted m-0">
                                                    Input Resi
                                                </p>
                                                <input type="text" name="resi" class="form-control mt-2" />
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success px-5 mt-4">Update Resi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
