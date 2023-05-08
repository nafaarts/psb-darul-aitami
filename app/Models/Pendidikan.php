<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';

    protected $fillable = [
        'santri_id',
        'nama_sekolah',
        'npsn_sekolah',
        'alamat_sekolah',
        'no_ijazah',
        'tahun_ijazah',
        'nilai_rapor'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
