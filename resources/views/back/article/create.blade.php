@extends('back.layout.template')


{{-- title --}}
@section('title', 'Create Articles - Admin')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 450px;
    }
</style>
@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Articles</h1>
        </div>
        <div class="mt-3">
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

            <form action="{{ url('article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                {{-- {{ old('txtgender') == 'L' ? 'selected' : '' }} --}}
                                <option value="" hidden>Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 ">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" class="coba" id="editor">{{ old('desc') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="img">Image max(2 mb)</label>
                            <input type="file" name="img" id="img" value="{{ old('img') }}"
                                class="form-control custom-file-input" onchange="previewImg()">

                            <div class="mt-1">
                                <img src="" class="img-thumbnail img-preview" alt="" width="100px">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                {{-- {{ old('txtgender') == 'L' ? 'selected' : '' }} --}}
                                <option value="" hidden>Status</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date') }}"
                            class="form-control">
                    </div>

                    <div class="text-left mt-3">
                        <button type="submit" class="btn btn-success mx-auto">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </main>

@endsection

{{-- datatables js --}}
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- cdn ck editor versi 4 --}}
    {{-- <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor');
    </script> --}}


    {{-- <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=FIles',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages: false,
        }
    </script> --}}

    {{-- versi 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'),

                {
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                    }
                })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        // muba tekno
        // img preview
        // $('#img').change(function() {
        //     previewImage(this);
        // });

        // function previewImage(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $('.img-preview').attr('src', e.target.result);
        //         }
        //         reader.readAsDataUrl(input.files[0]);
        //     }
        // }

        // sandika
        function previewImg() {

            const sampul = document.querySelector('#img');
            const sampulLabel = document.querySelector('.custom-file-input');
            const imgPreview = document.querySelector('.img-preview');

            //tulisan label
            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endpush
