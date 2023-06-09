@extends('layouts.main')

@section('title', 'Detail Santri')

@section('content')
    <x-admin-navbar />

    <div class="card p-3">
        <h5 class="m-0">Detail Santri</h5>
        <hr>
        <div
            class="d-flex flex-column-reverse flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-3">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @can('admin')
                <div class="d-flex gap-2">
                    <form action="{{ route('santri.konfirmasi-pembayaran', $santri) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($santri->status_pembayaran)
                            <button class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle-fill"></i> Uang Pendaftaran
                            </button>
                        @else
                            <button class="btn btn-sm btn-secondary">
                                <i class="bi bi-x-circle-fill"></i> Uang Pendaftaran
                            </button>
                        @endif
                    </form>

                    <form action="{{ route('santri.toggle-lulus', $santri) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($santri->status_lulus)
                            <button class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle-fill"></i> Lulus
                            </button>
                        @else
                            <button class="btn btn-sm btn-secondary">
                                <i class="bi bi-x-circle-fill"></i> Lulus
                            </button>
                        @endif
                    </form>
                    <a href="{{ route('santri.edit', $santri) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('santri.destroy', $santri) }}" method="POST"
                        onsubmit="return confirm('apakah anda yakin dihapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            @endcan
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="card p-1 mb-3">
                    <img src="{{ asset('storage/santri/' . $santri->foto) }}" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <h6>Data Pendaftaran</h6>
                <div class="table-responsive mb-4">
                    <table>
                        <tr>
                            <th>Nomor Daftar</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->no_daftar }}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td class="px-2">:</td>
                            <td>
                                @if ($santri->status_pembayaran)
                                    <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Sudah
                                        Membayar</span>
                                @else
                                    <span class="badge bg-warning"><i class="bi bi-exclamation-triangle-fill"></i> Belum
                                        Membayar</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status Kelulusan</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->status_lulus ? 'LULUS' : '-' }}</td>
                        </tr>
                    </table>
                </div>

                <h6>Data Santri</h6>
                <div class="table-responsive mb-4">
                    <table>
                        <tr>
                            <th>Nama Santri</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->user->nama }}</td>
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
                            <th>NISN</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->nisn }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->nik }}</td>
                        </tr>
                        <tr>
                            <th>Anak Ke</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->anak_ke }} Dari {{ $santri->dari_bersaudara }} Bersaudara </td>
                        </tr>
                        <tr>
                            <th>Status Yatim / Piatu</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->status_anak }}</td>
                        </tr>
                    </table>
                </div>

                <h6>Data Pendidikan</h6>
                <div class="table-responsive mb-4">
                    <table>
                        <tr>
                            <th>Sekolah Asal</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>NPSN Sekolah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->npsn_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Sekolah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->alamat_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>No Ijazah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->no_ijazah }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Ijazah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->tahun_ijazah }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Rata-rata Rapor</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->pendidikan->nilai_rapor }}</td>
                        </tr>
                    </table>
                </div>

                <h6>Data Prestasi</h6>
                <div class="table-responsive mb-4">
                    <table>
                        <tr>
                            <th>Prestasi</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->prestasi->map(fn($item) => $item->nama . " [ $item->tingkat - $item->juara ]")->join(', ') }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-5">


                <h6>Data Orang Tua</h6>
                <div class="table-responsive mb-4">
                    <table>
                        <tr>
                            <th>Nama Ayah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Handphone</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ayah</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->pendidikan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ibu</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->pendidikan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Penghasilan</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->penghasilan }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->agama }}</td>
                        </tr>
                        <tr>
                            <th>Jalan</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->jalan }}</td>
                        </tr>
                        <tr>
                            <th>Desa</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->desa }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Kabupaten</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->kabupaten }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td class="px-2">:</td>
                            <td>{{ $santri->orangTua->provinsi }}</td>
                        </tr>
                    </table>
                </div>

                <h6>Data Kesehatan</h6>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Golongan Darah</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->golongan_darah }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->tinggi_badan }} CM
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->berat_badan }} KG
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Buta Warna</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->buta_warna }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Riwayat Penyakit</th>
                            <td class="px-2">:</td>
                            <td>
                                <span>
                                    {{ $santri->riwayatPenyakit->map(fn($item) => $item->nama . " ( $item->kondisi )")->join(', ') }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
