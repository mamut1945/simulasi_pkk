@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Info Faktur --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-lg font-semibold">Detail Penjualan</h2>
        <p class="text-sm text-gray-500">
            Faktur: {{ $penjualan->nomor_faktur }} |
            Konsumen: {{ $penjualan->konsumen->nama }}
        </p>
    </div>

    {{-- Form Tambah Barang --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <form action="{{ route('penjualan.detail.store', $penjualan) }}"
              method="POST"
              class="flex gap-4">
            @csrf

            <select name="master_barang_id"
                    class="flex-1 px-4 py-2 border rounded-xl">
                <option value="">Pilih Barang</option>
                @foreach ($barangs as $b)
                    <option value="{{ $b->id }}">
                        {{ $b->nama_barang }} (Rp {{ number_format($b->harga_jual) }})
                    </option>
                @endforeach
            </select>

            <input type="number"
                   name="jumlah"
                   placeholder="Qty"
                   class="w-24 px-4 py-2 border rounded-xl">

            <button
                class="px-6 py-2 bg-teal-600 text-white rounded-xl">
                Tambah
            </button>
        </form>
    </div>

    {{-- Table Detail --}}



<div class="bg-white rounded-2xl p-6 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
        <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400 border-b border-gray-500">
                    <th class="pb-4 text-left">barang</th>
                    <th class="pb-4 text-left">qyt</th>
                    <th class="pb-4 text-left">harga</th>
                    <th class="pb-4 text-left">subtotal</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($details as $d)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-gray-500">{{ $d->barang->nama_barang }}</td>
                    <td class="text-gray-500">{{ $d->jumlah }}</td>
                    <td class="text-gray-500">Rp {{ number_format($d->harga_satuan) }}</td>
                    <td class="text-gray-500">Rp {{ number_format($d->subtotal) }}</td>
                    <td>
                        <form action="{{ route('detail-penjualan.destroy', $d) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                <div class="text-right mt-6 font-semibold">
            Total: Rp {{ number_format($penjualan->total) }}
        </div>
    </div>
</div>


</div>
@endsection
