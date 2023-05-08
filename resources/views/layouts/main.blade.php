<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Beranda') - Pesantren Terpadu Darul Aitam</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset('logo.png') }}" alt="" height="24"
                    class="d-inline-block align-text-top me-2">
                <span>Ponpes Darul Aitami</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->routeIs('beranda')]) aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->routeIs('profil-pondok')]) href="{{ route('profil-pondok') }}">Profil Pondok</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            PSB
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a @class([
                                    'dropdown-item',
                                    'active' => request()->routeIs('pengumuman-pendaftaran'),
                                ]) href="{{ route('pengumuman-pendaftaran') }}">
                                    Pengumuman Penerimaan
                                </a>
                            </li>
                            <li>
                                <a @class([
                                    'dropdown-item',
                                    'active' => request()->routeIs('alur-pendaftaran'),
                                ]) href="{{ route('alur-pendaftaran') }}">
                                    Alur Pendaftaran
                                </a>
                            </li>
                            <li>
                                <a @class([
                                    'dropdown-item',
                                    'active' => request()->routeIs('pendaftaran'),
                                ]) href="{{ route('pendaftaran') }}">Formulir Pendaftaran
                                </a>
                            </li>
                            <li>
                                <a @class([
                                    'dropdown-item',
                                    'active' => request()->routeIs('informasi-biaya'),
                                ]) href="{{ route('informasi-biaya') }}">
                                    Informasi Biaya
                                </a>
                            </li>
                            <li>
                                <a @class([
                                    'dropdown-item',
                                    'active' => request()->routeIs('pengumuman-kelulusan'),
                                ]) href="{{ route('pengumuman-kelulusan') }}">
                                    Pengumuman Kelulusan
                                </a>
                            </li>
                        </ul>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->nama }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                {{-- // only admin and teacher --}}
                                @canany(['guru', 'admin'])
                                    <li>
                                        <a @class(['dropdown-item', 'active' => request()->routeIs('dashboard')]) href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endcanany
                                @can('admin')
                                    <li>
                                        <a @class([
                                            'dropdown-item',
                                            'active' => request()->routeIs('users.index'),
                                        ]) href="{{ route('users.index') }}">User</a>
                                    </li>
                                    <li>
                                        <a @class([
                                            'dropdown-item',
                                            'active' => request()->routeIs('konfigurasi'),
                                        ]) href="{{ route('konfigurasi') }}">Konfigurasi</a>
                                    </li>
                                @endcan
                                {{-- // end admin and teacher --}}
                                <li>
                                    <a @class(['dropdown-item', 'active' => request()->routeIs('profil')]) href="{{ route('profil') }}">Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLogout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div class="container my-3" style="min-height: 800px">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="border-top bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5">
                <div class="col-md-4 mb-3">
                    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                        <img src="{{ asset('logo.png') }}" height="50" alt="">
                    </a>
                    <p>&copy; {{ date('Y') }} Ponpes Darul Aitami</p>
                </div>

                <div class="col-md-4 mb-3">
                    <h5>Social Media</h5>
                    <ul class="list-unstyled d-flex gap-3">
                        <li>
                            <a href="https://twitter.com" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://facebook.com" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="col-md-4 mb-3">
                    <h5>Alamat</h5>
                    <p>
                        Tapaktuan - Medan, KM. 21<br>
                        Kampung Baro, Kec. Pasie Raja,<br>
                        Kab. Aceh Selatan,<br>
                        Provinsi Aceh
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('logout') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLogoutLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda yakin untuk keluar dari aplikasi?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya, keluar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>
