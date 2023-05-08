<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'santri_id',
        'nama',
        'tingkat',
        'juara'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}