@extends('layouts.main')

@section('title', 'Konfigurasi')

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <section class="row">
        {{-- // Form Status Pendaftaran --}}
        <div class="col-md-12 mb-3">
            <div class="card p-3 h-100">
                <small class="text-muted mb-2">
                    Status Pendaftaran
                </small>
                <form action="{{ route('konfigurasi.update', ['type' => 'status-pendaftaran']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($data['status-pendaftaran'])
                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-sm btn-primary px-4 text-white" style="width:fit-content">
                                <i class="bi bi-x-circle-fill me-1"></i> Tutup Pendaftaran
                            </button>
                            <small class="text-muted">Pendaftaran Dibuka</small>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-sm btn-secondary px-4 text-white"
                                style="width:fit-content">
                                <i class="bi bi-check-circle-fill me-1"></i> Buka Pendaftaran
                            </button>
                            <small class="text-muted">Pendaftaran Ditutup</small>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- // Form Pengumuman Pendaftaran --}}
        <div class="col-md-6 mb-3">
            <form action="{{ route('konfigurasi.update', ['type' => 'pengumuman-pendaftaran']) }}" method="POST"
                enctype="multipart/form-data" id="form-pengumuman-pendaftaran" class="card p-3">
                @csrf
                @method('PUT')
                <small class="text-muted mb-2">
                    Pengumuman Pendaftaran
                </small>
                <div>
                    <input class="form-control form-control-sm" type="file" id="formFile" accept="application/pdf"
                        name="pengumuman-pendaftaran"
                        onchange="document.getElementById('form-pengumuman-pendaftaran').submit()">
                </div>
                @error('pengumuman-pendaftaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($data['pengumuman-pendaftaran'])
                    <hr>
                    <small>
                        <a href="{{ $data['pengumuman-pendaftaran'] }}" target="_blank">
                            <i class="bi bi-eye"></i> Lihat file
                        </a>
                    </small>
                @endif
            </form>
        </div>

        {{-- // Form Alur Pendaftaran --}}
        <div class="col-md-6 mb-3">
            <form action="{{ route('konfigurasi.update', ['type' => 'alur-pendaftaran']) }}" method="POST"
                enctype="multipart/form-data" id="form-alur-pendaftaran" class="card p-3">
                @csrf
                @method('PUT')
                <small class="text-muted mb-2">
                    Alur Pendaftaran
                </small>
                <div>
                    <input class="form-control form-control-sm" type="file" id="formFile" accept="image/*"
                        name="alur-pendaftaran" onchange="document.getElementById('form-alur-pendaftaran').submit()">
                </div>
                @error('alur-pendaftaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($data['alur-pendaftaran'])
                    <hr>
                    <small>
                        <a href="{{ $data['alur-pendaftaran'] }}" target="_blank">
                            <i class="bi bi-eye"></i> Lihat file
                        </a>
                    </small>
                @endif
            </form>
        </div>

        {{-- // Form Informasi Biaya --}}
        <div class="col-md-6 mb-3">
            <form action="{{ route('konfigurasi.update', ['type' => 'informasi-biaya']) }}" method="POST"
                enctype="multipart/form-data" id="form-informasi-biaya" class="card p-3">
                @csrf
                @method('PUT')
                <small class="text-muted mb-2">
                    Informasi Biaya
                </small>
                <div>
                    <input class="form-control form-control-sm" type="file" id="formFile" accept="application/pdf"
                        name="informasi-biaya" onchange="document.getElementById('form-informasi-biaya').submit()">
                </div>
                @error('informasi-biaya')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($data['informasi-biaya'])
                    <hr>
                    <small>
                        <a href="{{ $data['informasi-biaya'] }}" target="_blank">
                            <i class="bi bi-eye"></i> Lihat file
                        </a>
                    </small>
                @endif
            </form>
        </div>

        {{-- // form Pengumuman Kelulusan --}}
        <div class="col-md-6 mb-3">
            <form action="{{ route('konfigurasi.update', ['type' => 'pengumuman-kelulusan']) }}" method="POST"
                enctype="multipart/form-data" id="form-pengumuman-kelulusan" class="card p-3">
                @csrf
                @method('PUT')
                <small class="text-muted mb-2">
                    Pengumuman Kelulusan
                </small>
                <div>
                    <input class="form-control form-control-sm" type="file" id="formFile" accept="application/pdf"
                        name="pengumuman-kelulusan"
                        onchange="document.getElementById('form-pengumuman-kelulusan').submit()">
                </div>
                @error('pengumuman-kelulusan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($data['pengumuman-kelulusan'])
                    <hr>
                    <small>
                        <a href="{{ $data['pengumuman-kelulusan'] }}" target="_blank">
                            <i class="bi bi-eye"></i> Lihat file
                        </a>
                    </small>
                @endif
            </form>
        </div>
    </section>
@endsection
