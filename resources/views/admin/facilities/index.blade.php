@extends('layouts.admin')

@section('title', 'Facilities Management')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Facilities</h5>
            <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">Add New Facility</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Teacher</th>
                            <th>Schedule</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($facilities as $facility)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $facility->image_path) }}" alt="{{ $facility->name }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $facility->name }}</td>
                                <td>{{ $facility->description }}</td>
                                <td>
                                    <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this facility?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No facilities found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 