<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="/images/logo.svg" class="logo" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}"
                    href="{{ route('homepage') }}">Beranda</a>
                <a class="nav-item nav-link {{ request()->is('category') ? 'active' : '' }}"
                    href="{{ route('category') }}">Produk Kami</a>
                <a class="nav-item nav-link" href="#">Rewards</a>

                @guest
                    <a class="nav-item nav-link " href="{{ route('register') }}">Daftar</a>
                    <a href="{{ route('login') }}" class="btn btn-danger">Masuk</a>
                @endguest
            </div>
            @auth
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="/images/user.png" class="rounded-circle profile-picture mr-2" alt="" />
                            @php
                                $getName = Auth::user()->name;
                                $name = preg_split('/[\s,]+/', $getName);
                                $getFirstName = $name[0];
                            @endphp
                            Hi, {{ $getFirstName }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('dashboard-home') }}" class="dropdown-item">Dashboard</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        @php
                            $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2" id="navbarDropdown"
                            role="button" data-target="dropdown">

                            @if ($carts > 0)
                                <img src="/images/cart-fill.svg" class="rounded-circle profile-picture" alt="" />
                                <div class="card-badge">{{ $carts }}</div>
                            @else
                                <img src="/images/cart-empty.svg" class="rounded-circle profile-picture" alt="" />
                                <div class="card-badge">{{ $carts }}</div>
                            @endif

                        </a>
                    </li>
                </ul>
                <div class="navbar-nav d-block d-lg-none">

                    <a href="#" class="nav-item nav-link text-white">Hi, {{ $getFirstName }}</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dropdown-item">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
