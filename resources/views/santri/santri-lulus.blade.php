@extends('layouts.main')

@section('title', 'Data Santri')

@section('content')
    <x-admin-navbar />

    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0">Data Santri Lulus</h5>
            <form action="" method="get" id="filter-form">
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="filter" id="filter1" autocomplete="off" value="SEMUA">
                    <label class="btn btn-outline-primary" for="filter1">SEMUA</label>
                    <input type="radio" class="btn-check" name="filter" id="filter2" autocomplete="off"
                        value="BELUM_DIKONFIRMASI" @checked(request('filter') == 'BELUM_DIKONFIRMASI')>
                    <label class="btn btn-outline-primary" for="filter2">BELUM DIKONFIRMASI</label>
                    <input type="radio" class="btn-check" name="filter" id="filter3" autocomplete="off"
                        value="SUDAH_DIKONFIRMASI" @checked(request('filter') == 'SUDAH_DIKONFIRMASI')>
                    <label class="btn btn-outline-primary" for="filter3">SUDAH DIKONFIRMASI</label>
                </div>
            </form>
            <script>
                const tombolFilter = document.getElementsByName('filter');
                const formFilter = document.getElementById('filter-form');
                tombolFilter.forEach(tombol => {
                    tombol.onclick = () => formFilter.submit()
                });
            </script>
        </div>
        <hr>
        <form action="{{ route('santri.lulus') }}" method="GET" class="input-group mb-3">
            <input type="text" class="form-control bg-white" placeholder="Cari Nama, No Daftar, NIK atau NISN"
                name="cari" value="{{ request('cari') }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No Daftar</th>
                        <th scope="col">Status Bayar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status Daftar Ulang</th>
                        <th scope="col">Nilai</th>
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
                            <td>{{ $item->statusDaftarUlang() }}</td>
                            <td><b>{{ $item->nilaiAverage() }}</b></td>
                            <td>{{ $item->pendidikan?->nama_sekolah }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->orangTua?->nama_ayah ?? $item->orangTua?->nama_ibu }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    {{-- <form action="{{ route('santri.toggle-daftar-ulang', $item) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($item->status_daftar_ulang)
                                            <button class="btn btn-sm btn-success">
                                                <i class="bi bi-check-circle-fill"></i> Daftar Ulang
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-secondary">
                                                <i class="bi bi-x-circle-fill"></i> Daftar Ulang
                                            </button>
                                        @endif
                                    </form> --}}
                                    <a href="{{ route('santri.detail', $item) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="bi bi-eye-fill"></i> Lihat
                                    </a>
                                </div>
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
