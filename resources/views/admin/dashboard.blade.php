@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <x-admin-navbar />

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3 p-3">
                <small class="text-muted">Jumlah Pendaftar</small>
                <h3 class="m-0">{{ $jumlahPendaftar }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 p-3">
                <small class="text-muted">Jumlah Santriwati</small>
                <h3 class="m-0">{{ $jumlahSantriwati }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 p-3">
                <small class="text-muted">Jumlah Santriwan</small>
                <h3 class="m-0">{{ $jumlahSantriwan }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 p-3">
                <small class="text-muted">Jumlah Lulus</small>
                <h3 class="m-0">{{ $jumlahLulus }}</h3>
            </div>
        </div>
    </div>

    <div class="card p-3 mb-3 h-100">
        <small class="text-muted mb-2">
            Status Pendaftaran
        </small>
        <form action="{{ route('konfigurasi.update', ['type' => 'status-pendaftaran']) }}" method="POST">
            @csrf
            @method('PUT')
            @if ($data['status-pendaftaran'])
                <div class="d-flex align-items-center gap-2">
                    <button type="submit" class="btn btn-sm btn-secondary px-4 text-white" style="width:fit-content">
                        <i class="bi bi-x-circle-fill me-1"></i> Tutup Pendaftaran
                    </button>
                    <small class="text-muted">Pendaftaran Dibuka</small>
                </div>
            @else
                <div class="d-flex align-items-center gap-2">
                    <button type="submit" class="btn btn-sm btn-primary px-4 text-white" style="width:fit-content">
                        <i class="bi bi-check-circle-fill me-1"></i> Buka Pendaftaran
                    </button>
                    <small class="text-muted">Pendaftaran Ditutup</small>
                </div>
            @endif
        </form>
    </div>

    <form action="{{ route('dashboard') }}" method="GET" class="input-group mb-3">
        <input type="text" class="form-control bg-white" placeholder="Cari Nama, No Daftar, NIK atau NISN" name="cari"
            value="{{ request('cari') }}">
        <button class="btn btn-outline-secondary" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>

    <div class="card p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No Daftar</th>
                        <th scope="col">Status Bayar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status Lulus</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Orang Tua</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($santri as $item)
                        <tr>
                            <th scope="row">{{ $item->no_daftar }}</th>
                            <td>
                                @if ($item->status_pembayaran)
                                    <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i></span>
                                @else
                                    <span class="badge bg-warning"><i class="bi bi-exclamation-triangle-fill"></i></span>
                                @endif
                            </td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->status_lulus ? 'LULUS' : '-' }}</td>
                            <td>{{ $item->pendidikan?->nama_sekolah }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->orangTua?->nama_ayah ?? $item->orangTua?->nama_ibu }}</td>
                            <td>
                                <a href="{{ route('santri.detail', $item) }}" class="btn btn-sm btn-warning text-white">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $santri->links() }}
    </div>
@endsection
