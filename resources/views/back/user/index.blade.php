@extends('back.layout.template')

{{-- title --}}
@section('title', 'List Users - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>

            {{-- tombol di kanan --}}
            {{-- <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar" class="align-text-bottom"></span>
                    This week
                </button>
            </div> --}}
        </div>

        {{-- grafik tidak perlu --}}
        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

        <div class="mt-3">
            @if (auth()->user()->role == 1)
                <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Register</button>
            @endif
            {{-- menampilkna validasi eroor --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- session success --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- session delete --}}
            @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                                    @if (auth()->user()->role == 1)
                                        <!-- utk penulis -->
                                        @if ($item->id != auth()->user()->id)
                                            <!-- utk superadmin -->
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modal create --}}
        @include('back.user.create-modal')

        {{-- modal delete --}}
        @include('back.user.delete-modal')

        {{-- modal update --}}
        @include('back.user.update-modal')
    </main>
@endsection
