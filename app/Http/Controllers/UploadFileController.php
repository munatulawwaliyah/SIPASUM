<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function index() 
    {
        $files = File::all();
        return view('uploadfile', compact('files'));    
    }//

    public function create(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('file')->store('files', 'public');

        File::create([
            'nama_file' => $request->nama_file,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'File berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $file = File::findOrFail($id);
        $file->nama_file = $request->nama_file;

        if ($request->hasFile('file')) {
            // Delete the old file from storage
            if ($file->file_path) {
                Storage::disk('public')->delete($file->file_path);
            }
            // Store the new file
            $file->file_path = $request->file('file')->store('files', 'public');
        }

        $file->save();

        return redirect()->back()->with('success', 'File berhasil diupdate');
    }

    public function delete($id)
    {
        $file = File::findOrFail($id);

        // Delete the file from storage
        if ($file->file_path) {
            Storage::disk('public')->delete($file->file_path);
        }

        // Delete the file record from the database
        $file->delete();
        return redirect()->back()->with('success', 'File berhasil dihapus');
    }
}
