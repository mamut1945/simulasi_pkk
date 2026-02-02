<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('konsumen')
            ->latest()
            ->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $konsumens = Konsumen::all();
        return view('penjualan.create', compact('konsumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_faktur' => 'required|date',
            'nomor_faktur'   => 'required|string|max:100|unique:penjualans,nomor_faktur',
            'konsumen_id'    => 'required|exists:konsumens,id',
            'total'          => 'required|integer|min:0',
        ]);

        Penjualan::create($request->all());

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Penjualan berhasil ditambahkan');
    }

    public function edit(Penjualan $penjualan)
    {
        $konsumens = Konsumen::all();
        return view('penjualan.edit', compact('penjualan', 'konsumens'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal_faktur' => 'required|date',
            'nomor_faktur'   => 'required|string|max:100|unique:penjualans,nomor_faktur,' . $penjualan->id,
            'konsumen_id'    => 'required|exists:konsumens,id',
            'total'          => 'required|integer|min:0',
        ]);

        $penjualan->update($request->all());

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Penjualan berhasil diperbarui');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Penjualan berhasil dihapus');
    }
}
