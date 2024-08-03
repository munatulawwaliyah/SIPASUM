<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_perumahan',
        'nama_developer',
        'luas_lahan_perumahan',
        'luas_lahan_efektif',
        'luas_lahan_non_efektif',
        'jumlah_unit',
        'status_serah_terima_psu',
        'maps',
        'foto',
        'desa_id',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function prasarana()
    {
        return $this->hasOne(Prasarana::class);
    }

    public function sarana()
    {
        return $this->hasOne(Sarana::class);
    }

    public function utilitas()
    {
        return $this->hasOne(Utilitas::class);
    }
}
