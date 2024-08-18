<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Perumahan;
use App\Models\Prasarana;
use App\Models\Sarana;
use App\Models\Utilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPerumahanController extends Controller
{
    public function index()
    {
        $perumahans = Perumahan::with(['desas.kecamatans'])->get();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();

        $perumahans->each(function ($perumahan) {
            $perumahan->prasaranas = Prasarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->saranas = Sarana::where('perumahans_id', $perumahan->id)->get();
            $perumahan->utilitas = Utilitas::where('perumahans_id', $perumahan->id)->get();

        });

        return view('perumahan', compact('perumahans', 'kecamatans', 'desas'));
    }

    public function getDesa($kecamatan_id)
    {
        $desas = Desa::where('kecamatans_id', $kecamatan_id)->get();
        return response()->json($desas);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perumahan' => 'required|string|max:255',
            'kecamatans_id' => 'required|integer',
            'desas_id' => 'required|integer',
            'nama_developer' => 'required|string|max:255',
            'luas_lahan_perumahan' => 'required|numeric',
            'luas_lahan_non_efektif' => 'required|numeric',
            'luas_lahan_efektif' => 'required|numeric',
            'jumlah_unit' => 'required|numeric',
            'status_serah_terima_psu' => 'required|boolean',
            'maps' => 'required|url',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jaringan_jalan' => 'nullable|string',
            'jaringan_drainase' => 'nullable|string',
            'jaringan_sanitasi' => 'nullable|string',
            'jaringan_persampahan' => 'nullable|string',
            'prasarana_lainnya' => 'nullable|string',
            'peribadahan' => 'nullable|string',
            'rekreasi_olahraga' => 'nullable|string',
            'pertamanan_rth' => 'nullable|string',
            'perniagaan' => 'nullable|string',
            'fasilitas_sosial' => 'nullable|string',
            'pendidikan'=>'nullable|string',
            'kesehatan' => 'nullable|string',
            'pemakaman' => 'nullable|string',
            'parkir' => 'nullable|string',
            'pelayanan_umum_dan_pemerintahan' => 'nullable|string',
            'sarana_lainnya' => 'nullable|string',
            'jaringan_penerangan' => 'nullable|string',
            'jaringan_air_bersih' => 'nullable|string',
            'jaringan_listrik' => 'nullable|boolean',
            'jaringan_telpon' => 'nullable|boolean',
            'jaringan_pemadam_kebakaran' => 'nullable|boolean',
            'gas' => 'nullable|boolean',
            'transportasi' => 'nullable|boolean',
    ]);

    if($request->hasFile('foto')) {
        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);
        $validatedData['foto'] = $fileName;
    }

    $perumahan = Perumahan::create($validatedData);

    Prasarana::create([
        'perumahans_id' => $perumahan->id,
        'jaringan_jalan' => $request->input('jaringan_jalan'),
        'jaringan_drainase' => $request->input('jaringan_drainase'),
        'jaringan_sanitasi' => $request->input('jaringan_sanitasi'),
        'jaringan_persampahan' => $request->input('jaringan_persampahan'),
        'prasarana_lainnya' => $request->input('prasarana_lainnya'),
    ]);

    Sarana::create([
        'perumahans_id' => $perumahan->id,
        'peribadahan' => $request->input('peribadahan'),
        'rekreasi_olahraga' => $request->input('rekreasi_olahraga'),
        'pertamanan_rth' => $request->input('pertamanan_rth'),
        'perniagaan' => $request->input('perniagaan'),
        'fasilitas_sosial' => $request->input('fasilitas_sosial'),
        'pendidikan' => $request->input('pendidikan'),
        'kesehatan' => $request->input('kesehatan'),
        'pemakaman' => $request->input('pemakaman'),
        'parkir' => $request->input('parkir'),
        'pelayanan_umum_dan_pemerintahan' => $request->input('pelayanan_umum_dan_pemerintahan'),
        'sarana_lainnya' => $request->input('sarana_lainnya'),
    ]);

    Utilitas::create([
        'perumahans_id' => $perumahan->id,
        'jaringan_penerangan' => $request->input('jaringan_penerangan'),
        'jaringan_air_bersih' => $request->input('jaringan_air_bersih'),
        'jaringan_listrik' => $request->input('jaringan_listrik'),
        'jaringan_telpon' => $request->input('jaringan_telpon'),
        'jaringan_pemadam_kebakaran' => $request->input('jaringan_pemadam_kebakaran'),
        'gas' => $request->input('gas'),
        'transportasi' => $request->input('transportasi'),
    ]);

    return redirect()->route('perumahan')->with('success', 'Data Perumahan berhasil ditambahkan');
}

public function update(Request $request, $id)
{
    // dd($request->all());
    $validatedData = $request->validate([
        'nama_perumahan' => 'required|string|max:255',
       'kecamatans_id' => 'required|exists:kecamatans,id',
        'desas_id' => 'required|exists:desas,id',
        'nama_developer' => 'required|string|max:255',
        'luas_lahan_perumahan' => 'required|numeric',
        'luas_lahan_non_efektif' => 'required|numeric',
        'luas_lahan_efektif' => 'required|numeric',
        'jumlah_unit' => 'required|numeric',
        'status_serah_terima_psu' => 'required|boolean',
        'maps' => 'required|url',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'jaringan_jalan' => 'nullable|string',
        'jaringan_drainase' => 'nullable|string',
        'jaringan_sanitasi' => 'nullable|string',
        'jaringan_persampahan' => 'nullable|string',
        'prasarana_lainnya' => 'nullable|string',
        'peribadahan' => 'nullable|string',
        'rekreasi_olahraga' => 'nullable|string',
        'pertamanan_rth' => 'nullable|string',
        'perniagaan' => 'nullable|string',
        'fasilitas_sosial' => 'nullable|string',
        'pendidikan'=>'nullable|string',
        'kesehatan' => 'nullable|string',
        'pemakaman' => 'nullable|string',
        'parkir' => 'nullable|string',
        'pelayanan_umum_dan_pemerintahan' => 'nullable|string',
        'sarana_lainnya' => 'nullable|string',
        'jaringan_penerangan' => 'nullable|string',
        'jaringan_air_bersih' => 'nullable|string',
        'jaringan_listrik' => 'nullable|boolean',
        'jaringan_telpon' => 'nullable|boolean',
        'jaringan_pemadam_kebakaran' => 'nullable|boolean',
        'gas' => 'nullable|boolean',
        'transportasi' => 'nullable|boolean',
    ]);

    $perumahan = Perumahan::findOrFail($id);

    if($request->hasFile('foto')) {
        // Delete the old photo if it exists
        if($perumahan->foto && file_exists(public_path('uploads/'.$perumahan->foto))){
            unlink(public_path('uploads/'.$perumahan->foto));
        }

        // Upload the new photo
        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);
        $validatedData['foto'] = $fileName;
    }

        $perumahan->update($request->all());

        $perumahan->prasaranas()->updateOrCreate(
            ['perumahans_id'=>$perumahan->id],
            [
            'jaringan_jalan' => $request->input('jaringan_jalan'),
            'jaringan_drainase' => $request->input('jaringan_drainase'),
            'jaringan_sanitasi' => $request->input('jaringan_sanitasi'),
            'jaringan_persampahan' => $request->input('jaringan_persampahan'),
            'prasarana_lainnya' => $request->input('prasarana_lainnya'),
            ]
        );

        $perumahan->saranas()->updateOrCreate(
            ['perumahans_id'=>$perumahan->id],
            [
            'peribadahan' => $request->input('peribadahan'),
            'rekreasi_olahraga' => $request->input('rekreasi_olahraga'),
            'pertamanan_rth' => $request->input('pertamanan_rth'),
            'perniagaan' => $request->input('perniagaan'),
            'fasilitas_sosial' => $request->input('fasilitas_sosial'),
            'pendidikan' => $request->input('pendidikan'),
            'kesehatan' => $request->input('kesehatan'),
            'pemakaman' => $request->input('pemakaman'),
            'parkir' => $request->input('parkir'),
            'pelayanan_umum_dan_pemerintahan' => $request->input('pelayanan_umum_dan_pemerintahan'),
            'sarana_lainnya' => $request->input('sarana_lainnya'),
        ]);

    $perumahan->utilitas()->updateOrCreate(
        ['perumahans_id'=>$perumahan->id],
        [
        'jaringan_penerangan' => $request->input('jaringan_penerangan'),
        'jaringan_air_bersih' => $request->input('jaringan_air_bersih'),
        'jaringan_listrik' => $request->input('jaringan_listrik'),
        'jaringan_telpon' => $request->input('jaringan_telpon'),
        'jaringan_pemadam_kebakaran' => $request->input('jaringan_pemadam_kebakaran'),
        'gas' => $request->input('gas'),
        'transportasi' => $request->input('transportasi'),
    ]);

    return redirect()->route('perumahan')->with('success', 'Data Perumahan berhasil diperbarui');
}


    public function delete($id)
    {
        $perumahan = Perumahan::findOrFail($id);

        $perumahan->delete();

        return redirect()->route('perumahan')->with('success', 'Data berhasil dihapus');
    }
}

