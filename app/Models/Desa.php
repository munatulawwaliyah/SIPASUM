<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'kecamatans_id',
    ];

    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function perumahans()
    {
        return $this->hasMany(Perumahan::class);
    }
}
