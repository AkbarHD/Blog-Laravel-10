@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="description" value="Contact Blog AkbarHD, blog seputar Pemrograman dan Teknologi terkini">
    <meta name="keyword" value=" contact akbarhd, kontak akbar hossam, contact akbar hossam delmiro">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content="Contact Blog - AkbarHD">
    <meta property="og:description"
        value="Blog AkbarHD, blog yang menjelaskan tentang seputar pemrograman dan teknologi terkini yang wajib di pahami sebagai pemula">
    <meta property="og:image" value="{{ asset('front/img/laravel.jpg') }}">
@endpush

{{-- tile --}}
@section('title', 'Contact - AkbarHD')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-in">
                <!-- Featured blog post-->
                <div class="card shadow-sm mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63448.20592706896!2d106.58377860153055!3d-6.3275213773950725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e360eb0b65df%3A0xd5ed106c9053b86d!2sKec.%20Cisauk%2C%20Kabupaten%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1709099241136!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">Contact Laravel Blog</h2>
                        {{-- membatasi pengambilan kata deskripsi --}}
                        <p class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quo sapiente reprehenderit dolor,
                            fuga temporibus dolorum unde culpa suscipit vero officia modi necessitatibus nemo vitae dolores
                            incidunt hic. Eos, fuga
                        </p>
                        </p>

                        <ul>
                            <li>
                                Phone : {{ $config['phone'] }}
                            </li>
                            <li>
                                E-mail : {{ $config['email'] }}
                            </li>
                            <li>
                                <a href="{{ $config['instagram'] }}" target="_blank" class="text-black"
                                    style="text-decoration: none"> <i class="bi bi-instagram"></i> Instagram</a>
                            </li>
                            <li>
                                <a href="{{ $config['youtube'] }}" target="_blank" class="text-black"
                                    style="text-decoration: none"> <i class="bi bi-youtube"></i> Youtube</a>
                            </li>
                            <li>
                                <a href="{{ $config['github'] }}" class="text-black" style="text-decoration: none"> <i
                                        class="bi bi-github"></i> Github</a>
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
