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
                        <small class="form-label" for="no_hp">Nomor Handphone</small>
                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                            placeholder="Masukan no hp anda" value="{{ old('no_hp', $orangTua?->no_hp) }}">
                        @error('no_hp')
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

                {{-- // start here! --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="provinsi">Provinsi</small>
                        <select class="form-select form-select-sm" id="provinsi" name="provinsi"
                            onchange="getKabupaten()">
                            <option value="" selected disabled>Pilih Provinsi</option>
                        </select>

                        @error('provinsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="kabupaten">Kabupaten</small>
                        <select class="form-select form-select-sm" id="kabupaten" name="kabupaten"
                            onchange="getKecamatan()">
                            <option value="" selected disabled>Pilih Kabupaten</option>
                        </select>

                        @error('kabupaten')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="kecamatan">Kecamatan</small>
                        <select class="form-select form-select-sm" id="kecamatan" name="kecamatan" onchange="getDesa()">
                            <option value="" selected disabled>Pilih Kecamatan</option>
                        </select>

                        @error('kecamatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <small class="form-label" for="desa">Desa</small>

                        <select class="form-select form-select-sm" id="desa" name="desa">
                            <option value="" selected disabled>Pilih Desa</option>
                        </select>
                        @error('desa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- // end here --}}
            </div>
            <div class="d-flex justify-content-end gap-2 mt-2">
                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                <button type="submit" class="btn btn-primary text-white btn-sm">Simpan dan lanjutkan</button>
            </div>
        </form>
    </div>

    <script>
        const selectProvinsi = document.getElementById('provinsi')
        const selectKabupaten = document.getElementById('kabupaten')
        const selectKecamatan = document.getElementById('kecamatan')
        const selectDesa = document.getElementById('desa')

        // {{ old('provinsi', $orangTua?->provinsi) }}
        // {{ old('kabupaten', $orangTua?->kabupaten) }}
        // {{ old('kecamatan', $orangTua?->kecamatan) }}
        // {{ old('desa', $orangTua?->desa) }}

        function removeChildren(parent) {
            while (parent.firstChild) {
                parent.removeChild(parent.firstChild)
            }
        }

        function getProvinsi() {
            const url = "https://dev.farizdotid.com/api/daerahindonesia/provinsi";
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    data?.provinsi.forEach(item => {
                        const option = document.createElement('option')
                        option.dataset.id = item.id
                        option.text = item.nama

                        selectProvinsi.append(option)
                    });
                })
                .catch(error => console.error(error))
        }

        function getKabupaten() {
            let _id = selectProvinsi.options[selectProvinsi.selectedIndex].dataset.id;

            const url = `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${_id}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    removeChildren(selectKabupaten)
                    data?.kota_kabupaten.forEach(item => {
                        const option = document.createElement('option')
                        option.dataset.id = item.id
                        option.text = item.nama

                        selectKabupaten.append(option)
                    });
                })
                .catch(error => console.error(error))
        }

        function getKecamatan() {
            let _id = selectKabupaten.options[selectKabupaten.selectedIndex].dataset.id;

            const url = `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${_id}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    removeChildren(selectKecamatan)
                    data?.kecamatan.forEach(item => {
                        const option = document.createElement('option')
                        option.dataset.id = item.id
                        option.text = item.nama

                        selectKecamatan.append(option)
                    });
                })
                .catch(error => console.error(error))
        }

        function getDesa() {
            let _id = selectKecamatan.options[selectKecamatan.selectedIndex].dataset.id;

            const url =
                `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${_id}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    removeChildren(selectDesa)
                    data?.kelurahan.forEach(item => {
                        const option = document.createElement('option')
                        option.dataset.id = item.id
                        option.text = item.nama

                        selectDesa.append(option)
                    });
                })
                .catch(error => console.error(error))
        }

        getProvinsi()
    </script>
@endsection
