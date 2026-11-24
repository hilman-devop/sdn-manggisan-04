<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1fc8db;
            --primary-dark: #1fa2ff;
            --teal: #23d0a7;
            --sidebar-bg: linear-gradient(135deg, #1fa2ff 0%, #1fc8db 50%, #23d0a7 100%);
            --sidebar-glass: rgba(31, 162, 255, 0.85);
            --sidebar-hover: rgba(255,255,255,0.12);
            --sidebar-active: #fff;
            --sidebar-active-text: #1fa2ff;
            --navbar-bg: rgba(255,255,255,0.95);
            --footer-gradient: linear-gradient(90deg, #1fa2ff 0%, #23d0a7 100%);
        }
        body {
            background: #f4f8fb;
        }
        .sidebar {
            min-height: 100vh;
            background: var(--sidebar-bg);
            color: white;
            box-shadow: 2px 0 16px rgba(31,162,255,0.08);
            backdrop-filter: blur(6px);
            border-right: 1.5px solid rgba(255,255,255,0.12);
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .sidebar .logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2.5px solid #fff;
            box-shadow: 0 2px 8px 0 rgba(31,162,255,0.12);
        }
        .sidebar h4 {
            text-align: center;
            font-weight: 800;
            letter-spacing: 1px;
            color: #fff;
            text-shadow: 0 2px 8px rgba(31,162,255,0.12);
        }
        .sidebar nav a {
            color: #fff;
            text-decoration: none;
            padding: 13px 22px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 4px 10px;
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            font-size: 1.05rem;
            position: relative;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar nav a:last-child {
            border-bottom: none;
        }
        .sidebar nav a i {
            margin-right: 14px;
            font-size: 1.15rem;
            width: 24px;
            text-align: center;
        }
        .sidebar nav a:hover {
            background: var(--sidebar-hover);
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(31,162,255,0.10);
        }
        .sidebar nav a.active, .sidebar nav a[aria-current="page"] {
            background: var(--sidebar-active);
            color: var(--sidebar-active-text);
            font-weight: 700;
            box-shadow: 0 4px 16px 0 rgba(31,162,255,0.10);
        }
        .sidebar nav a.active i, .sidebar nav a[aria-current="page"] i {
            color: var(--sidebar-active-text);
        }
        .content {
            padding: 36px 28px 28px 28px;
            background: #f4f8fb;
            min-height: 100vh;
        }
        .main-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px 0 rgba(31,162,255,0.10);
            padding: 36px 28px;
        }
        .navbar {
            border-radius: 16px;
            box-shadow: 0 2px 12px 0 rgba(31,162,255,0.08);
            padding: 0.5rem 2rem;
            background: var(--navbar-bg) !important;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-dark) !important;
            letter-spacing: 0.5px;
        }
        .navbar-nav .nav-link {
            color: var(--primary-dark) !important;
            font-weight: 600;
            margin-right: 12px;
            border-radius: 8px;
            transition: background 0.18s, color 0.18s;
        }
        .navbar-nav .nav-link:hover {
            color: #fff !important;
            background: var(--primary-dark);
        }
        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2.5px solid var(--primary-dark);
            margin-left: 14px;
            box-shadow: 0 2px 8px 0 rgba(31,162,255,0.10);
        }
        .admin-badge {
            background: linear-gradient(90deg, #1fa2ff 0%, #23d0a7 100%);
            color: #fff;
            border-radius: 14px;
            padding: 3px 14px;
            font-size: 1rem;
            margin-left: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px 0 rgba(31,162,255,0.10);
        }
        .btn-link.nav-link {
            color: #ff4d6d !important;
            font-weight: 600;
            border-radius: 8px;
            transition: background 0.18s, color 0.18s;
        }
        .btn-link.nav-link:hover {
            background: #ff4d6d;
            color: #fff !important;
        }
        .alert {
            border-radius: 10px;
            font-size: 1.05rem;
        }
        footer {
            background: var(--footer-gradient);
            color: #fff;
            border-top: none;
            font-size: 1.05rem;
            margin-top: 0;
            font-weight: 400;
            letter-spacing: 0.5px;
            box-shadow: 0 -2px 12px 0 rgba(31,162,255,0.08);
        }
        footer p {
            margin-bottom: 0;
            font-weight: 300;
            letter-spacing: 0.5px;
        }
        @media (max-width: 991px) {
            .sidebar { min-height: auto; }
            .content { padding: 16px 6px; }
            .main-card { padding: 16px 6px; }
            .navbar { padding: 0.5rem 0.5rem; }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="logo mt-4 mb-2">
                    <img src="https://avatars.githubusercontent.com/u/122313650?v=4?s=400" alt="Admin Logo">
                </div>
                <h4>Admin Panel</h4>
                <nav>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.home.index') }}" class="{{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
                        <i class="fas fa-school"></i> Profil Sekolah
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Galeri
                    </a>
                    <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                        <i class="fas fa-bullhorn"></i> Pengumuman
                    </a>
                    <a href="{{ route('admin.facilities.index') }}" class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i> Sarana Prasarana
                    </a>
                    <a href="{{ route('admin.extracurricular.index') }}" class="{{ request()->routeIs('admin.extracurricular.*') ? 'active' : '' }}">
                        <i class="fas fa-running"></i> Ekstrakurikuler
                    </a>
                    <a href="{{ route('admin.teachers.index') }}" class="{{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher"></i> Guru
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <nav class="navbar navbar-expand-lg navbar-light mb-4">
                    <div class="container-fluid">
                        <span class="navbar-brand">@yield('title')</span>
                        <div class="navbar-nav ms-auto align-items-center">
                            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Website
                            </a>
                            <span class="admin-badge d-none d-md-inline">Admin</span>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="main-card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer class="py-3 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Sekolah Dasar</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html> 