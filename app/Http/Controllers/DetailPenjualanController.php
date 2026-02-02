<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\MasterBarang;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index(Penjualan $penjualan)
    {
        $details = $penjualan->details()->with('barang')->get();
        $barangs = MasterBarang::all();

        return view('penjualan.detail', compact('penjualan', 'details', 'barangs'));
    }

    public function store(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'master_barang_id' => 'required|exists:master_barangs,id',
            'jumlah'           => 'required|integer|min:1',
        ]);

        $barang = MasterBarang::findOrFail($request->master_barang_id);

        $subtotal = $barang->harga_jual * $request->jumlah;

        DetailPenjualan::create([
            'penjualan_id'     => $penjualan->id,
            'master_barang_id' => $barang->id,
            'jumlah'           => $request->jumlah,
            'harga_satuan'     => $barang->harga_jual,
            'subtotal'         => $subtotal,
        ]);

        // update total penjualan
        $penjualan->update([
            'total' => $penjualan->details()->sum('subtotal'),
        ]);

        return back()->with('success', 'Barang berhasil ditambahkan');
    }

    public function destroy(DetailPenjualan $detail_penjualan)
    {
        $penjualan = $detail_penjualan->penjualan;

        $detail_penjualan->delete();

        $penjualan->update([
            'total' => $penjualan->details()->sum('subtotal'),
        ]);

        return back()->with('success', 'Barang berhasil dihapus');
    }
}
