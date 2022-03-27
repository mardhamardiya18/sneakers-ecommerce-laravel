@extends('layouts.app', ['title' => 'Login - Sneakersaja.com'])

@section('content')
    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row row-auth align-items-center">
                    <div class="col-lg-6 text-center">
                        <img src="images/login.png" class="w-50 mb-4 mb-lg-0" alt="" />
                    </div>
                    <div class="col-lg-5">
                        <h2 class="mb-5">Belanja kebutuhan utama, menjadi lebih mudah</h2>
                        <form action="{{ route('login') }}" class="mt-3" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus id="" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label class="mt-3">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" required autocomplete="password"
                                    autofocus id="" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="btn btn-danger btn-block mt-5">
                                    Login
                                </button>
                                <a href="{{ route('register') }}" class="btn btn-signup btn-block mt-3">
                                    Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
