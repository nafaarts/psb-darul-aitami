<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Ujian</title>

    <style>
        th,
        td {
            text-align: left;
            padding: 5px 0;
        }

        @media print {
            .wrapper {
                width: 21cm;
                padding: 15mm 15mm;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <table style="width: 100%; border: 1px solid grey">
            <tr>
                <td colspan="2"
                    style="border-bottom: 1px solid grey; padding: 10px 0; text-align: center; background: #7DB343; color: #fff">
                    <h3 style="margin:0;">Kartu Peserta Ujian</h3>
                    <small>Penerimaan Santri Baru Pondok Pesantren Darul Aitami</small>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; padding-left: 20px">
                    <table style="width: 100%; margin-top: 20px;">
                        <tr>
                            <th>No Daftar</th>
                            <td>{{ $santri?->no_daftar }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $santri?->user->nama }}</td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td>{{ $santri?->tempat_lahir }}, {{ date('d F Y', strtotime($santri?->tanggal_lahir)) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $santri?->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; padding-right: 20px">
                    <table style="width: 100%; margin-top: 20px;">
                        <tr>
                            <th>Sekolah Asal</th>
                            <td>{{ $santri?->pendidikan?->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $santri?->nisn }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{ $santri?->orangTua?->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>No HP Ortu</th>
                            <td>{{ $santri?->orangTua?->no_hp }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; padding-left: 20px">
                    <img src="{{ $fotoSantri }}" alt="Foto Santri" height="160px">
                </td>
                <td style="width: 50%; padding-right: 20px">
                    <table style="width: 100%; margin: 20px 0;">
                        <tr>
                            <td colspan="2">Banda Aceh, {{ date('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Orang Tua</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div style="width: 200px; height: 120px; border-bottom: 1px solid grey"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        {{-- <img src="{{ $logo }}" alt="logo">
        <hr>
        <img src="{{ $fotoSantri }}" alt="Foto Santri"> --}}
    </div>
</body>

</html>
