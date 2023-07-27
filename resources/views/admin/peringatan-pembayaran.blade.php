@extends('layouts.main')

@section('title', 'Edit peringatan pembayaran')

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

    <form action="{{ route('konfigurasi.update', ['type' => 'peringatan_pembayaran']) }}" method="POST"
        enctype="multipart/form-data" id="form-peringatan_pembayaran" class="card p-3">
        @csrf
        @method('PUT')
        <small class="text-muted mb-2">
            Peringatan Pembayaran
        </small>

        <div class="mb-3">
            <div>
                <input id="x" type="hidden" name="peringatan_pembayaran" value="{{ $peringatan_pembayaran }}">
                <trix-editor input="x" class="mb-3" style="min-height: 500px"></trix-editor>
            </div>

            @error('peringatan_pembayaran')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
    </form>
@endsection
