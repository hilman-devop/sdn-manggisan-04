@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<div class="bg-gradient-to-br from-green-50 via-blue-50 to-indigo-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-16" data-aos="fade-down">
            <h1 class="text-5xl font-extrabold text-gray-900 sm:text-6xl sm:tracking-tight lg:text-7xl mb-6">
                <span class="bg-gradient-to-r from-green-600 to-black-600 bg-clip-text">
                    Visi & Misi
                </span>
            </h1>
            <p class="mt-5 max-w-2xl mx-auto text-xl text-black-600 leading-relaxed">
                Panduan dan arah pengembangan SD Negeri Manggisan 04
            </p>
            <div class="mt-8 flex justify-center">
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-blue-500 rounded-full"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Visi Section -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100" data-aos="fade-right">
                <div class="p-12">
                    <div class="flex items-center mb-8">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-6 rounded-full shadow-lg mr-6">
                            <i class="fas fa-eye text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900">Visi</h2>
                    </div>
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-8 rounded-2xl">
                        <p class="text-gray-700 leading-relaxed text-xl">
                            {{ $homeContent->vision ?? 'Menjadi lembaga pendidikan unggul yang menghasilkan generasi berakhlak mulia, berilmu, dan berprestasi dalam menghadapi tantangan global.' }}
                        </p>
                    </div>
                    <div class="mt-8 flex items-center">
                        <i class="fas fa-quote-left text-green-500 text-2xl mr-4"></i>
                        <p class="text-gray-600 italic text-lg">
                            "Mendidik dengan hati, mengajar dengan cinta"
                        </p>
                    </div>
                </div>
                </div>

            <!-- Misi Section -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100" data-aos="fade-left">
                <div class="p-12">
                    <div class="flex items-center mb-8">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 p-6 rounded-full shadow-lg mr-6">
                            <i class="fas fa-bullseye text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900">Misi</h2>
                    </div>
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-2xl">
                        <p class="text-gray-700 leading-relaxed text-xl">
                            {{ $homeContent->mission ?? 'Menyelenggarakan pendidikan berkualitas dengan mengembangkan potensi siswa secara optimal melalui pembelajaran yang efektif, efisien, dan berorientasi pada masa depan.' }}
                        </p>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Komitmen Kami:</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center text-lg text-gray-700">
                                <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                                Mengembangkan karakter siswa yang berakhlak mulia
                            </li>
                            <li class="flex items-center text-lg text-gray-700">
                                <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                                Meningkatkan prestasi akademik dan non-akademik
                            </li>
                            <li class="flex items-center text-lg text-gray-700">
                                <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                                Menyediakan fasilitas pendidikan yang modern
                            </li>
                            <li class="flex items-center text-lg text-gray-700">
                                <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                                Membangun kerjasama dengan orang tua dan masyarakat
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mt-16" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-xl text-gray-600">Pilar yang menjadi dasar pengembangan sekolah</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 p-4 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kasih Sayang</h3>
                    <p class="text-gray-600">Mendidik dengan penuh kasih sayang dan perhatian</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-4 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kreativitas</h3>
                    <p class="text-gray-600">Mengembangkan kreativitas dan inovasi siswa</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-4 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kerjasama</h3>
                    <p class="text-gray-600">Membangun kerjasama yang harmonis</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-500 p-4 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Keunggulan</h3>
                    <p class="text-gray-600">Berusaha mencapai keunggulan dalam segala hal</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 