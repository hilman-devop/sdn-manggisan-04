@extends('layouts.admin')

@section('title', 'Edit Extracurricular Activity')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Extracurricular Activity</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.extracurricular.update', $extracurricular) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $extracurricular->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $extracurricular->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="coach" class="form-label">Coach</label>
                    <input type="text" class="form-control @error('coach') is-invalid @enderror" id="coach" name="coach" value="{{ old('coach', $extracurricular->coach) }}" required>
                    @error('coach')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="schedule" class="form-label">Schedule</label>
                    <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" value="{{ old('schedule', $extracurricular->schedule) }}" required>
                    @error('schedule')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $extracurricular->image_path) }}" alt="{{ $extracurricular->name }}" style="max-width: 200px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">New Image (optional)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Activity</button>
                <a href="{{ route('admin.extracurricular.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection 