<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('home') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    dashboard/home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('article') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Articles
                </a>
            </li>

            @if (auth()->user()->role == 1)
                <!-- jika yg masuk rolenya sm dgn 1 maka tampilkan menu categories -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories') }}">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Categories
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('config') }}">
                    <span data-feather="list" class="align-text-bottom"></span>
                    Config
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('users') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                {{-- dpt  dari views layouts app.blade.php --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Logout
                </a>
            </li>

        </ul>
    </div>
</nav>
