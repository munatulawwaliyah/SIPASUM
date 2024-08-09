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
            'penribadahan' => 'nullable|string|in:m2,unit',
            'rekreasi_olahraga' => 'nullable|string',
            'pertamanan_rth' => 'nullable|string',
            'perniagaan' => 'nullable|string',
            'fasilitas_sosial' => 'nullable|string',
            'pendidikan'=>'nullable|string',
            'kesehatan' => 'nullable|string',
            'pemakaman' => 'nullable|string',
            'parkir' => 'nullable|string',
            'pelayanan_umum_dan_pemerintahan' => 'nullable|string',
            'prasarana_lainnya' => 'nullable|string',
            'jaringan_penerangan' => 'nullable|string',
            'jaringan_air_bersih' => 'nullable|string',
            'jaringan_listrik' => 'required|boolean',
            'jaringan_telpon' => 'required|boolean',
            'jaringan_pemadam_kebakaran' => 'required|boolean',
            'gas' => 'required|boolean',
            'transportasi' => 'required|boolean',
            'unit' => 'nullable|string|in:m2,unit',
        ]);

        

        if($request->hasFile('foto')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $validatedData['foto'] = $fileName;
        }

        $perumahan= Perumahan::create($validatedData);

        Prasarana::create([
            'perumahans_id' => $perumahan->id,
            'jaringan_jalan' => $request->input('jaringan_jalan'),
            'jaringan_drainase' => $request->input('jaringan_drainase'),
            'jaringan_sanitasi' => $request->input('jaringan_sanitasi'),
            'jaringan_persampahan' => $request->input('jaringan_persampahan'),
            'prasarna_lainnya' => $request->input('prasarana_lainnya'),
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
            'unit' => $request->input('unit'),
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

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'nama_perumahan' => 'required|string|max:255',
    //         'kecamatans_id' => 'required|integer',
    //         'desas_id' => 'required|integer',
    //         'nama_developer' => 'required|string|max:255',
    //         'luas_lahan_perumahan' => 'required|numeric',
    //         'luas_lahan_non_efektif' => 'required|numeric',
    //         'luas_lahan_efektif' => 'required|numeric',
    //         'jumlah_unit' => 'required|numeric',
    //         'status_serah_terima_psu' => 'required|boolean',
    //         'maps' => 'required|url',
    //         'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'jaringan_jalan' => 'nullable|numeric',
    //         'jaringan_drainase' => 'nullable|numeric',
    //         'jaringan_sanitasi' => 'nullable|numeric',
    //         'jaringan_persampahan' => 'nullable|numeric',
    //         'penribadahan' => 'nullable|numeric',
    //         'rekreasi_olahraga' => 'nullable|numeric',
    //         'pertamanan_rth' => 'nullable|numeric',
    //         'perniagaan' => 'nullable|numeric',
    //         'fasilitas_sosial' => 'nullable|numeric',
    //         'pendidikan' => 'nullable|numeric',
    //         'kesehatan' => 'nullable|numeric',
    //         'pemakaman' => 'nullable|numeric',
    //         'parkir' => 'nullable|numeric',
    //         'jaringan_penerangan' => 'nullable|numeric',
    //         'jaringan_air_bersih' => 'nullable|numeric',
    //         'jaringan_listrik' => 'required|boolean',
    //         'jaringan_telpon' => 'required|boolean',
    //         'jaringan_pemadam_kebakaran' => 'required|boolean',
    //         'gas' => 'required|boolean',
    //         'transportasi' => 'required|boolean',
    //     ]);

    //     // Ambil data perumahan berdasarkan ID
    //     $perumahan = Perumahan::findOrFail($id);

    //     // Update data perumahan
    //     $perumahan->nama_perumahan = $request->input('nama_perumahan');
    //     $perumahan->kecamatan_id = $request->input('kecamatan_id');
    //     $perumahan->desa_id = $request->input('desa_id');
    //     $perumahan->nama_developer = $request->input('nama_developer');
    //     $perumahan->luas_lahan_perumahan = $request->input('luas_lahan_perumahan');
    //     $perumahan->luas_lahan_non_efektif = $request->input('luas_lahan_non_efektif');
    //     $perumahan->luas_lahan_efektif = $request->input('luas_lahan_efektif');
    //     $perumahan->jumlah_unit = $request->input('jumlah_unit');
    //     $perumahan->status_serah_terima_psu = $request->input('status_serah_terima_psu');
    //     $perumahan->maps = $request->input('maps');

    //     // Cek apakah ada file foto yang diupload
    //     if ($request->hasFile('foto')) {
    //         // Hapus foto lama jika ada
    //         if ($perumahan->foto) {
    //             Storage::delete($perumahan->foto);
    //         }
    //         // Simpan foto baru
    //         $perumahan->foto = $request->file('foto')->store('fotos');
    //     }

    //     // Update field Prasarana
    //     $perumahan->jaringan_jalan = $request->input('jaringan_jalan');
    //     $perumahan->jaringan_drainase = $request->input('jaringan_drainase');
    //     $perumahan->jaringan_sanitasi = $request->input('jaringan_sanitasi');
    //     $perumahan->jaringan_persampahan = $request->input('jaringan_persampahan');

    //     // Update field Sarana
    //     $perumahan->pendidikan = $request->input('peribadahan');
    //     $perumahan->rekreasi_olahraga = $request->input('rekreasi_olahraga');
    //     $perumahan->pertamanan_rth = $request->input('pertamanan_rth');
    //     $perumahan->perniagaan = $request->input('perniagaan');
    //     $perumahan->fasilitas_sosial = $request->input('fasilitas_sosial');
    //     $perumahan->pendidikan = $request->input('pendidikan');
    //     $perumahan->kesehatan = $request->input('kesehatan');
    //     $perumahan->pemakaman = $request->input('pemakaman');
    //     $perumahan->parkir = $request->input('parkir');

    //     // Update field Utilitas
    //     $perumahan->jaringan_penerangan = $request->input('jaringan_penerangan');
    //     $perumahan->jaringan_air_bersih = $request->input('jaringan_air_bersih');
    //     $perumahan->jaringan_listrik = $request->input('jaringan_listrik');
    //     $perumahan->jaringan_telpon = $request->input('jaringan_telpom');
    //     $perumahan->jaringan_pemadam_kebakaran = $request->input('jaringan_pemadam_kebakaran');
    //     $perumahan->gas = $request->input('gas');
    //     $perumahan->transportasi = $request->input('transportasi');


    //     // Simpan perubahan ke database
    //     $perumahan->save();


    //     return redirect()->route('perumahan')->with('success', 'Data Perumahan berhasil diperbarui');
    // }

    public function delete($id)
    {
        $perumahan = Perumahan::findOrFail($id);

        $perumahan->delete();

        return redirect()->route('perumahan')->with('success', 'Data berhasil dihapus');
    }
}

