@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Gallery Images</h5>
                    <p class="card-text display-4">{{ \App\Models\Gallery::count() }}</p>
                    <a href="{{ route('admin.gallery.index') }}" class="text-white">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Announcements</h5>
                    <p class="card-text display-4">{{ \App\Models\Announcement::count() }}</p>
                    <a href="{{ route('admin.announcements.index') }}" class="text-white">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Facilities</h5>
                    <p class="card-text display-4">{{ \App\Models\Facility::count() }}</p>
                    <a href="{{ route('admin.facilities.index') }}" class="text-white">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Extracurriculars</h5>
                    <p class="card-text display-4">{{ \App\Models\Extracurricular::count() }}</p>
                    <a href="{{ route('admin.extracurricular.index') }}" class="text-white">View All</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Latest Announcements</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach(\App\Models\Announcement::latest()->take(5)->get() as $announcement)
                            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $announcement->title }}</h6>
                                    <small>{{ $announcement->date->format('d M Y') }}</small>
                                </div>
                                <p class="mb-1">{{ Str::limit($announcement->content, 100) }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Latest Gallery Images</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(\App\Models\Gallery::latest()->take(4)->get() as $gallery)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $gallery->title }}</h6>
                                        <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 