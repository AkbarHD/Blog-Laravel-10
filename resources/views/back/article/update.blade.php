@extends('back.layout.template')


{{-- title --}}
@section('title', 'Update Articles - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Articles</h1>
            <a class="btn btn-primary " href="{{ url('article') }}"> <i class="bi bi-arrow-left-circle"></i> Kembali</a>
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

            <form action="{{ url('article/' . $article->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- input type hidden brfngsi utk : user ini update dgb foto baru atau ingin pake foto lama --}}
                <input type="hidden" name="oldImg" value="{{ $article->img }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $article->title) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $item)
                                    {{-- jika category id == artikel category_id maka selected --}}
                                    @if ($item->id == $article->category_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="editor">{{ old('desc', $article->desc) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            {{-- karena update upload img itu ga wajib maka kita bikin 2 validasi lg yg bernama UpdateArticleRequest  --}}
                            <label for="img">Image max(2 mb)</label>
                            <input type="file" name="img" id="img" class="form-control">
                            <div class="mt-1">
                                <small>Gambar Lama</small> <br>
                                <img src="{{ url('storage/backk/' . $article->img) }}" width="80px" alt="Foto Article">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $article->status == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $article->status == 0 ? 'selected' : '' }}>Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control"
                            value="{{ old('publish_date', $article->publish_date) }}">
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
@endpush
