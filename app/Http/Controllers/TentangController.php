<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $formatDanPersyaratan = File::where('nama_file', 'Format dan Persyaratan')->First();
        $UU = File::where('nama_file', 'Undang-Undang')->First();
        $PP14 = File::where('nama_file', 'PP NO 14')->First();
        $PP64 = File::where('nama_file', 'PP NO 64')->First();
        $Permen = File::where('nama_file', 'Peraturan Mentri')->First();
        $Perda = File::where('nama_file', 'Peraturan Daerah')->First();
        $Perbup = File::where('nama_file', 'Peraturan Bupati')->First();
        $Panduan = File::where('nama_file', 'Panduan')->First();

        return view('tentang', compact('formatDanPersyaratan', 'UU', 'PP14', 'PP64', 'Permen', 'Perda', 'Perbup', 'Panduan'));
    }//
}
