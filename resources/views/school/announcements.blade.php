@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16" data-aos="fade-down">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-6xl sm:tracking-tight lg:text-7xl mb-6">
                    <span class="bg-gradient-to-r from-black-600 to-indigo-600 bg-clip-text">
                        Pengumuman
                    </span>
                </h1>
                <p class="mt-5 max-w-2xl mx-auto text-xl text-black-600 leading-relaxed">
                    Informasi penting dan pengumuman terbaru dari SD Negeri Manggisan 04
                </p>
                <div class="mt-8 flex justify-center">
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full"></div>
                </div>
            </div>

            <!-- Announcements List -->
            <div class="space-y-8">
                @forelse($announcements as $announcement)
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8">
                                @if($announcement->image)
                                <div class="flex-shrink-0">
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $announcement->image) }}" 
                                             alt="{{ $announcement->title }}" 
                                             class="w-64 h-64 object-cover rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="flex-1 text-center lg:text-left">
                                    <div class="flex items-center justify-center lg:justify-start mb-4">
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-3 rounded-full shadow-lg">
                                            <i class="fas fa-bullhorn text-white text-xl"></i>
                                        </div>
                                        <h3 class="ml-4 text-2xl font-bold text-gray-900 leading-tight">
                                            {{ $announcement->title }}
                                        </h3>
                                    </div>
                                    
                                    <div class="prose prose-lg max-w-none">
                                        <p class="text-gray-700 leading-relaxed text-lg">
                                            {{ $announcement->content }}
                                        </p>
                                    </div>
                                    
                                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                                        <div class="flex items-center bg-blue-50 px-4 py-2 rounded-full">
                                            <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                                            <span class="text-blue-800 font-medium">
                                                {{ \Carbon\Carbon::parse($announcement->date)->format('d F Y') }}
                                            </span>
                                        </div>
                                        
                                        <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                                            <i class="fas fa-clock text-green-600 mr-2"></i>
                                            <span class="text-green-800 font-medium">
                                                {{ \Carbon\Carbon::parse($announcement->date)->format('H:i') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20" data-aos="fade-up">
                        <div class="bg-white rounded-2xl shadow-xl p-12 max-w-md mx-auto">
                            <div class="bg-gray-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-bullhorn text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Pengumuman</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Saat ini belum ada pengumuman yang dipublikasikan. 
                                Silakan cek kembali nanti untuk informasi terbaru.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($announcements->hasPages())
            <div class="mt-16 flex justify-center" data-aos="fade-up">
                <div class="bg-white rounded-xl shadow-lg p-4">
                    {{ $announcements->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection 