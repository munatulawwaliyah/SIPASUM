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
        'desas_id',
    ];

    public function desas()
    {
        return $this->belongsTo(Desa::class);
    }

    public function prasaranas()
    {
        return $this->hasMany(Prasarana::class, 'perumahans_id');
    }

    public function saranas()
    {
        return $this->hasMany(Sarana::class, 'perumahans_id');
    }

    public function utilitas()
    {
        return $this->hasMany(Utilitas::class, 'perumahans_id');
    }
}
