@extends('layouts.admin')

@section('title', 'Edit Facility')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Facility</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $facility->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $facility->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="teacher" class="form-label">Teacher</label>
                    <input type="text" class="form-control @error('teacher') is-invalid @enderror" id="teacher" name="teacher" value="{{ old('teacher', $facility->teacher) }}" required>
                    @error('teacher')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="schedule" class="form-label">Schedule</label>
                    <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" value="{{ old('schedule', $facility->schedule) }}" required>
                    @error('schedule')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $facility->image_path) }}" alt="{{ $facility->name }}" style="max-width: 200px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">New Image (optional)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Facility</button>
                <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection 