@extends('layouts.main')

@section('title', 'Formulir Pendaftaran')

@section('content')
    <div class="card p-3">
        <h5 class="m-0">Formulir pendaftaran</h5>
        <hr>
        <h6>Data Pendidikan</h6>
        {{--
            // 'nama_sekolah', // 'npsn_sekolah',
            // 'alamat_sekolah', // 'no_ijazah',
            // 'tahun_ijazah', // 'nilai_rapor'
        --}}
        <form action="{{ route('pendaftaran.pendidikan') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label">Nama Sekolah</small>
                        <input type="text" class="form-control form-control-sm" id="nama_sekolah" name="nama_sekolah"
                            value="{{ old('nama_sekolah', $pendidikan?->nama_sekolah) }}"
                            placeholder="Masukan Nama Sekolah">
                        @error('nama_sekolah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label">NPSN Sekolah</small>
                        <input type="text" class="form-control form-control-sm" id="npsn_sekolah" name="npsn_sekolah"
                            value="{{ old('npsn_sekolah', $pendidikan?->npsn_sekolah) }}"
                            placeholder="Masukan NPSN Sekolah">
                        @error('npsn_sekolah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label">Alamat Sekolah</small>
                        <input type="text" class="form-control form-control-sm" id="alamat_sekolah" name="alamat_sekolah"
                            value="{{ old('alamat_sekolah', $pendidikan?->alamat_sekolah) }}"
                            placeholder="Masukan Alamat Sekolah">
                        @error('alamat_sekolah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label">Nomor Ijazah</small>
                        <input type="text" class="form-control form-control-sm" id="no_ijazah" name="no_ijazah"
                            value="{{ old('no_ijazah', $pendidikan?->no_ijazah) }}" placeholder="Masukan Nomor Ijazah">
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
                            value="{{ old('tahun_ijazah', $pendidikan?->tahun_ijazah) }}"
                            placeholder="Masukan Tahun Ijazah">
                        @error('tahun_ijazah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label">Nilai Rata-Rata Rapor</small>
                        <input type="text" class="form-control form-control-sm" id="nilai_rapor" name="nilai_rapor"
                            value="{{ old('nilai_rapor', $pendidikan?->nilai_rapor) }}" placeholder="Masukan Nilai Rapor">
                        @error('nilai_rapor')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-2">
                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan dan lanjutkan <i
                        class="bi bi-arrow-right"></i></button>
            </div>
        </form>
    </div>
@endsection
