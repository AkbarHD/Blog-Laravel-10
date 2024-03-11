@extends('front.layout.template')

{{-- meta seo --}}
@push('meta-seo')
    <meta name="description" value="all category Blog AkbarHD, blog seputar Pemrograman dan Teknologi terkini">
    <meta name="keyword" value="list category akbarhd, semua kategori akbar hossam, list category akbar hossam delmiro">
    <meta property="og:url" value="{{ url()->current() }}">
    <meta property="og:site_name" content="Blog AkbarHD">
    <meta property="og:title" content="All Category - AkbarHD">
    <meta property="og:description"
        value="Blog AkbarHD, blog yang menjelaskan tentang seputar pemrograman dan teknologi terkini yang wajib di pahami sebagai pemula">
    <meta property="og:image" value="{{ asset('front/img/laravel.jpg') }}">
@endpush

@section('title', 'All Category - AkbarHD')

@section('content')
    <!-- Page content-->
    <div class="container">

        <p>Showing All Articles with Category</p>
        <div class="row">
            @foreach ($category as $item)
                <div class="col-lg-3">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="text-center">
                                <span>
                                    <a href="{{ 'category/' . $item->slug }}" class="text-decoration-none text-dark">
                                        <i class="fa-solid fa-folder fa-4x"></i>
                                    </a>
                                </span>
                                <p class="card-title mt-2">
                                    <a href="{{ url('category/' . $item->slug) }}" class="text-decoration-none text-dark">
                                        {{ $item->name }}
                                        ({{ $item->articles_count }})
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- {{ $articles->links() }} --}}

@endsection
