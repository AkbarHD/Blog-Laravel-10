<!DOCTYPE html>
{{-- lang="en" itu kan defaultnya bing, jd kita hars kasih str_replace app get locale, dia scr ototmatis apapun negaranya yg msk web kita dia otomatis menyesaikan bhsannya --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token pengmanan -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <meta name="description" content="" /> --}}
    <meta name="robots" content="index, follow">
    @stack('meta-seo')
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    {{-- css custom --}}
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    {{-- cdn icon bootsrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- cdn AOS css --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- cdn icon font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('css')
</head>

<body>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        @include('front.layout.navbar')

        <header class="py-5 bg-light border-bottom ">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{ $config['title'] }}</h1>
                    <p class="lead mb-0">{{ $config['caption'] }}</p>
                </div>
            </div>
        </header>

        {{-- adsense header --}}
        <div class="text-center mb-3">
            <a href="https://domainesia.com" target="_blank">
                <img src="{{ $config['ads_header'] }}" alt="adsense_header">
            </a>
        </div>

        @yield('content')

        {{-- adsense header --}}
        <div class="text-center mb-3">
            <a href="https://domainesia.com" target="_blank">
                <img src="{{ $config['ads_footer'] }}" alt="adsense_header" width="40%">
            </a>
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; {{ $config['footer'] }} {{ date('Y') }}</p>
            </div>
        </footer>
    </div>





    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    {{-- CDN AOS js  --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    @stack('js')

</body>

</html>
