@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="description" value="Blog AkbarHD, blog seputar Pemrograman dan Teknologi terkini">
    <meta name="keyword" value="akbarhd, akbar hossam, akbar hossam delmiro">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content="Blog - AkbarHD">
    <meta property="og:description"
        value="Blog AkbarHD, blog yang menjelaskan seputar pemrograman dan teknologi terkini yang wajib di pahami sebagai pemula">
    <meta property="og:image" value="{{ asset('front/img/laravel.jpg') }}">
@endpush

{{-- tile --}}
@section('title', 'Blog - AkbarHD')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card shadow-sm mb-4" data-aos="fade-in">
                    <a href="{{ url('p/' . $latest_post->slug) }}"><img class="card-img-top ukuran-img"
                            src="{{ asset('storage/backk/' . $latest_post->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $latest_post->created_at->format('d-m-Y') }} |
                            {{ $latest_post->User->name }} |
                            <a
                                href="{{ url('category/' . $latest_post->Category->slug) }}">{{ $latest_post->Category->name }}</a>
                        </div>

                        <h2 class="card-title">{{ $latest_post->title }}</h2>
                        {{-- membatasi pengambilan kata deskripsi --}}
                        <p class="card-text">{{ Str::limit(strip_tags($latest_post->desc), 200, '...') }}</p>
                        <a class="btn btn-primary" href="{{ url('p/' . $latest_post->slug) }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($article as $item)
                        <div class="col-12 col-lg-6" data-aos="fade-up">
                            <!-- Blog post-->
                            <div class="card shadow-sm mb-4">
                                <a href="{{ url('p/' . $item->slug) }}">
                                    <img class="card-img-top ukuran-post" src="{{ asset('storage/backk/' . $item->img) }}"
                                        alt="..." />
                                </a>
                                <div class="card-body card-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('d-m-Y') }} | {{ $item->User->name }} |
                                        <a
                                            href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}</a>
                                    </div>
                                    <h2 class="card-title h4">{{ $item->title }}</h2>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 190, '...') }}</p>
                                    <a class="btn btn-primary" style="margin-top: -10px"
                                        href="{{ url('p/' . $item->slug) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- ini akan rusak karena styling default dari laravelnya itu tailwind, maka --}}
                    <div class="pagination justify-content-end  my-4"> <!-- Pagination-->
                        {{ $article->links() }}
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>

@endsection
