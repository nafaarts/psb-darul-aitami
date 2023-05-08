<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penyakit';

    protected $fillable = [
        'santri_id',
        'nama',
        'kondisi',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
