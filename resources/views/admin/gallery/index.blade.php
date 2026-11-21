@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Gallery Images</h5>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Add New Image</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($images as $image)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $image->title }}</td>
                                <td>{{ Str::limit($image->description, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.gallery.edit', $image) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No images found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 