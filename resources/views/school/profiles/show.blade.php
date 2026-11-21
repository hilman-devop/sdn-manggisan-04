@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">{{ $profile->title }}</h1>
            
            @if($profile->image)
                <div class="text-center mb-5">
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->title }}" class="img-fluid rounded" style="max-height: 400px;">
                </div>
            @endif

            <div class="card mb-5">
                <div class="card-body">
                    <h2 class="card-title h4 mb-4">Deskripsi</h2>
                    <p class="card-text">{{ $profile->description }}</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4 mb-4">Visi</h2>
                            <p class="card-text">{{ $profile->vision }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4 mb-4">Misi</h2>
                            <p class="card-text">{{ $profile->mission }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-body">
                    <h2 class="card-title h4 mb-4">Sejarah</h2>
                    <p class="card-text">{{ $profile->history }}</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4 mb-4">Fasilitas</h2>
                            <ul class="list-unstyled">
                                @foreach($profile->facilities as $facility)
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        {{ $facility }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4 mb-4">Prestasi</h2>
                            <ul class="list-unstyled">
                                @foreach($profile->achievements as $achievement)
                                    <li class="mb-2">
                                        <i class="fas fa-trophy text-warning mr-2"></i>
                                        {{ $achievement }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 