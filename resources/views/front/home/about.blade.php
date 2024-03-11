@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="description" value="Blog About AkbarHD, blog seputar Pemrograman dan Teknologi terkini">
    <meta name="keyword" value="akbarhd, akbar hossam, akbar hossam delmiro">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content="Blog - AkbarHD">
    <meta property="og:description"
        value="Blog AkbarHD, blog yang menjelaskan tentang seputar pemrograman dan teknologi terkini yang wajib di pahami sebagai pemula">
    <meta property="og:image" value="{{ asset('front/img/laravel.jpg') }}">
@endpush

{{-- tile --}}
@section('title', 'About - AkbarHD')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-out">
                <!-- Featured blog post-->
                <div class="card shadow-sm mb-4">
                    <a href="{{ asset('front/img/laravel.jpg') }}">
                        <img class="card-img-top ukuran-img" src="{{ asset('front/img/laravel.jpg') }}" alt="..." />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">About Laravel Blog</h2>
                        {{-- membatasi pengambilan kata deskripsi --}}
                        <p class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quo sapiente reprehenderit dolor,
                            fuga temporibus dolorum unde culpa suscipit vero officia modi necessitatibus nemo vitae dolores
                            incidunt hic. Eos, fuga
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed ab non, quas aperiam delectus,
                            nemo, cupiditate dicta possimus sequi porro quam? Atque, maiores sit. Accusamus, aliquid.
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad architecto aspernatur dicta enim
                            vero deserunt quisquam fugiat dolores. Necessitatibus provident sunt, obcaecati molestiae iste
                            assumenda sint quae quis nobis atque sequi et officiis minus numquam?
                        </p>
                        </p>

                        <ul>
                            <li>
                                <a href="https://www.instagram.com/envelopeszz354/?hl=en" class="text-black"
                                    style="text-decoration: none"> <i class="bi bi-instagram"></i> Instagram</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/envelopeszz354/?hl=en" class="text-black"
                                    style="text-decoration: none"> <i class="bi bi-youtube"></i> Youtube</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/envelopeszz354/?hl=en" class="text-black"
                                    style="text-decoration: none"> <i class="bi bi-github"></i> Github</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- side widget --}}
            @include('front.layout.side-widget')
        </div>
    </div>

@endsection
