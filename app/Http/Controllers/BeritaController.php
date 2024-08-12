<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Fetch the latest berita
        $berita = Berita::latest()->first(); // Fetch the most recent berita

        // Fetch other berita ordered by the most recent first, excluding the latest berita
        $otherBeritas = Berita::where('id', '!=', $berita->id)
                            ->orderBy('created_at', 'desc') // Order by most recent first
                            ->take(5)
                            ->get();

        // Fetch sidebar berita that were released before the latest berita, ordered by the oldest first
        $sidebarBeritas = Berita::where('id', '!=', $berita->id)
                                ->where('created_at', '<', $berita->created_at) // Released before the latest berita
                                ->orderBy('created_at', 'asc') // Order by oldest first
                                ->take(7)
                                ->get();

        return view('berita', compact('berita', 'otherBeritas', 'sidebarBeritas'));
    }

    
}
