<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sekolah Dasar - Mendidik generasi unggul dengan kualitas dan integritas.">
    <meta name="keywords" content="Sekolah Dasar, Pendidikan">
    <title>@yield('title') - Sekolah Dasar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&family=Raleway:wght@300;400;500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f8fafc;
            color: #1a1a1a;
            line-height: 1.6;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            letter-spacing: -0.02em;
        }
        .gradient-text {
            background: linear-gradient(135deg,rgb(255, 255, 255) 0%,rgb(248, 248, 248) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Playfair Display', serif;
        }
        .nav-link {
            font-family: 'Quicksand', sans-serif;
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #2563eb;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .desktop-menu {
                display: none;
            }
            .mobile-menu {
                display: block;
            }
        }
        .shine {
            position: relative;
            overflow: hidden;
        }
        .shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 50%,
                    rgba(255, 255, 255, 0) 100%);
            animation: shine 3s infinite;
        }
        @keyframes shine {
            0% { left: -100%; }
            20% { left: 100%; }
            100% { left: 100%; }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class=" bg-gradient-to-br from-gray-800 to-blue-800 shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <img src="{{ asset('storage/home/1750423698.jpg') }}" alt="Logo Sekolah Dasar" class="h-10 w-10 mr-2 rounded-full shadow-md">
                    <span class="text-2xl font-bold gradient-text shine">Sekolah Dasar</span>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex desktop-menu">
                    <a href="{{ route('home') }}" class="nav-link border-transparent text-white hover:text-yellow-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium @if(request()->routeIs('home')) active @endif">Beranda</a>
                    <a href="{{ route('vision') }}" class="nav-link border-transparent text-white hover:text-yellow-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium @if(request()->routeIs('vision')) active @endif">Visi & Misi</a>
                    <a href="{{ route('gallery') }}" class="nav-link border-transparent text-white hover:text-yellow-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium @if(request()->routeIs('gallery')) active @endif">Galeri</a>
                    <a href="{{ route('announcements') }}" class="nav-link border-transparent text-white hover:text-yellow-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium @if(request()->routeIs('announcements')) active @endif">Pengumuman</a>
                    <a href="{{ route('profile') }}" class="nav-link border-transparent text-white hover:text-yellow-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium @if(request()->routeIs('profile')) active @endif">Profil</a>
                </div>
                <!-- Mobile Hamburger -->
                <div class="sm:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <i class="fas fa-bars fa-2x"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu bg-blue-500 rounded-lg mt-2 shadow-lg hidden">
                <a href="{{ route('home') }}" class="block px-4 py-2 text-white hover:bg-blue-600 @if(request()->routeIs('home')) font-bold @endif">Beranda</a>
                <a href="{{ route('vision') }}" class="block px-4 py-2 text-white hover:bg-blue-600 @if(request()->routeIs('vision')) font-bold @endif">Visi & Misi</a>
                <a href="{{ route('gallery') }}" class="block px-4 py-2 text-white hover:bg-blue-600 @if(request()->routeIs('gallery')) font-bold @endif">Galeri</a>
                <a href="{{ route('announcements') }}" class="block px-4 py-2 text-white hover:bg-blue-600 @if(request()->routeIs('announcements')) font-bold @endif">Pengumuman</a>
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-white hover:bg-blue-600 @if(request()->routeIs('profile')) font-bold @endif">Profil</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen bg-white">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-900 to-blue-900 text-white py-12 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-right">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-school text-white-400 mr-2"></i>
                        <h3 class="text-xl font-bold" style="font-family: 'Playfair Display', serif;">Sekolah Dasar</h3>
                    </div>
                    <p class="text-gray-300" style="font-family: 'Raleway', sans-serif;">Mendidik generasi unggul dengan kualitas dan integritas.</p>
                </div>
                <div data-aos="zoom-in">
                    <h3 class="text-xl font-bold mb-4" style="font-family: 'Playfair Display', serif;">Kontak</h3>
                    <p class="text-gray-300">Kontak sekolah disamarkan.</p>
                </div>
                <div data-aos="fade-left">
                    <h3 class="text-xl font-bold mb-4" style="font-family: 'Playfair Display', serif;">Lokasi</h3>
                    <p class="text-gray-300">Lokasi sekolah disamarkan.</p>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p style="font-family: 'Raleway', sans-serif;">&copy; {{ date('Y') }} Hilman Arifin Ilham. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
                offset: 100
            });
            // Mobile menu toggle
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            btn.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>