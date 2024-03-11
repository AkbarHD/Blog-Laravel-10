@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="author" content="{{ $article->User->name }}">
    <meta name="description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
    <meta name="keyword" value="Article {{ $article->title . ' AkbarHD' }}, ">
    <meta property="og:type" content="article">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content=" Article {{ $article->title . ' AkbarHD' }}">
    <meta property="og:description" value="{{ Str::limit(strip_tags($article->desc), 150, '...') }}">
    <meta property="og:image" value="{{ asset('storage/backk/' . $article->img) }}">
@endpush

@section('title', $article->title . 'AkbarHD')

@section('content')

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="card mb-4">
                    <a href="{{ url('p/' . $article->slug) }}">
                        <img class="card-img-top ukuran-img" src="{{ asset('storage/backk/' . $article->img) }}"
                            alt="{{ $article->title }}" />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="ml-3">{{ $article->created_at->format('d-m-Y') }} | </span>

                            <span class="ml-3">
                                {{ $article->User->name }} |
                                <a
                                    href="{{ url('category/' . $article->Category->slug) }}">{{ $article->category->name }}</a>
                            </span>
                            <span class="ml-3"> <i class="bi bi-eye"></i> {{ $article->view }}</span>
                        </div>
                        <h1 class="card-title py-2">{{ $article->title }}</h1>
                        {{-- membatasi pengambilan kata deskripsi --}}
                        <p class="card-text img-small">{!! $article->desc !!}</p>

                        <div class="mt-5">
                            <p style="font-size: 20px"><b>Share this</b></p>
                            <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-primary"
                                target="_blank"> <i class="fa-brands fa-facebook"></i> Facebook</a>
                            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-success"
                                target="_blank"> <i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                        </div>
                    </div>
                </div>
                {{-- karna disini mnggunakan categories otomatis kita jg harus menambahkan models categories di articleController front --}}
                <!-- Side widgets-->
            </div>
            @include('front.layout.side-widget')
        </div>
    </div>

@endsection
