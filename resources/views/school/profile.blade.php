@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-16" data-aos="fade-down">
            <h1 class="text-5xl font-extrabold text-gray-900 sm:text-6xl sm:tracking-tight lg:text-7xl mb-6">
                <span class="bg-gradient-to-r from-blue-600 to-black-600 bg-clip-text">
                    Profil Sekolah
                </span>
            </h1>
            <p class="mt-5 max-w-2xl mx-auto text-xl text-black-600 leading-relaxed">
                Mengenal lebih dekat dengan SD Negeri Manggisan 04
            </p>
            <div class="mt-8 flex justify-center">
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100" data-aos="fade-up">
            <div class="p-12">
                <!-- Sejarah Section -->
                <div class="mb-12" data-aos="fade-right">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 p-4 rounded-full shadow-lg mr-6">
                            <i class="fas fa-history text-white text-2xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900">Sejarah</h2>
                    </div>
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-2xl">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            {{ $homeContent->history ?? 'SD Negeri Manggisan 04 didirikan dengan visi untuk memberikan pendidikan berkualitas bagi masyarakat. Sekolah ini telah berkomitmen dalam mengembangkan potensi siswa secara optimal melalui pembelajaran yang efektif dan efisien.' }}
                        </p>
                    </div>
                </div>

                <!-- Fasilitas Section -->
                <div class="mb-12" data-aos="fade-left">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-4 rounded-full shadow-lg mr-6">
                            <i class="fas fa-building text-white text-2xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900">Fasilitas</h2>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-graduation-cap text-green-600 text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-gray-900">Akademik</h3>
                            </div>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Ruang Kelas Modern
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Laboratorium Komputer
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Laboratorium IPA
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Perpustakaan Digital
                                </li>
                            </ul>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-futbol text-purple-600 text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-gray-900">Non-Akademik</h3>
                            </div>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                                    Lapangan Olahraga
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                                    Masjid Sekolah
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                                    Kantin Sehat
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                                    Area Parkir Luas
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Prestasi Section -->
                <div data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-4 rounded-full shadow-lg mr-6">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900">Prestasi</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 p-8 rounded-2xl text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-5xl font-bold text-yellow-600 mb-4">100%</div>
                            <p class="text-xl font-semibold text-gray-700">Kelulusan</p>
                            <p class="text-gray-600 mt-2">Tingkat kelulusan siswa</p>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-2xl text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-5xl font-bold text-blue-600 mb-4">20+</div>
                            <p class="text-xl font-semibold text-gray-700">Prestasi</p>
                            <p class="text-gray-600 mt-2">Penghargaan & prestasi</p>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-8 rounded-2xl text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="text-5xl font-bold text-green-600 mb-4">100+</div>
                            <p class="text-xl font-semibold text-gray-700">Siswa Aktif</p>
                            <p class="text-gray-600 mt-2">Total siswa aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 