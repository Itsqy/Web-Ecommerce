<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('landing.semua') }}">Semua
                            Kategori</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                @foreach ($kategori as $p)
                            <li><a class="dropdown-item"
                                    href="{{ route('landing.kategori', $p->slug) }}">{{ $p->nama_kategori }}</a></li>
                            @endforeach
                    </li>
                </ul>
                </li>
                </ul>
                <form class="d-flex">

                    @guest
                        <a class="nav-link anchor" aria-current="page" href="#"><i class="fas fa-search"></i>Search</a>
                        <button class="btn btn-outline-warning" type="submit"> <a href="{{ route('login') }}">Sign In</a>
                        </button>
                        <button class="btn btn-outline-success ms-2" type="submit"><a
                                href="{{ route('register') }}">Register</a></button>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="nav-link anchor" aria-current="page" href="{{ route('landing.cari') }}"><i
                                    class="fas fa-search"></i>Search</a>

                            <li class="nav-item dropdown ms-3">
                                <a class="nav-link anchor ms-3" aria-current="page"
                                    href="{{ route('landing.keranjang') }}">
                                    @if ($jumlah !== 0)
                                        <span
                                            class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $jumlah }}
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    @endif
                                    <i class="fas fa-shopping-cart"></i> Keranjang
                                </a>
                            </li>

                            <a class="nav-link anchor ms-3" aria-current="page" href="#"><i
                                    class="fas fa-history"></i>History</a>
                            <li class="nav-item dropdown ms-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                    document.getElementById('logout-form').submit();">

                                            {{ 'Logout' }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="{{route('keluar')}}">Keluar</a></li> --}}
                                </ul>
                            </li>
                        </ul>
                        {{-- <ul class="navbar-nav ml-auto"> --}}
                        {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                               My Profile
                               </a>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ ('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
                    @endguest
                    {{-- </ul> --}}
                </form>
            </div>
        </div>
    </nav>
</header>
