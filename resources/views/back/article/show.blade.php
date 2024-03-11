@extends('back.layout.template')

{{-- title --}}
@section('title', 'Show Articles - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Show Articles</h1>
            <!-- percobaan smain dgn ArticleController -->
            <a href="{{ url('article/' . $article->id . '/edit') }}" class="btn btn-primary">Coba</a>
        </div>
        <table class="table table-striped table-bordered">
            <tr>
                <th width="250px">Title</th>
                <td>: {{ $article->title }}</td>
            </tr>

            <tr>
                <th>Category</th>
                <td>: {{ $article->Category->name }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{!! $article->desc !!}</td>
            </tr>

            <tr>
                <th>Image</th>
                <td>
                    {{-- kita perlu menulisan di terminal "php artisan storage:link" agr gambarnya ke load dan di pindahkan ke public aslinya  --}}
                    <a href="{{ asset('storage/backk/' . $article->img) }}" target="_blank">
                        <!-- kalo asset itu brati ngmbilnya ke public dan public tdk perlu di ketik lansung isi folder stelah public-->
                        <img src="{{ asset('storage/backk/' . $article->img) }}" alt="" width="10%">
                    </a>
                </td>
            </tr>

            <tr>
                <th>Views</th>
                <td>: {{ $article->view }}x</td>
            </tr>

            <tr>
                <th>Status</th>
                @if ($article->status == 0)
                    <td><span class="badge bg-danger">Private</span></td>
                @else
                    <td><span class="badge bg-success">Published</span></td>
                @endif
            </tr>

            <tr>
                <th>Publish Date</th>
                <td>: {{ $article->publish_date }}</td>
            </tr>

            <tr>
                <th>Writer</th>
                <td>: {{ $article->User->name }}</td>
            </tr>
        </table>

        <div class="float-end">
            <a href="{{ url('article') }}" class="btn btn-warning"> <i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </div>

    </main>

@endsection
