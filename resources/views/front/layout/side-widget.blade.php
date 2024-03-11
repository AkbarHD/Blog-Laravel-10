<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            {{-- dgn menggunakan ini jadi clean urlnya good url --}}
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search..." />
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div>
                @foreach ($categories as $item)
                    <span>
                        <a href="{{ url('category/' . $item->slug) }}"
                            class="bg-primary badge text-white unstyle-categories">{{ $item->name }}
                            {{-- masi bingung knp bisa articles count --}}
                            ({{ $item->articles_count }})
                        </a>
                    </span>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">
            <a href="https://domainesia.com" target="_blank">
                <img src="{{ $config['ads_widget'] }}" alt="ads_widget">
            </a>
        </div>
    </div>

    <!-- Popular Post-->
    <div class="card mb-4">
        <div class="card-header ">Popular Post</div>
        <div class="card-body">
            @foreach ($popular_posts as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/backk/' . $item->img) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="col-md-9 pt-2">
                            <a class="unstyle-categories img-fluid "
                                href="{{ url('p/' . $item->slug) }}">{{ $item->title }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
