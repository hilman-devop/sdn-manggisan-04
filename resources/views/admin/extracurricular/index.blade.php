@extends('layouts.admin')

@section('title', 'Extracurricular Management')

@section('content')
<div class="container-fluid">
    
    </div>
    <script>
        
        let angleEkskul = 0;
        const imgEkskul = document.getElementById('rotating-image-ekskul');
        setInterval(() => {
            angleEkskul += 360;
            imgEkskul.style.transform = `rotateY(${angleEkskul}deg)`;
            setTimeout(() => {
                idxEkskul = (idxEkskul + 1) % imagesEkskul.length;
                imgEkskul.src = imagesEkskul[idxEkskul];
            }, 500);
        }, 2000);
    </script>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Extracurricular Activities</h5>
            <a href="{{ route('admin.extracurricular.create') }}" class="btn btn-primary">Add New Activity</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Coach</th>
                            <th>Schedule</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($extracurriculars as $extracurricular)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $extracurricular->image_path) }}" alt="{{ $extracurricular->name }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $extracurricular->name }}</td>
                                <td>{{ $extracurricular->coach }}</td>
                                <td>{{ $extracurricular->schedule }}</td>
                                <td>
                                    <a href="{{ route('admin.extracurricular.edit', $extracurricular) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.extracurricular.destroy', $extracurricular) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No extracurricular activities found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 