@extends('layouts.main')

@section('title', 'Formulir Pendaftaran')

@section('content')
    <div class="card p-3">
        <h5 class="m-0">Formulir pendaftaran</h5>
        <hr>
        <h6>Data Orang Tua</h6>
        {{--
            // 'nama_ayah', // 'nama_ibu',
            // 'pekerjaan_ayah', // 'pekerjaan_ibu',
            // 'pendidikan_ayah', // 'pendidikan_ibu',
            // 'penghasilan', // 'agama',
            // 'jalan', // 'desa',
            // 'kecamatan', // 'kabupaten',
            // 'provinsi', // 'no_hp'
        --}}
        <form action="{{ route('pendaftaran.orang-tua') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="nama_ayah">Nama Ayah</small>
                        <input type="text" class="form-control form-control-sm" id="nama_ayah" name="nama_ayah"
                            placeholder="Masukan nama ayah anda" value="{{ old('nama_ayah', $orangTua?->nama_ayah) }}">
                        @error('nama_ayah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="nama_ibu">Nama Ibu</small>
                        <input type="text" class="form-control form-control-sm" id="nama_ibu" name="nama_ibu"
                            placeholder="Masukan nama ibu anda" value="{{ old('nama_ibu', $orangTua?->nama_ibu) }}">
                        @error('nama_ibu')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</small>
                        <input type="text" class="form-control form-control-sm" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            placeholder="Masukan pekerjaan ayah anda"
                            value="{{ old('pekerjaan_ayah', $orangTua?->pekerjaan_ayah) }}">
                        @error('pekerjaan_ayah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</small>
                        <input type="text" class="form-control form-control-sm" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            placeholder="Masukan pekerjaan ibu anda"
                            value="{{ old('pekerjaan_ibu', $orangTua?->pekerjaan_ibu) }}">
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
                                <option value="{{ $item }}" @selected(old('pendidikan_ayah', $orangTua?->pendidikan_ayah) == $item)>{{ $item }}
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
                                <option value="{{ $item }}" @selected(old('pendidikan_ibu', $orangTua?->pendidikan_ibu) == $item)>{{ $item }}
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
                                <option value="{{ $item }}" @selected(old('penghasilan', $orangTua?->penghasilan) == $item)>{{ $item }}
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
                                <option value="{{ $item }}" @selected(old('agama', $orangTua?->agama) == $item)>{{ $item }}
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
                            placeholder="Masukan jalan anda" value="{{ old('jalan', $orangTua?->jalan) }}">
                        @error('jalan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="desa">Desa</small>
                        <input type="text" class="form-control form-control-sm" id="desa" name="desa"
                            placeholder="Masukan desa anda" value="{{ old('desa', $orangTua?->desa) }}">
                        @error('desa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="kecamatan">Kecamatan</small>
                        <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan"
                            placeholder="Masukan kecamatan anda" value="{{ old('kecamatan', $orangTua?->kecamatan) }}">
                        @error('kecamatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="kabupaten">Kabupaten</small>
                        <input type="text" class="form-control form-control-sm" id="kabupaten" name="kabupaten"
                            placeholder="Masukan kabupaten anda" value="{{ old('kabupaten', $orangTua?->kabupaten) }}">
                        @error('kabupaten')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="provinsi">Provinsi</small>
                        <input type="text" class="form-control form-control-sm" id="provinsi" name="provinsi"
                            placeholder="Masukan provinsi anda" value="{{ old('provinsi', $orangTua?->provinsi) }}">
                        @error('provinsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="no_hp">Nomor Handphone</small>
                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                            placeholder="Masukan no hp anda" value="{{ old('no_hp', $orangTua?->no_hp) }}">
                        @error('no_hp')
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
