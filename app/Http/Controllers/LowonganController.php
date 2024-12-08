<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        // dd($lowongans);
        
        return view('lowongan.index', compact('lowongans'));
    }

    public function print()  {
        $lowongans = Lowongan::all();
        $pdf = PDF::loadView('lowongan.print', compact('lowongans'));
        return $pdf->download('lowongan.pdf');
    }
    public function create()
    {
        return view('lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji_minimal' => 'required|integer|min:0',
            'gaji_maksimal' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipe_pekerjaan' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);
        $fotoPath = $request->file('foto')->store('lowongan-foto', 'public');
        
        Lowongan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'gaji_minimal' => $request->gaji_minimal,
            'gaji_maksimal' => $request->gaji_maksimal,
            'lokasi' => $request->lokasi,
            'foto' => $fotoPath,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(Lowongan $lowongan)
    {
        return view('lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji_minimal' => 'required|integer|min:0',
            'gaji_maksimal' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipe_pekerjaan' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            if ($lowongan->foto && Storage::disk('public')->exists($lowongan->foto)) {
                Storage::disk('public')->delete($lowongan->foto);
            }
            $fotoPath = $request->file('foto')->store('lowongan-foto', 'public');
            $lowongan->foto = $fotoPath;
        }

        $lowongan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'gaji_minimal' => $request->gaji_minimal,
            'gaji_maksimal' => $request->gaji_maksimal,
            'lokasi' => $request->lokasi,
            'foto' => $lowongan->foto,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->foto && Storage::disk('public')->exists($lowongan->foto)) {
            Storage::disk('public')->delete($lowongan->foto);
        }

        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
