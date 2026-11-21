@extends('layouts.admin')

@section('title', 'Announcements Management')

@section('content')
<div class="container-fluid">
   
    </div>
    <script>
       
        let idxAnn = 0;
        let angleAnn = 0;
        const imgAnn = document.getElementById('rotating-image-ann');
        setInterval(() => {
            angleAnn += 360;
            imgAnn.style.transform = `rotateY(${angleAnn}deg)`;
            setTimeout(() => {
                idxAnn = (idxAnn + 1) % imagesAnn.length;
                imgAnn.src = imagesAnn[idxAnn];
            }, 500);
        }, 2000);
    </script>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Announcements</h5>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">Add New Announcement</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                            <tr>
                                <td>
                                    @if($announcement->image)
                                        <img src="{{ asset('storage/' . $announcement->image) }}" alt="Announcement Image" class="img-thumbnail" style="max-height: 50px; width: auto;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $announcement->title }}</td>
                                <td>{{ Str::limit($announcement->content, 100) }}</td>
                                <td>{{ $announcement->date->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this announcement?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No announcements found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 