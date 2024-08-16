<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class AdminBeritaController extends Controller
{
    public function index() 
    {
        $beritas = Berita::all();
        return view('adminberita', compact('beritas')); 
    }//

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $validatedData['gambar'] = $fileName;
        }

        // Simpan data ke database
        Berita::create($validatedData);

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Berita berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|date_format:H:i',
        ]);

        // Temukan data berita berdasarkan id
        $berita = Berita::findOrFail($id);

        // Handle file upload jika ada
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $validatedData['gambar'] = $fileName;
        } else {
            // Jika tidak ada gambar baru yang diunggah, tetap gunakan gambar lama
            $validatedData['gambar'] = $berita->gambar;
        }

        // Update data di database
        $berita->update(array_filter($validatedData));
        
        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Berita berhasil diperbarui.');
    }

    public function delete($id)
    {
        $berita = Berita::findOrFail($id);
        if (file_exists(public_path('uploads/' . $berita->gambar))) {
            unlink(public_path('uploads/' . $berita->gambar));
        }
        $berita->delete();

        return redirect()->route('adminberita')->with('success', 'Berita berhasil dihapus');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('adminberita', compact('beritas'));
    }

}
