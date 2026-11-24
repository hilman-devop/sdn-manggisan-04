<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
       
            <span class="fw-bold" style="font-size:1.3rem; color:#1a237e;">Sekolah Dasar</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown {{ request()->routeIs('school.profile') || request()->routeIs('vision') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profilDropdown">
                        <a class="dropdown-item" href="{{ route('school.profile') }}">Sejarah & Profil</a>
                        <a class="dropdown-item" href="{{ route('vision') }}">Visi & Misi</a>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('gallery') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="nav-item {{ request()->routeIs('announcements') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('announcements') }}">Pengumuman</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav> 