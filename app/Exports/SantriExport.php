<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SantriExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    public function query()
    {
        return Santri::query()->whereNot('status_daftar_ulang', 0);
    }

    public function map($santri): array
    {
        return [
            $santri->no_daftar,
            $santri->user->nama,
            $santri->nik,
            $santri->nisn,
            $santri->tempat_lahir,
            $santri->tanggal_lahir,
            $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $santri->anak_ke,
            $santri->dari_bersaudara,
            $santri->status_anak,
            $santri->golongan_darah,
            $santri->tinggi_badan,
            $santri->buta_warna,
            $santri->nilaiAverage(),
            $santri->ukuran_baju_olahraga
        ];
    }

    public function headings(): array
    {
        return [
            'No Daftar',
            'Nama',
            'NIK',
            'NISN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Anak ke',
            'Dari Bersaudara',
            'Status Anak',
            'Golongan Darah',
            'Tinggi Badan',
            'Buta Warna',
            'Nilai Rata-rata',
            'Ukuran baju olahraga'
        ];
    }
}
