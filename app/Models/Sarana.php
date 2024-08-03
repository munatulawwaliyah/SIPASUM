<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $fillable = [
        'perumahan_id',
        'peribadahan',
        'rekreasi_dan_olahraga',
        'pertamanan_dan_rth',
        'perniagaan',
        'fasilitas_sosial',
        'pendidikan',
        'kesehatan',
        'pemakaman',
        'parkir',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }
}
