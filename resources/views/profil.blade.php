@extends('layouts.main')

@section('title', 'Profil')

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif

    @can('santri')
        @if ($santri?->status_lulus && $lengkapMendaftar)
            <div class="alert alert-success" role="alert">
                <i class="bi bi-emoji-laughing-fill"></i>
                <strong>Selamat, Anda lulus menjadi santri di pondok pesantren Darul Aitami.</strong>
                <br>
                <span>Silahkan kirimkan bukti pembayaran uang pangkal dan mendaftar ulang pada tanggal 12 Juli 2023 sampai
                    dengan 15 Juli 2023 di pondok pesantren Darul
                    Aitami</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Pendaftaran Santri Baru</h5>
                <a href="{{ route('pendaftaran', ['step' => 'data-diri']) }}" class="btn btn-sm btn-primary text-white"><i
                        class="bi bi-pencil-fill"></i> Edit Data</a>
            </div>
            <hr>
            @if ($lengkapMendaftar)
                <h6>Detail Pendaftaran Anda:</h6>
                <div class="d-flex flex-column flex-md-row gap-3">
                    <div class="card p-2" style="max-width: 180px">
                        <img src="{{ asset('storage/santri/' . $santri->foto) }}" alt="">
                    </div>
                    <div class="table-responsive">
                        <table>
                            @if ($santri->status_lulus)
                                <tr>
                                    <th>Status Daftar Ulang</th>
                                    <td class="px-2">:</td>
                                    <td>
                                        @if ($santri->status_daftar_ulang)
                                            <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i>
                                                {{ $santri->statusDaftarUlang() }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning"><i class="bi bi-exclamation-triangle-fill"></i>
                                                {{ $santri->statusDaftarUlang() }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>Nama Santri</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Daftar</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->no_daftar }}</td>
                            </tr>
                            <tr>
                                <th>Tempat/Tanggal Lahir</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->tempat_lahir }}, {{ $santri->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->orangTua?->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->pendidikan?->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>NPSN Sekolah</th>
                                <td class="px-2">:</td>
                                <td>{{ $santri->pendidikan?->npsn_sekolah }}</td>
                            </tr>

                            {{-- <tr>
                                <th>Riwayat Penyakit</th>
                                <td class="px-2">:</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <span>
                                            {{ $santri->riwayatPenyakit->map(fn($item) => $item->nama . " ( $item->kondisi )")->join(', ') }}
                                        </span>
                                        <a href="{{ route('pendaftaran', ['step' => 'riwayat-penyakit']) }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <th>Prestasi</th>
                                <td class="px-2">:</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <span>
                                            {{ $santri->prestasi->map(fn($item) => $item->nama . " [ $item->tingkat - $item->juara ]")->join(', ') }}
                                        </span>
                                        <a href="{{ route('pendaftaran', ['step' => 'prestasi']) }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr> --}}

                        </table>
                    </div>
                </div>
                <hr>
                @if ($santri?->status_pembayaran)
                    <div class="d-flex gap-2">
                        <a href="{{ route('pendaftaran.kartu-ujian') }}" class="btn btn-sm btn-primary text-white"
                            style="width: fit-content">
                            <i class="bi bi-file-earmark-arrow-down"></i> Download Kartu Ujian
                        </a>

                        @if (!$santri?->status_daftar_ulang)
                            <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal"
                                data-bs-target="#modalDaftarUlang">
                                Daftar Ulang
                            </button>
                        @endif
                    </div>
                @endif
            @else
                <p>Pendaftaran Santri Baru Pondok Pesantren Darul Aitami.</p>
                <a href="{{ route('pendaftaran') }}" class="btn btn-sm btn-primary text-white px-4" style="width: fit-content">
                    Isi Formulir Pendaftaran
                </a>
            @endif
        </div>

        @if (!$santri?->status_pembayaran && $lengkapMendaftar)
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> <strong>Maaf, Anda belum membayar biaya pendaftaran!</strong>
                <hr>
                @php
                    $peringatan_pembayaran = App\Models\SiteMeta::where('name', 'peringatan_pembayaran')->first()?->value;
                @endphp
                <div style="font-size: 14px">
                    {!! $peringatan_pembayaran ?? '-' !!}
                </div>
                {{-- Silahkan transfer sebesar <strong>Rp. 20.000</strong> ke rekening <strong>Bank Aceh
                    12412.123.4123 a/n
                    Yayasan Darul Aitami</strong> dan konfirmasi dengan mengupload pada form dibawah dan mengirimkan bukti
                transfer melalui whatsapp
                <strong>+62832912392 (Muhajjir)</strong> --}}
            </div>

            <div class="card p-3 mb-3">
                <form action="{{ route('upload-bukti-pembayaran') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran">
                        @error('bukti_pembayaran')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="text-muted">FORMAT JPG,JPEG,PNG. MAX: 2 MB</small>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-primary">Kirim</button>
                        @if ($santri->bukti_pembayaran)
                            <a href="{{ asset('storage/bukti_pembayaran/' . $santri->bukti_pembayaran) }}"
                                target="_blank">Lihat
                                Bukti Pembayaran</a>
                        @endif
                    </div>
                </form>
            </div>
        @endif

        <!-- Modal -->
        @if (!$santri?->status_daftar_ulang)
            <div class="modal fade" id="modalDaftarUlang" tabindex="-1" aria-labelledby="modalDaftarUlangLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalDaftarUlangLabel">Daftar Ulang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('upload-bukti-uang-pangkal') }}" method="post"
                                enctype="multipart/form-data" id="form-daftar-ulang">
                                @csrf
                                <div class="mb-3">
                                    <label for="ijazah" class="form-label">Upload Ijazah</label>
                                    <input type="file" accept=".pdf" class="form-control" name="ijazah" id="ijazah">
                                    @error('ijazah')
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                    <small class="text-muted">
                                        <span>FORMAT PDF. MAX: 3 MB - </span>
                                        @if ($santri->ijazah)
                                            <a href="{{ asset('storage/ijazah/' . $santri->ijazah) }}" target="_blank">
                                                Lihat Ijazah</a>
                                        @endif
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="kartu_keluarga" class="form-label">Upload Kartu Keluarga</label>
                                    <input type="file" accept=".pdf" class="form-control" name="kartu_keluarga"
                                        id="kartu_keluarga">
                                    @error('kartu_keluarga')
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                    <small class="text-muted">
                                        <span>FORMAT PDF. MAX: 3 MB - </span>
                                        @if ($santri->kartu_keluarga)
                                            <a href="{{ asset('storage/kartu_keluarga/' . $santri->kartu_keluarga) }}"
                                                target="_blank">
                                                Lihat Kartu Keluarga</a>
                                        @endif
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="bukti_uang_pangkal" class="form-label">Bukti Pembayaran Uang
                                        Pangkal</label>
                                    <input type="file" accept="image/*" class="form-control" name="bukti_uang_pangkal"
                                        id="bukti_uang_pangkal">
                                    @error('bukti_uang_pangkal')
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                    <small class="text-muted">
                                        <span>FORMAT JPG,JPEG,PNG. MAX: 2 MB - </span>
                                        @if ($santri->bukti_uang_pangkal)
                                            <a href="{{ asset('storage/bukti_uang_pangkal/' . $santri->bukti_uang_pangkal) }}"
                                                target="_blank">
                                                Lihat Bukti Pembayaran Uang Pangkal</a>
                                        @endif
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="ukuran_baju_olahraga" class="form-label">Ukuran Baju Olahraga</label>
                                    <select name="ukuran_baju_olahraga" id="ukuran_baju_olahraga" class="form-select">
                                        <option value="" disabled @selected(old('ukuran_baju_olahraga') == '')>
                                            -- pilih ukuran baju --
                                        </option>
                                        @foreach (['S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL', 'XXXXXL'] as $item)
                                            <option @selected(old('ukuran_baju_olahraga', $santri->ukuran_baju_olahraga) == $item)>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('ukuran_baju_olahraga')
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('form-daftar-ulang').submit()">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @endcan

    {{-- <div class="card p-3">
        <h5 class="m-0">Profil</h5>
        <hr>
        <form action="{{ route('profil.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                        value="{{ auth()->user()->nama }}">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Ubah Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password-confirmation" class="form-label">Ulangi Password</label>
                    <input type="password" class="form-control form-control-sm" id="password-confirmation"
                        name="password-confirmation">
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form> --}}
    </div>

@endsection
