@extends('back.layout.template')

@push('css')
    {{-- datatables kalo bootstrap cssnya udh dari bawaan --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush

{{-- title --}}
@section('title', 'List Articles - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Articles</h1>

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
            {{--     arahkan ke Controller article/create  --}}
            <a href="{{ url('article/create') }}" class="btn btn-success mb-2">Create Articles</a>
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

            {{-- success alert --}}
            <div class="swal" data-swal="{{ session('success') }}"></div>

            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Publish Date</th>
                        <th>Function</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- karna pake server side maka yg client side kita hapus --}}

                </tbody>
            </table>
        </div>

    </main>

@endsection

{{-- datatables js --}}
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- sweet alert2 gihub --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- alert success --}}
    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'Success',
                'text': swal,
                'icon': 'success',
                // ini utk menonaktifkan butto oke, jd dia nnti dk perlu pencet oke 
                'showConfirmButton': false,
                'timer': 2000,
            })
        }

        // delete article
        function deleteArticle(e) {
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Delete Article',
                text: 'Are You Sure?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3805d6',
                confirmButtonText: 'Delete!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/article/' + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                window.location.href = '/article';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                        }
                    });
                }
            })
        }
    </script>

    {{-- DataTables --}}
    <script>
        //yg tadinya clientside kita rubah menjadi server side
        // new DataTable('#dataTable');
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}', // jd tdk perlu bikin method table, kita memakai current artinya(url sekarang)
                columns: [

                    {
                        data: 'DT_RowIndex', // data itu isinya harus sama dengan field yang ada di database
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title', // data itu isinya harus sama dengan field yang ada di database
                        name: 'title'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'view',
                        name: 'view'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        });
    </script>
@endpush
