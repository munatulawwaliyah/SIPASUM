<?php  
namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\File;
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
        $perumahanQuery = Perumahan::query()->with(['desas.kecamatans', 'prasaranas', 'saranas', 'utilitas']);

        if ($request->has('kecamatan_id') && $request->kecamatan_id) {
            $perumahanQuery->whereHas('desas.kecamatans', function($q) use ($request) {
                $q->where('id', $request->kecamatan_id);
            });
        }

        if ($request->has('desa_id') && $request->desa_id) {
            $perumahanQuery->whereHas('desas', function($q) use ($request) {
                $q->where('id', $request->desa_id);
            });
        }

        if ($request->has('search') && $request->search) {
            $perumahanQuery->where('nama_perumahan', 'like', '%'.$request->search.'%');
        }

        // Get the filtered perumahan results
        $perumahans = $perumahanQuery->paginate(10);

        // Get the count of all Perumahan
        $jumlahPerumahan = Perumahan::count();

        // Get the count of Perumahan with status_serah_terima_psu = true (already handed over)
        $sudahSerahTerima = Perumahan::where('status_serah_terima_psu', true)->count();

        // Get the count of Perumahan with status_serah_terima_psu = false (not handed over)
        $belumSerahTerima = Perumahan::where('status_serah_terima_psu', false)->count();

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

        return view('welcome', compact('perumahans', 'kecamatans', 'desas', 'jumlahPerumahan', 'sudahSerahTerima', 'belumSerahTerima', 'formatDanPersyaratan', 'UU', 'PP14', 'PP64', 'Permen', 'Perda', 'Perbup', 'Panduan'));
    }

    public function getDesa($kecamatan_id)
    {
        $desas = Desa::where('kecamatans_id', $kecamatan_id)->get();
        return response()->json($desas);
    }

}