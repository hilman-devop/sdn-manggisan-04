@extends('layouts.admin')

@section('title', isset($profile) ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($profile) ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah' }}</h3>
                </div>
                <form action="{{ isset($profile) ? route('admin.profiles.update', $profile->id) : route('admin.profiles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($profile))
                        @method('PUT')
                    @endif
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $profile->title ?? '') }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $profile->description ?? '') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vision">Visi</label>
                            <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3" required>{{ old('vision', $profile->vision ?? '') }}</textarea>
                            @error('vision')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mission">Misi</label>
                            <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="3" required>{{ old('mission', $profile->mission ?? '') }}</textarea>
                            @error('mission')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="history">Sejarah</label>
                            <textarea class="form-control @error('history') is-invalid @enderror" id="history" name="history" rows="4" required>{{ old('history', $profile->history ?? '') }}</textarea>
                            @error('history')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facilities">Fasilitas</label>
                            <div id="facilities-container">
                                @if(isset($profile) && $profile->facilities)
                                    @foreach($profile->facilities as $facility)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="facilities[]" value="{{ $facility }}" required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger remove-facility">Hapus</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="facilities[]" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger remove-facility">Hapus</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-success mt-2" id="add-facility">Tambah Fasilitas</button>
                        </div>

                        <div class="form-group">
                            <label for="achievements">Prestasi</label>
                            <div id="achievements-container">
                                @if(isset($profile) && $profile->achievements)
                                    @foreach($profile->achievements as $achievement)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="achievements[]" value="{{ $achievement }}" required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger remove-achievement">Hapus</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="achievements[]" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger remove-achievement">Hapus</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-success mt-2" id="add-achievement">Tambah Prestasi</button>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" {{ isset($profile) ? '' : 'required' }}>
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                            @error('image')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Add facility
        $('#add-facility').click(function() {
            var facilityHtml = `
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="facilities[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-facility">Hapus</button>
                    </div>
                </div>
            `;
            $('#facilities-container').append(facilityHtml);
        });

        // Remove facility
        $(document).on('click', '.remove-facility', function() {
            $(this).closest('.input-group').remove();
        });

        // Add achievement
        $('#add-achievement').click(function() {
            var achievementHtml = `
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="achievements[]" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-achievement">Hapus</button>
                    </div>
                </div>
            `;
            $('#achievements-container').append(achievementHtml);
        });

        // Remove achievement
        $(document).on('click', '.remove-achievement', function() {
            $(this).closest('.input-group').remove();
        });

        // Custom file input
        $('input[type="file"]').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
</script>
@endpush
@endsection 