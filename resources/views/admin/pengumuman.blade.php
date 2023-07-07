@extends('layouts.main')

@section('title', 'Edit Pengumuman')

@push('head')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush

@section('content')
    <x-admin-navbar />
    @if (session('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif

    <form action="{{ route('konfigurasi.update', ['type' => 'pengumuman']) }}" method="POST" enctype="multipart/form-data"
        id="form-pengumuman" class="card p-3">
        @csrf
        @method('PUT')
        <small class="text-muted mb-2">
            Pengumuman Pendaftaran
        </small>

        <div class="mb-3">
            <div>
                <input id="x" type="hidden" name="pengumuman" value="{{ $pengumuman }}">

                <trix-editor input="x" class="mb-3" style="min-height: 500px"></trix-editor>
            </div>

            @error('pengumuman')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pengumuman_image" class="form-label">Gambar</label>
            <input type="file" name="pengumuman_image" id="pengumuman_image" class="form-control">
            @error('pengumuman_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            @if ($pengumuman_image)
                <div class="d-flex gap-3">
                    <a href="{{ asset('storage/meta/' . $pengumuman_image->value) }}" target="_blank">Lihat Gambar</a>
                    <a href="{{ route('remove.meta', $pengumuman_image) }}" class="text-danger">Hapus</a>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="pengumuman_file" class="form-label">Berkas</label>
            <input type="file" name="pengumuman_file" id="pengumuman_file" class="form-control">
            @error('pengumuman_file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            @if ($pengumuman_file)
                <div class="d-flex gap-3">
                    <a href="{{ asset('storage/meta/' . $pengumuman_file->value) }}" target="_blank">Lihat Berkas</a>
                    <a href="{{ route('remove.meta', $pengumuman_file) }}" class="text-danger">Hapus</a>
                </div>
            @endif
        </div>


        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
    </form>
@endsection
