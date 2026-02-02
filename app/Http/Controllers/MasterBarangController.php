<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function index()
    {
        $barangs = MasterBarang::with('kategori')->latest()->get();
        return view('master-barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('master-barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'  => 'required|string|max:255',
            'harga_jual'   => 'required|integer',
            'harga_beli'   => 'required|integer',
            'satuan'       => 'required|string|max:50',
            'kategori_id'  => 'required|exists:kategoris,id',
        ]);

        MasterBarang::create([
            'nama_barang' => $request->nama_barang,
            'harga_jual'  => $request->harga_jual,
            'harga_beli'  => $request->harga_beli,
            'satuan'      => $request->satuan,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()
            ->route('master-barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }


    public function edit(MasterBarang $master_barang)
    {
        $kategoris = Kategori::all();
        return view('master-barang.edit', compact('master_barang', 'kategoris'));
    }

    public function update(Request $request, MasterBarang $master_barang)
    {
        $request->validate([
            'nama_barang'  => 'required|string|max:255',
            'harga_jual'   => 'required|integer',
            'harga_beli'   => 'required|integer',
            'satuan'       => 'required|string|max:50',
            'kategori_id'  => 'required|exists:kategoris,id',
        ]);

        $master_barang->update([
            'nama_barang' => $request->nama_barang,
            'harga_jual'  => $request->harga_jual,
            'harga_beli'  => $request->harga_beli,
            'satuan'      => $request->satuan,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()
            ->route('master-barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }


    public function destroy(MasterBarang $master_barang)
    {
        $master_barang->delete();

        return redirect()
            ->route('master-barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
