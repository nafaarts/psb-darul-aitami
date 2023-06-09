@extends('layouts.main')

@section('title', 'Edit Santri')

@section('content')
    <x-admin-navbar />

    <div class="row">
        <div class="col-md-3">
            <div class="card p-3">
                <h5 class="m-0">Edit Santri</h5>
                <hr>
                <table>
                    <tr>
                        <th>
                            <a href="{{ route('santri.edit', [$santri, 'step' => 'data-diri']) }}">Data Diri</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="{{ route('santri.edit', [$santri, 'step' => 'orangtua']) }}">Orang Tua</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="{{ route('santri.edit', [$santri, 'step' => 'pendidikan']) }}">Pendidikan</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="{{ route('santri.edit', [$santri, 'step' => 'prestasi']) }}">Prestasi</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="{{ route('santri.edit', [$santri, 'step' => 'riwayat-penyakit']) }}">Riwayat
                                Penyakit</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-9">
            @switch(request('step'))
                @case('orangtua')
                    <div class="card p-3">
                        <h6>Data Orang Tua</h6>
                        <form action="{{ route('santri.update-orangtua', $santri) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="nama_ayah">Nama Ayah</small>
                                        <input type="text" class="form-control form-control-sm" id="nama_ayah" name="nama_ayah"
                                            placeholder="Masukan nama ayah anda"
                                            value="{{ old('nama_ayah', $santri?->orangTua?->nama_ayah) }}">
                                        @error('nama_ayah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="nama_ibu">Nama Ibu</small>
                                        <input type="text" class="form-control form-control-sm" id="nama_ibu" name="nama_ibu"
                                            placeholder="Masukan nama ibu anda"
                                            value="{{ old('nama_ibu', $santri?->orangTua?->nama_ibu) }}">
                                        @error('nama_ibu')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</small>
                                        <input type="text" class="form-control form-control-sm" id="pekerjaan_ayah"
                                            name="pekerjaan_ayah" placeholder="Masukan pekerjaan ayah anda"
                                            value="{{ old('pekerjaan_ayah', $santri?->orangTua?->pekerjaan_ayah) }}">
                                        @error('pekerjaan_ayah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</small>
                                        <input type="text" class="form-control form-control-sm" id="pekerjaan_ibu"
                                            name="pekerjaan_ibu" placeholder="Masukan pekerjaan ibu anda"
                                            value="{{ old('pekerjaan_ibu', $santri?->orangTua?->pekerjaan_ibu) }}">
                                        @error('pekerjaan_ibu')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="pendidikan_ayah">Pendidikan Ayah</small>
                                        <select class="form-select form-select-sm" name="pendidikan_ayah" id="pendidikan_ayah">
                                            @foreach (['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'] as $item)
                                                <option value="{{ $item }}" @selected(old('pendidikan_ayah', $santri?->orangTua?->pendidikan_ayah) == $item)>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_ayah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="pendidikan_ibu">Pendidikan Ibu</small>
                                        <select class="form-select form-select-sm" name="pendidikan_ibu" id="pendidikan_ibu">
                                            @foreach (['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'] as $item)
                                                <option value="{{ $item }}" @selected(old('pendidikan_ibu', $santri?->orangTua?->pendidikan_ibu) == $item)>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_ibu')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="penghasilan">Penghasilan</small>
                                        <select class="form-select form-select-sm" name="penghasilan" id="penghasilan">
                                            @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                                                <option value="{{ $item }}" @selected(old('penghasilan', $santri?->orangTua?->penghasilan) == $item)>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penghasilan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="agama">Agama</small>
                                        <select class="form-select form-select-sm" name="agama" id="agama">
                                            @foreach (['Islam', 'Protestan', 'Katolik', 'Buddha', 'Hindu', 'Kong Hu Cu'] as $item)
                                                <option value="{{ $item }}" @selected(old('agama', $santri?->orangTua?->agama) == $item)>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="jalan">Jalan</small>
                                        <input type="text" class="form-control form-control-sm" id="jalan" name="jalan"
                                            placeholder="Masukan jalan anda"
                                            value="{{ old('jalan', $santri?->orangTua?->jalan) }}">
                                        @error('jalan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="desa">Desa</small>
                                        <input type="text" class="form-control form-control-sm" id="desa" name="desa"
                                            placeholder="Masukan desa anda" value="{{ old('desa', $santri?->orangTua?->desa) }}">
                                        @error('desa')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="kecamatan">Kecamatan</small>
                                        <input type="text" class="form-control form-control-sm" id="kecamatan"
                                            name="kecamatan" placeholder="Masukan kecamatan anda"
                                            value="{{ old('kecamatan', $santri?->orangTua?->kecamatan) }}">
                                        @error('kecamatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="kabupaten">Kabupaten</small>
                                        <input type="text" class="form-control form-control-sm" id="kabupaten"
                                            name="kabupaten" placeholder="Masukan kabupaten anda"
                                            value="{{ old('kabupaten', $santri?->orangTua?->kabupaten) }}">
                                        @error('kabupaten')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="provinsi">Provinsi</small>
                                        <input type="text" class="form-control form-control-sm" id="provinsi"
                                            name="provinsi" placeholder="Masukan provinsi anda"
                                            value="{{ old('provinsi', $santri?->orangTua?->provinsi) }}">
                                        @error('provinsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label" for="no_hp">Nomor Handphone</small>
                                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                                            placeholder="Masukan no hp anda"
                                            value="{{ old('no_hp', $santri?->orangTua?->no_hp) }}">
                                        @error('no_hp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-2">
                                <a href="{{ route('santri.detail', $santri) }}" class="btn btn-secondary btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                @break

                @case('pendidikan')
                    <div class="card p-3">
                        <h6>Data Pendidikan</h6>
                        <form action="{{ route('santri.update-pendidikan', $santri) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">Nama Sekolah</small>
                                        <input type="text" class="form-control form-control-sm" id="nama_sekolah"
                                            name="nama_sekolah"
                                            value="{{ old('nama_sekolah', $santri?->pendidikan?->nama_sekolah) }}"
                                            placeholder="Masukan Nama Sekolah">
                                        @error('nama_sekolah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">NPSN Sekolah</small>
                                        <input type="text" class="form-control form-control-sm" id="npsn_sekolah"
                                            name="npsn_sekolah"
                                            value="{{ old('npsn_sekolah', $santri?->pendidikan?->npsn_sekolah) }}"
                                            placeholder="Masukan NPSN Sekolah">
                                        @error('npsn_sekolah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">Alamat Sekolah</small>
                                        <input type="text" class="form-control form-control-sm" id="alamat_sekolah"
                                            name="alamat_sekolah"
                                            value="{{ old('alamat_sekolah', $santri?->pendidikan?->alamat_sekolah) }}"
                                            placeholder="Masukan Alamat Sekolah">
                                        @error('alamat_sekolah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">Nomor Ijazah</small>
                                        <input type="text" class="form-control form-control-sm" id="no_ijazah"
                                            name="no_ijazah" value="{{ old('no_ijazah', $santri?->pendidikan?->no_ijazah) }}"
                                            placeholder="Masukan Nomor Ijazah">
                                        @error('no_ijazah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">Tahun Ijazah</small>
                                        <input type="number" max="{{ date('Y') }}" class="form-control form-control-sm"
                                            id="tahun_ijazah" name="tahun_ijazah"
                                            value="{{ old('tahun_ijazah', $santri?->pendidikan?->tahun_ijazah) }}"
                                            placeholder="Masukan Tahun Ijazah">
                                        @error('tahun_ijazah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <small class="form-label">Nilai Rata-Rata Rapor</small>
                                        <input type="text" class="form-control form-control-sm" id="nilai_rapor"
                                            name="nilai_rapor"
                                            value="{{ old('nilai_rapor', $santri?->pendidikan?->nilai_rapor) }}"
                                            placeholder="Masukan Nilai Rapor">
                                        @error('nilai_rapor')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-2">
                                <a href="{{ route('santri.detail', $santri) }}" class="btn btn-secondary btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan <i
                                        class="bi bi-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                @break

                @case('prestasi')
                    <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Data Prestasi</h6>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahDataPrestasi"
                                class="btn btn-sm btn-primary text-white">
                                <i class="bi bi-plus-lg"></i> Tambah Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tingkat</th>
                                        <th scope="col">Juara</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($santri?->prestasi as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tingkat }}</td>
                                            <td>{{ $item->juara }}</td>
                                            <td>
                                                <form action="{{ route('santri.destroy-prestasi', $item) }}" method="POST">
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
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-2">
                            <a href="{{ route('santri.detail', $santri) }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </div>
                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="modalTambahDataPrestasi" tabindex="-1"
                        aria-labelledby="modalTambahDataPrestasiLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('santri.store-prestasi', $santri) }}" method="POST" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTambahDataPrestasiLabel">Tambah Prestasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" required
                                            placeholder="Masukan nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tingkat" class="form-label">Tingkat</label>
                                        <input type="text" class="form-control" name="tingkat" id="tingkat" required
                                            placeholder="Masukan tingkat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="juara" class="form-label">Juara</label>
                                        <input type="text" class="form-control" name="juara" id="juara" required
                                            placeholder="Masukan juara">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @break

                @case('riwayat-penyakit')
                    <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Data Riwayat Penyakit</h6>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahDataRiwayatPenyakit"
                                class="btn btn-sm btn-primary text-white">
                                <i class="bi bi-plus-lg"></i> Tambah Data
                            </button>
                        </div>
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
                                    @forelse ($santri?->riwayatPenyakit as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kondisi }}</td>
                                            <td>
                                                <form action="{{ route('santri.destroy-riwayat-penyakit', $item) }}"
                                                    method="POST">
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
                            <a href="{{ route('santri.detail', $santri) }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </div>
                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="modalTambahDataRiwayatPenyakit" tabindex="-1"
                        aria-labelledby="modalTambahDataRiwayatPenyakitLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('santri.store-riwayat-penyakit', $santri) }}" method="POST"
                                class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTambahDataRiwayatPenyakitLabel">Tambah Riwayat Penyakit
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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
                @break

                @default
                    <div class="card p-3">
                        <h6>Data Diri</h6>
                        <form action="{{ route('santri.update', $santri) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <small for="nama" class="form-label">NAMA</small>
                                        <input type="text" class="form-control form-control-sm" name="nama"
                                            value="{{ old('nama', $santri->user->nama) }}" placeholder="Masukan nama anda">
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="nisn" class="form-label">NISN</small>
                                        <input type="text" class="form-control form-control-sm" name="nisn"
                                            value="{{ old('nisn', $santri?->nisn) }}" placeholder="Masukan nisn anda">
                                        @error('nisn')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="nik" class="form-label">NIK</small>
                                        <input type="text" class="form-control form-control-sm" name="nik"
                                            value="{{ old('nik', $santri?->nik) }}" placeholder="Masukan nik anda">
                                        @error('nik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="tempat_lahir" class="form-label">Tempat Lahir</small>
                                        <input type="text" class="form-control form-control-sm" name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $santri?->tempat_lahir) }}"
                                            placeholder="Masukan tempat lahir anda">
                                        @error('tempat_lahir')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="tanggal_lahir" class="form-label">Tanggal Lahir</small>
                                        <input type="date" class="form-control form-control-sm" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $santri?->tanggal_lahir) }}"
                                            placeholder="Masukan tanggal lahir anda">
                                        @error('tanggal_lahir')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="jenis_kelamin" class="form-label">Jenis Kelamin</small>
                                        <select class="form-select form-select-sm" id="jenis_kelamin" name="jenis_kelamin">
                                            <option @selected(old('jenis_kelamin', $santri?->jenis_kelamin) == 'L') value="L">Laki-Laki</option>
                                            <option @selected(old('jenis_kelamin', $santri?->jenis_kelamin) == 'P') value="P">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="golongan_darah" class="form-label">Golongan Darah</small>
                                        <select class="form-select form-select-sm" id="golongan_darah" name="golongan_darah">
                                            <option @selected(old('golongan_darah', $santri?->golongan_darah) == 'A') value="A">A</option>
                                            <option @selected(old('golongan_darah', $santri?->golongan_darah) == 'B') value="B">B</option>
                                            <option @selected(old('golongan_darah', $santri?->golongan_darah) == 'AB') value="AB">AB</option>
                                            <option @selected(old('golongan_darah', $santri?->golongan_darah) == 'O') value="O">O</option>
                                        </select>
                                        @error('golongan_darah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="anak_ke" class="form-label">Anak ke</small>
                                        <input type="number" class="form-control form-control-sm" name="anak_ke"
                                            value="{{ old('anak_ke', $santri?->anak_ke) }}" placeholder="Anak keberapa">
                                        @error('anak_ke')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="dari_bersauara" class="form-label">Dari Bersaudara</small>
                                        <input type="number" class="form-control form-control-sm" name="dari_bersaudara"
                                            value="{{ old('dari_bersaudara', $santri?->dari_bersaudara) }}"
                                            placeholder="Dari bersaudara">
                                        @error('dari_bersaudara')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="tinggi_badan" class="form-label">Tinggi Badan</small>
                                        <input type="number" class="form-control form-control-sm" name="tinggi_badan"
                                            value="{{ old('tinggi_badan', $santri?->tinggi_badan) }}"
                                            placeholder="Masukan tinggi badan anda">
                                        @error('tinggi_badan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="berat_badan" class="form-label">Berat Badan</small>
                                        <input type="number" class="form-control form-control-sm" name="berat_badan"
                                            value="{{ old('berat_badan', $santri?->berat_badan) }}"
                                            placeholder="Masukan berat badan anda">
                                        @error('berat_badan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="buta_warna" class="form-label">Buta Warna</small>
                                        <select class="form-select form-select-sm" id="buta_warna" name="buta_warna">
                                            <option @selected(old('buta_warna', $santri?->buta_warna) == 'TIDAK') value="TIDAK">TIDAK</option>
                                            <option @selected(old('buta_warna', $santri?->buta_warna) == 'TOTAL') value="TOTAL">TOTAL</option>
                                            <option @selected(old('buta_warna', $santri?->buta_warna) == 'PARSIAL') value="PARSIAL">PARSIAL</option>
                                        </select>
                                        @error('buta_warna')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small for="status_anak" class="form-label">Status Anak</small>
                                        <select class="form-select form-select-sm" id="status_anak" name="status_anak">
                                            <option @selected(old('status_anak', $santri?->status_anak) == 'YATIM') value="YATIM">YATIM</option>
                                            <option @selected(old('status_anak', $santri?->status_anak) == 'PIATU') value="PIATU">PIATU</option>
                                            <option @selected(old('status_anak', $santri?->status_anak) == 'YATIM PIATU') value="YATIM PIATU">YATIM PIATU</option>
                                            <option @selected(old('status_anak', $santri?->status_anak) == 'TIDAK') value="TIDAK">TIDAK</option>
                                        </select>
                                        @error('status_anak')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <small for="foto" class="form-label">Pas Foto</small>
                                        <input type="file" class="form-control form-control-sm" name="foto">
                                        @error('foto')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-2">
                                <a href="{{ route('santri.detail', $santri) }}" class="btn btn-secondary btn-sm">Kembali</a>
                                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
            @endswitch
        </div>
    </div>
@endsection
