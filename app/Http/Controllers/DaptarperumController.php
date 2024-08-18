<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Perumahan;
use App\Models\Prasarana;
use App\Models\Sarana;
use App\Models\Utilitas;
use Illuminate\Http\Request;

class DaptarperumController extends Controller
{
    public function index()
    {
        // Start the perumahan query
        $perumahanQuery = Perumahan::query()->with(['desas.kecamatans', 'prasaranas', 'saranas', 'utilitas']);

        // Get the filtered perumahan results
        $perumahans = $perumahanQuery->paginate(15);

        // Fetch related prasaranas, saranas, and utilitas for each perumahan
        // $perumahans->each(function ($perumahan) {
        //     $perumahan->prasaranas = Prasarana::where('perumahans_id', $perumahan->id)->get();
        //     $perumahan->saranas = Sarana::where('perumahans_id', $perumahan->id)->get();
        //     $perumahan->utilitas = Utilitas::where('perumahans_id', $perumahan->id)->get();
        // });

        $formatDanPersyaratan = File::where('nama_file', 'Format dan Persyaratan')->First();
        $UU = File::where('nama_file', 'Undang-Undang')->First();
        $PP14 = File::where('nama_file', 'PP NO 14')->First();
        $PP64 = File::where('nama_file', 'PP NO 64')->First();
        $Permen = File::where('nama_file', 'Peraturan Mentri')->First();
        $Perda = File::where('nama_file', 'Peraturan Daerah')->First();
        $Perbup = File::where('nama_file', 'Peraturan Bupati')->First();
        $Panduan = File::where('nama_file', 'Panduan')->First();

        return view('daftarperumahan', compact('perumahans', 'formatDanPersyaratan','UU', 'PP14', 'PP64', 'Permen', 'Perda', 'Perbup', 'Panduan'));
    }//
}
