<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';

    protected $fillable = [
        'santri_id',
        'nama_ayah',
        'nama_ibu',
        'agama',
        'alamat',
        // 'jalan',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'no_hp',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'penghasilan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
