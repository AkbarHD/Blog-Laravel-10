@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="description" value="Category Blog AkbarHD, blog seputar Pemrograman dan Teknologi terkini">
    <meta name="keyword" value="category akbarhd, kategori akbar hossam, category akbar hossam delmiro">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content="Category {{ $category . ' - AkbarHD' }}">
    <meta property="og:description"
        value="Blog AkbarHD, blog yang menjelaskan tentang seputar pemrograman dan teknologi terkini yang wajib di pahami sebagai pemula">
    <meta property="og:image" value="{{ asset('front/img/laravel.jpg') }}">
@endpush

@section('title', 'Category ' . $category . ' -AkbarHD')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-3 ">
            {{-- dgn menggunakan ini jadi clean urlnya good url --}}
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search..." />
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <p>Category yang kamu cari : <b>{{ $category }}</b></p>
        <div class="row">
            @forelse ($articles as $item)
                <div class="col-lg-4" data-aos="flip-up">
                    <div class="card shadow-sm mb-4">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top ukuran-post"
                                src="{{ asset('storage/backk/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                {{ $item->created_at->format('d-m-Y') }} | {{ $item->User->name }} |
                                <a href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}</a>
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc), 180, '...') }}</p>
                            <a class="btn btn-primary" style="margin-top: -10px" href="{{ url('p/' . $item->slug) }}">Read
                                more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center" style="margin-bottom: 60px">Yah Category yang kamu cari kosong nih...</h3>
            @endforelse

        </div>
        {{ $articles->links() }}
    </div>

@endsection
