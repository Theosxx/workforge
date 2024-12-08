<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipsController extends Controller
{
    public function index()
    {
        $tips = Tips::all();
        return view('tips.index', compact('tips'));
    }
    public function print()  {
        $tips = Tips::all();
        $pdf = PDF::loadView('tips.print', compact('tips'));
        return $pdf->download('tips.pdf');
    }
    public function create()
    {
        return view('tips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tips_loker' => 'required|string',
            'done_work' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('tips', 'public');
            $validated['foto'] = $path;
        }

        Tips::create($validated);
        return redirect()->route('tips.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Tips $tip)
    {
        return view('tips.edit', compact('tip'));
    }

    public function update(Request $request, Tips $tip)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tips_loker' => 'required|string',
            'done_work' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($tip->foto) {
                Storage::disk('public')->delete($tip->foto);
            }
            $path = $request->file('foto')->store('tips', 'public');
            $validated['foto'] = $path;
        }

        $tip->update($validated);
        return redirect()->route('tips.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Tips $tip)
    {
        if ($tip->foto) {
            Storage::disk('public')->delete($tip->foto);
        }

        $tip->delete();
        return redirect()->route('tips.index')->with('success', 'Data berhasil dihapus.');
    }
}
