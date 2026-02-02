<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumens = Konsumen::latest()->get();
        return view('konsumen.index', compact('konsumens'));
    }

    public function create()
    {
        return view('konsumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        Konsumen::create([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('konsumen.index')
            ->with('success', 'Konsumen berhasil ditambahkan');
    }

    public function edit(Konsumen $konsumen)
    {
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request, Konsumen $konsumen)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $konsumen->update([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('konsumen.index')
            ->with('success', 'Konsumen berhasil diperbarui');
    }

    public function destroy(Konsumen $konsumen)
    {
        $konsumen->delete();

        return redirect()
            ->route('konsumen.index')
            ->with('success', 'Konsumen berhasil dihapus');
    }
}
