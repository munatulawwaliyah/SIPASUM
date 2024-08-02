<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_perumahan',
        'des',
        'kecamatan',
        'nama_developer',
        'luas_lahan_perumahan',
        'luas_lahan_efektif',
        'luas_lahan_non_efektif',
        'jumlah_unit_rumah_rencana',
        'status_serah_terima_psu',
        'url_maps',
        'foto_dokumentasi',
    ];
}
