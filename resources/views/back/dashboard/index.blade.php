@extends('back.layout.template')

{{-- title --}}
@section('title', 'Dashboard - Admin')
<style>
    a {
        text-decoration: none !important;
    }
</style>
@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar" class="align-text-bottom"></span>
                    This week
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-bg-danger mb-3">
                    <div class="card-header">Total Articles</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_articles }} Articles</h5>
                        <p class="card-text">
                            <a href="{{ url('article') }}" class="text-white">View</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-bg-warning mb-3">
                    <div class="card-header text-white">Total Categories</div>
                    <div class="card-body text-white">
                        <h5 class="card-title">{{ $total_categories }} Categories</h5>
                        <p class="card-text">
                            <a href="{{ url('categories') }}" class="text-white">View</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <h5>Latest Article</h5>
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Article</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Category->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="col-md-6">
                <h5>Popular Articles</h5>
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Article</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Category->name }}</td>
                                <td>{{ $item->view }}</td>
                                <td>
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}} <!-- grafik -->


    </main>
@endsection
