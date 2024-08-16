<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\File;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Fetch the latest berita
        $beritas = Berita::latest()->first(); // Fetch the most recent berita

        // Fetch other berita ordered by the most recent first, excluding the latest berita
        $otherBeritas = Berita::where('id', '!=', $beritas->id)
                            ->orderBy('created_at', 'desc') // Order by most recent first
                            ->take(1)
                            ->get();

        // Fetch sidebar berita that were released before the latest berita, ordered by the oldest first
        $sidebarBeritas = Berita::where('id', '!=', $beritas->id)
                                ->where('created_at', '<', $beritas->created_at) // Released before the latest berita
                                ->orderBy('created_at', 'asc') // Order by oldest first
                                ->take(7)
                                ->get();

        $formatDanPersyaratan = File::where('nama_file', 'Format dan Persyaratan')->First();
        $UU = File::where('nama_file', 'Undang-Undang')->First();
        $PP14 = File::where('nama_file', 'PP NO 14')->First();
        $PP64 = File::where('nama_file', 'PP NO 64')->First();
        $Permen = File::where('nama_file', 'Peraturan Mentri')->First();
        $Perda = File::where('nama_file', 'Peraturan Daerah')->First();
        $Perbup = File::where('nama_file', 'Peraturan Bupati')->First();

        return view('berita', compact('beritas', 'otherBeritas', 'sidebarBeritas', 'formatDanPersyaratan', 'UU', 'PP14', 'PP64', 'Permen', 'Perda', 'Perbup'));
    }

    
}
