<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'perumahan_id',
        'jaringan_penerangan',
        'jaringan_air_bersih',
        'jaringan_listrik',
        'jaringan_telpon',
        'jaringan_pemadam_kebakaran',
        'gas',
        'transportasi',
    ];

    public function perumhan()
    {
        return $this->belongsTo(Perumahan::class);
    }
}
