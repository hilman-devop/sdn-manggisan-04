@extends('layouts.admin')

@section('title', 'Edit Guru & Kepala Sekolah')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Guru & Kepala Sekolah</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Jabatan</label>
                    <input type="text" name="position" id="position" class="form-control" value="{{ $teacher->position }}" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if($teacher->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" style="max-width: 120px; border-radius: 8px;">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection 