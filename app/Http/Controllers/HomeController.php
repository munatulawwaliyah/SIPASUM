<?php  
namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Perumahan;
use App\Models\Prasarana;
use App\Models\Sarana;
use App\Models\Utilitas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();

        // Start the perumahan query
        $perumahanQuery = Perumahan::query()->with('desas.kecamatans');

        // Apply filters if they exist
        if ($request->filled('kecamatan_id')) {
            $perumahanQuery->whereHas('desas.kecamatans', function($query) use ($request) {
                $query->where('id', $request->kecamatan_id);
            });
        }

        if ($request->filled('desa_id')) {
            $perumahanQuery->where('desas_id', $request->desa_id);
        }

        if ($request->filled('search')) {
            $perumahanQuery->where('nama_perumahan', 'like', '%' . $request->search . '%');
        }

        // Get the filtered perumahan results
        $perumahans = $perumahanQuery->get();

        // Fetch related prasaranas, saranas, and utilitas for each perumahan
        $perumahans->each(function ($perumahan) {
            $perumahan->prasaranas = Prasarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->saranas = Sarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->utilitas = Utilitas::where('perumahans_id', $perumahan->id)->get();
        });

        return view('welcome', compact('perumahans', 'kecamatans', 'desas'));
    }
}
