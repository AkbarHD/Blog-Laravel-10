<!doctype html>
<html lang="en">

{{-- penejelasan : kita authenticasi menggunakan laravel ui, udh akan mendpatkan folderr Auth di dlm controller
    dan menadpatkan folder auth di dlm views, dn mndpatkan folder layouts di dlm view/back layouts app.blade.php.
    dan otomatis dia menggunakan Model User yg sdh dibuatkan laravel, migrationnya juga
    --}}

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- utk keamanan serngan ss -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="AkbarHD">
    {{-- jadi halaman ini tdk akan tampil ketika ada user yang mencari --}}
    <meta name="robots" content="noindex, nofollow">
    <meta name="generator" content="Hugo 0.104.2">
    <title>@yield('title')</title>

    {{-- boostrap icon cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    {{-- link css custom --}}
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">

    {{-- panggil css dinammis perhalaman --}}
    @stack('css')

    {{-- link cdn css bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="{{ asset('back/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
            <small> welcome {{ auth()->User()->name }}</small>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search"> --}}
        {{-- <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div> --}}
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- panggil sidebar menu --}}
            @include('back.layout.sidebar')

            {{-- panggil section content --}}
            @yield('content')


            {{-- footer --}}
        </div>
    </div>

    {{-- cdn js bootsrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- cdn feather js  --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    {{-- cdn chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ asset('back/js/dashboard.js') }}"></script>

    {{-- js datables --}}
    @stack('js')
</body>

</html>
