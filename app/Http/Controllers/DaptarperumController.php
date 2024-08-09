<?php

namespace App\Http\Controllers;

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
        $perumahanQuery = Perumahan::query()->with('desas.kecamatans');

        // Get the filtered perumahan results
        $perumahans = $perumahanQuery->get();

        // Fetch related prasaranas, saranas, and utilitas for each perumahan
        $perumahans->each(function ($perumahan) {
            $perumahan->prasaranas = Prasarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->saranas = Sarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->utilitas = Utilitas::where('perumahans_id', $perumahan->id)->get();
        });

        return view('daftarperumahan', compact('perumahans'));
    }//
}
