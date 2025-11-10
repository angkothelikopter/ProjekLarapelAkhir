<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaboratoryController extends Controller
{
    /**
     * Tampilkan daftar semua laboratorium
     */
    public function index()
    {
        $labs = Laboratory::latest()->paginate(10);
        return view('laboratories.index', compact('labs'));
    }

    /**
     * Tampilkan form tambah laboratorium baru
     */
    public function create()
    {
        return view('laboratories.create');
    }

    /**
     * Simpan laboratorium baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lab' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'required|string|max:100',
            'foto_penanggung_jawab' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada foto diupload
        if ($request->hasFile('foto_penanggung_jawab')) {
            $validated['foto_penanggung_jawab'] = $request->file('foto_penanggung_jawab')->store('penanggung_jawab', 'public');
        }

        Laboratory::create($validated);

        return redirect()->route('laboratories.index')
                         ->with('success', 'Laboratorium berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit laboratorium
     */
    public function edit(Laboratory $laboratory)
    {
        return view('laboratories.edit', compact('laboratory'));
    }

    /**
     * Update data laboratorium
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $validated = $request->validate([
            'nama_lab' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'required|string|max:100',
            'foto_penanggung_jawab' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada file baru diupload
        if ($request->hasFile('foto_penanggung_jawab')) {
            // Hapus foto lama jika ada
            if ($laboratory->foto_penanggung_jawab && Storage::disk('public')->exists($laboratory->foto_penanggung_jawab)) {
                Storage::disk('public')->delete($laboratory->foto_penanggung_jawab);
            }

            $validated['foto_penanggung_jawab'] = $request->file('foto_penanggung_jawab')->store('penanggung_jawab', 'public');
        }

        $laboratory->update($validated);

        return redirect()->route('laboratories.index')
                         ->with('success', 'Laboratorium berhasil diperbarui.');
    }

    /**
     * Hapus laboratorium
     */
    public function destroy(Laboratory $laboratory)
    {
        // Hapus foto dari storage
        if ($laboratory->foto_penanggung_jawab && Storage::disk('public')->exists($laboratory->foto_penanggung_jawab)) {
            Storage::disk('public')->delete($laboratory->foto_penanggung_jawab);
        }

        $laboratory->delete();

        return redirect()->route('laboratories.index')
                         ->with('success', 'Laboratorium berhasil dihapus.');
    }
}
