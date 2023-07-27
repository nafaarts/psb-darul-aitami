@extends('layouts.main')

@section('title', 'Ubah Kategori Nilai')

@section('content')
    <x-admin-navbar />

    <div class="card p-3">
        <h5 class="m-0">Ubah Kategori Nilai</h5>
        <hr>
        <form action="{{ route('kategori-nilai.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_pelajaran" class="form-label">Nama Pelajaran</label>
                <input type="text" class="form-control form-control-sm" id="nama_pelajaran" name="nama_pelajaran"
                    value="{{ old('nama_pelajaran', $kategori->nama_pelajaran) }}">
                @error('nama_pelajaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select form-select-sm" id="kategori" name="kategori">
                    <option @selected(old('kategori', $kategori->kategori) == 'TULIS') value="TULIS">UJIAN TULIS</option>
                    <option @selected(old('kategori', $kategori->kategori) == 'LISAN') value="LISAN">UJIAN LISAN</option>
                </select>
                @error('kategori')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kategori-nilai.index') }}" class="btn btn-sm btn-secondary">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
