@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section with Video/Image Background -->
    <div class="relative h-screen">
        <!-- Background image with overlay -->
        <div class="absolute inset-0">
            <a href="{{ route('login') }}">
                @if(!empty($homeContent->image))
                    <img src="{{ asset('storage/' . $homeContent->image) }}" class="w-full h-full object-cover" alt="Sekolah Dasar">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-900 via-indigo-900 to-slate-900" aria-hidden="true"></div>
                @endif
            </a>
            <!-- Overlay untuk meningkatkan keterbacaan teks -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
            <div class="text-up max-w-4xl animate-fade-in-up" data-aos="fade-up">
                <h1 class="text-6xl font-bold text-white mb-6 leading-tight" style="font-family: 'Playfair Display', serif; letter-spacing: -1px; text-shadow: 0 4px 8px rgba(0,0,0,0.3);">
                    {{ $homeContent->title ?? 'Selamat Datang di Sekolah Dasar' }}
                </h1>
                <p class="text-2xl text-gray-100 mb-10 leading-relaxed" style="font-family: 'Raleway', sans-serif; font-weight: 400; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                    {{ $homeContent->description ?? 'Mendidik generasi unggul dengan kualitas dan integritas untuk masa depan yang gemilang.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('announcements') }}" 
                       class="inline-block px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg" style="font-family: 'Quicksand', sans-serif; letter-spacing: 0.5px;">
                        <i class="fas fa-bullhorn mr-2"></i>
                        DAFTAR SEKARANG
                    </a>
                    <a href="{{ route('vision') }}" 
                       class="inline-block px-10 py-4 bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl hover:bg-white/30 transition-all duration-300 transform hover:scale-105 shadow-2xl text-lg border border-white/30" style="font-family: 'Quicksand', sans-serif; letter-spacing: 0.5px;">
                        <i class="fas fa-eye mr-2"></i>
                        VISI & MISI
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Guru & Kepala Sekolah Section -->
    <section class="py-20 bg-gradient-to-br from-black-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">
                    <span class="bg-gradient-to-r from-black-600 to-indigo-600  bg-clip-text">
                        Guru & Kepala Sekolah
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Tim pengajar profesional yang berdedikasi untuk mendidik generasi unggul
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 justify-center">
                @foreach($teachers as $teacher)
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="flex flex-col items-center">
                            <div class="w-60 h-60 mb-6 relative overflow-hidden border-4 border-blue-100 bg-white rounded-xl">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-100 text-blue-400">
                                        <i class="fas fa-user text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <div class="font-bold text-xl text-gray-900 mb-2">{{ $teacher->name }}</div>
                                <div class="text-sm text-blue-600 font-medium bg-blue-50 px-3 py-1 rounded-full">{{ $teacher->position }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sarana Prasarana Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-white mb-6" style="font-family: 'Playfair Display', serif;">
                    Sarana Prasarana
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Fasilitas modern yang mendukung proses pembelajaran yang optimal
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($facilities as $facility)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $facility->image_path) }}" alt="{{ $facility->name }}" class="w-full h-64 object-cover hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $facility->name }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ Str::limit($facility->description, 120) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <div class="py-20 bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">
                    <span class="bg-gradient-to-r from-black-600 to-emerald-600 bg-clip-text ">
                        Ekstrakurikuler
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Mengembangkan bakat dan minat siswa melalui berbagai kegiatan ekstrakurikuler
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($extracurriculars as $extracurricular)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $extracurricular->image_path) }}" alt="{{ $extracurricular->name }}" class="w-full h-64 object-cover hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $extracurricular->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($extracurricular->description, 120) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-black-600 font-medium bg-green-50 px-3 py-1 rounded-full">{{ $extracurricular->coach }}</span>
                                <span class="text-sm text-gray-500">{{ $extracurricular->schedule }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pengumuman Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-white mb-6" style="font-family: 'Playfair Display', serif;">
                    Pengumuman Terbaru
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Informasi penting dan terbaru dari sekolah kami
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($announcements as $announcement)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if($announcement->image)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" class="w-full h-64 object-cover hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            </div>
                        @endif
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $announcement->title }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($announcement->content, 120) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-black-100 font-medium bg-purple-50 px-3 py-1 rounded-full">{{ $announcement->date->format('d M Y') }}</span>
                                <a href="{{ route('announcements') }}" class="text-black-600 hover:text-black-700 font-medium transition-colors duration-300">
                                    Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Feature Cards Section -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">
                    <span class="bg-gradient-to-r from-black-600 to-indigo-600 bg-clip-text">
                        Program Unggulan
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Program-program unggulan yang membedakan sekolah kami
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-500 hover:scale-105 hover:shadow-2xl" data-aos="fade-right">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-4 rounded-xl mr-4">
                            <i class="fas fa-crown text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">BORN TO BE A LEADER</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed" style="font-family: 'Raleway', sans-serif;">Membentuk karakter kepemimpinan yang kuat dan berakhlak mulia untuk masa depan yang gemilang</p>
                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-300" style="font-family: 'Quicksand', sans-serif;">
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-500 hover:scale-105 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-4 rounded-xl mr-4">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">GREAT ACHIEVEMENT</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed" style="font-family: 'Raleway', sans-serif;">Prestasi akademik dan non-akademik yang membanggakan di berbagai bidang</p>
                    <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium transition-colors duration-300" style="font-family: 'Quicksand', sans-serif;">
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-500 hover:scale-105 hover:shadow-2xl" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-4 rounded-xl mr-4">
                            <i class="fas fa-user-graduate text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">STUDENT ADMISSION</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed" style="font-family: 'Raleway', sans-serif;">Proses pendaftaran yang mudah dan transparan untuk calon siswa baru</p>
                    <a href="#" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium transition-colors duration-300" style="font-family: 'Quicksand', sans-serif;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-20 bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-white mb-6" style="font-family: 'Playfair Display', serif;">
                    Prestasi Kami
                </h2>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Pencapaian yang membanggakan dalam mendidik generasi unggul
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-8 transform transition-all duration-300 hover:scale-105" data-aos="zoom-in" data-aos-delay="0">
                    <div class="text-6xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">200+</div>
                    <div class="text-blue-100 text-xl font-medium">Siswa Aktif</div>
                </div>
                <div class="p-8 transform transition-all duration-300 hover:scale-105" data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-6xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">20+</div>
                    <div class="text-blue-100 text-xl font-medium">Guru & Staff</div>
                </div>
                <div class="p-8 transform transition-all duration-300 hover:scale-105" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-6xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">20+</div>
                    <div class="text-blue-100 text-xl font-medium">Prestasi</div>
                </div>
                <div class="p-8 transform transition-all duration-300 hover:scale-105" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-6xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">10+</div>
                    <div class="text-blue-100 text-xl font-medium">Program Unggulan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gradient-to-br from-gray-50 to-blue-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">
                    <span class="bg-gradient-to-r from-black-900 to-indigo-600 bg-clip-text">
                        Apa Kata Mereka?
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Testimoni dari alumni dan orang tua siswa
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:scale-105" data-aos="flip-left" data-aos-delay="0">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">Alumni Contoh 1</h4>
                            <p class="text-blue-600 font-medium">Alumni</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic leading-relaxed" style="font-family: 'Raleway', sans-serif;">"Pengalaman belajar yang luar biasa dengan fasilitas unggulan dan guru-guru yang kompeten. Saya senang menjadi alumni sekolah ini."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:scale-105" data-aos="flip-left" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">Orang Tua Contoh</h4>
                            <p class="text-blue-600 font-medium">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic leading-relaxed" style="font-family: 'Raleway', sans-serif;">"Anak saya mengalami perkembangan yang sangat baik sejak bersekolah di sini. Program-programnya sangat mendukung pembentukan karakter."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:scale-105" data-aos="flip-left" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">Alumni Contoh 2</h4>
                            <p class="text-blue-600 font-medium">Alumni</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic leading-relaxed" style="font-family: 'Raleway', sans-serif;">"Suasana belajar yang menyenangkan dan banyak kegiatan ekstrakurikuler yang membantu mengembangkan bakat dan minat."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps Section -->
    <div class="bg-gradient-to-br from-gray-900 to-blue-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-5xl font-bold text-white mb-6" style="font-family: 'Playfair Display', serif;">
                    Lokasi Kami
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Kunjungi kami di lokasi yang strategis dan mudah dijangkau
                </p>
            </div>
            
            <div class="relative w-full h-[500px] rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center bg-gray-200" data-aos="zoom-in">
                <p class="text-gray-700">Lokasi sekolah disamarkan.</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }
    </style>
@endsection 