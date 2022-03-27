<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="img/svg" href="/images/logo-icon.svg" />

    <title>@yield('title')</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    @stack('prepend-style')
    <link href="/style/main.css" rel="stylesheet" />
    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper">
            <!-- sidebar -->
            <div class="border-right sidebar-wrapper" deta-aos="fade-right">
                <div class="sidebar-heading text-center">
                    <img src="/images/logo.svg" class="img-fluid" alt="" />
                </div>

                <div class="list-group list-group-flush mt-3">
                    <a href="{{ route('admin-dashboard') }}"
                        class="list-group-item {{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('product.index') }}"
                        class="list-group-item {{ request()->is('admin/product') ? 'active' : '' }}">Kelola Produk</a>
                    <a href="{{ route('product-galleries.index') }}"
                        class="list-group-item {{ request()->is('admin/product-galleries*') ? 'active' : '' }}">Kelola
                        Gallery</a>
                    <a href="{{ route('category.index') }}"
                        class="list-group-item {{ request()->is('admin/category*') ? 'active' : '' }}">Kelola
                        Kategori</a>
                    <a href="#" class="list-group-item">Kelola Transaksi</a>
                    <a href="{{ route('user.index') }}"
                        class="list-group-item {{ request()->is('admin/user*') ? 'active' : '' }}">Kelola Pengguna</a>
                    <a href="{{ route('banner-homepage.index') }}"
                        class="list-group-item {{ request()->is('admin/banner-homepage*') ? 'active' : '' }}">Kelola
                        Banner</a>
                </div>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn bx bx-menu bx-sm d-lg-none" style="color: #fff" id="menu-toggle"></button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bx bx-cart bx-sm py-1" style="color: #fff"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                        data-toggle="dropdown">
                                        <img src="/images/user.png" class="rounded-circle profile-picture mr-2"
                                            alt="" />
                                        Hi, {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('homepage') }}" class="dropdown-item">Go To Shop</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link d-inline-block mt-2" id="navbarDropdown" role="button"
                                        data-target="dropdown">
                                        <img src="/images/cart-fill.svg" class="rounded-circle profile-picture"
                                            alt="" />
                                        <div class="card-badge">3</div>
                                    </a>
                                </li>
                            </ul>
                            <div class="navbar-nav d-block d-lg-none">
                                <a href="#" class="nav-item nav-link text-white">Hi, {{ Auth::user()->name }}</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Section Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        $(".carousel").carousel({
            interval: 3000,
        });

        $("#menu-toggle").click((e) => {
            e.preventDefault;
            $("#wrapper").toggleClass("active-sidebar");
        });
    </script>
    @stack('prepend-script')
    <script src="/script/navbar.js"></script>
    @stack('addon-script')
</body>

</html>
