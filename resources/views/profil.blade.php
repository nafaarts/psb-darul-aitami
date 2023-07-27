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
                <span>Silahkan mendaftar ulang pada tanggal 12 Juli 2023 sampai dengan 15 Juli 2023 di pondok pesantren Darul
                    Aitami</span>
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
                    <a href="{{ route('pendaftaran.kartu-ujian') }}" class="btn btn-sm btn-primary text-white"
                        style="width: fit-content">
                        <i class="bi bi-file-earmark-arrow-down"></i> Download Kartu Ujian
                    </a>
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
                <div class="mb-3">
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
