<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model
{
    use HasFactory;

    protected $fillable = [
        'perumahans_id',
        'jaringan_jalan',
        'jaringan_drainase',
        'jaringan_sanitasi',
        'jaringan_persampahan',
    ];

    public function perumahans()
    {
        return $this->belongsTo(Perumahan::class, 'perumahans_id');
    }
}
