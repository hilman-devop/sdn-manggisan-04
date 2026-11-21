@extends('layouts.app')

@section('title', 'Guru & Staff')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Guru & Staff</h1>
            <p class="mt-4 text-xl text-gray-600">Tim pengajar profesional yang berdedikasi</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($teachers as $teacher)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ $teacher->photo ?? 'https://via.placeholder.com/400x300' }}" 
                     alt="{{ $teacher->name }}" 
                     class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900">{{ $teacher->name }}</h3>
                    <p class="text-gray-600">{{ $teacher->position }}</p>
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-900">Sarana Prasarana:</h4>
                        <p class="text-gray-700">{{ $teacher->facilities }}</p>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-900">Pendidikan:</h4>
                        <p class="text-gray-700">{{ $teacher->education }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600">Data guru dan staff akan segera ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection 