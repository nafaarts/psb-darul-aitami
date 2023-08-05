<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santri';

    protected $fillable = [
        'user_id',
        'no_daftar',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'anak_ke',
        'dari_bersaudara',
        'golongan_darah',
        'tinggi_badan',
        'berat_badan',
        'buta_warna',
        'status_anak',
        'status_pembayaran',
        'bukti_pembayaran',
        'status_lulus',
        'status_daftar_ulang',
        'bukti_uang_pangkal',
        'ijazah',
        'kartu_keluarga',
        'ukuran_baju_olahraga',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function riwayatPenyakit()
    {
        return $this->hasMany(RiwayatPenyakit::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'santri_id');
    }

    public function nilaiAverage()
    {
        if ($this->nilai->count() == 0) {
            return 0;
        }

        return $this->nilai->reduce(function ($total, $item) {
            return $total + $item?->nilai;
        }) / $this->nilai->count();
    }
}
