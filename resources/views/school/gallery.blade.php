@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="bg-gradient-to-br from-purple-50 via-pink-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16" data-aos="fade-down">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-6xl sm:tracking-tight lg:text-7xl mb-6">
                    <span class="bg-gradient-to-r from-purple-600 to-black-600 bg-clip-text">
                        Galeri Foto
                    </span>
                </h1>
                <p class="mt-5 max-w-2xl mx-auto text-xl text-gray-600 leading-relaxed">
                    Dokumentasi kegiatan dan momen berharga di Sekolah Dasar
                </p>
                <div class="mt-8 flex justify-center">
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                </div>
            </div>
            <!-- Gallery Grid -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse($galleries as $gallery)
                    <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-80 w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->image) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                <div class="flex items-center justify-between">
                                    <span class="bg-purple-500 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $gallery->category ?? 'Kategori' }}
                                    </span>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-300">
                                {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                                <p class="text-gray-600 leading-relaxed">
                                    {{ Str::limit($gallery->description, 120) }}
                                </p>
                        @endif
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    {{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}
                                </div>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20" data-aos="fade-up">
                        <div class="bg-white rounded-2xl shadow-xl p-12 max-w-md mx-auto">
                            <div class="bg-gray-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-images text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Foto</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Saat ini belum ada foto yang dipublikasikan dalam galeri. 
                                Silakan cek kembali nanti untuk melihat dokumentasi kegiatan sekolah.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($galleries->hasPages())
            <div class="mt-16 flex justify-center" data-aos="fade-up">
                <div class="bg-white rounded-xl shadow-lg p-4">
                {{ $galleries->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection 