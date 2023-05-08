@extends('layouts.main')

@section('title', 'Formulir Pendaftaran')

@section('content')
    <div class="card p-3">
        <h5 class="m-0">Formulir pendaftaran</h5>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h6>Data Riwayat Penyakit</h6>
            <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahDataRiwayatPenyakit"
                class="btn btn-sm btn-secondary text-white">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </button>
        </div>
        {{--
            / // 'nama',
            // 'kondisi',
        --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayatPenyakit as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kondisi }}</td>
                            <td>
                                <form action="{{ route('pendaftaran.destroy-riwayat-penyakit', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-2">
            <a href="{{ route('pendaftaran', ['step' => 'prestasi']) }}" class="btn btn-primary text-white btn-sm">lanjutkan
                <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambahDataRiwayatPenyakit" tabindex="-1"
        aria-labelledby="modalTambahDataRiwayatPenyakitLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('pendaftaran.riwayat-penyakit') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTambahDataRiwayatPenyakitLabel">Tambah Riwayat Penyakit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Penyakit</label>
                        <input type="text" class="form-control" name="nama" id="nama" required
                            placeholder="Masukan nama">
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" id="kondisi" required
                            placeholder="Masukan kondisi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
