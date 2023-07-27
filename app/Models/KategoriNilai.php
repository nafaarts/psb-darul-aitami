<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriNilai extends Model
{
    use HasFactory;

    protected $table = 'kategori_nilai';

    protected $fillable = [
        'nama_pelajaran',
        'slug',
        'kategori',
    ];
}
