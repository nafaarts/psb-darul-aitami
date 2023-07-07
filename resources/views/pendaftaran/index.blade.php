@extends('layouts.main')

@section('title', 'Formulir Pendaftaran')

@section('content')
    <div class="card p-3">
        <h5 class="m-0">Formulir pendaftaran</h5>
        <hr>
        <h6>Data Diri</h6>
        {{--
            // 'nisn', // 'nik',
            // 'tempat_lahir', // 'tanggal_lahir',
            // 'jenis_kelamin', // 'golongan_darah',
            // 'anak_ke', // 'dari_bersaudara',
            // 'tinggi_badan', // 'berat_badan',
            // 'buta_warna', // 'status_anak',
            // 'foto'
        --}}
        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <small for="nama" class="form-label">NAMA</small>
                        <input type="text" class="form-control form-control-sm" name="nama"
                            value="{{ old('nama', auth()->user()->nama) }}" placeholder="Masukan nama anda">
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
                            value="{{ old('dari_bersaudara', $santri?->dari_bersaudara) }}" placeholder="Dari bersaudara">
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
                        <small class="text-muted">Pas foto 3 X 4 maksimal: 2 MB</small>
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-2">
                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan dan lanjutkan</button>
            </div>
        </form>
    </div>
@endsection
