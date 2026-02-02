@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl p-6 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-700">Master Barang</h2>

        <a href="{{ route('master-barang.create') }}"
           class="px-4 py-2 text-sm rounded-xl bg-teal-600 text-white hover:bg-teal-700">
            + Tambah Barang
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400 border-b">
                    <th class="pb-4 text-left">#</th>
                    <th class="pb-4 text-left">Nama</th>
                    <th class="pb-4 text-left">Kode</th>
                    <th class="pb-4 text-left">Kategori</th>
                    <th class="pb-4 text-left">Harga Beli</th>
                    <th class="pb-4 text-left">Harga Jual</th>
                    <th class="pb-4 text-left">Satuan</th>
                    <th class="pb-4 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($barangs as $b)
                <tr class="hover:bg-gray-50">
                    <td class="py-4">{{ $b->id }}</td>
                    <td class="font-medium text-gray-700">{{ $b->nama_barang }}</td>
                    <td class="text-gray-500">{{ $b->kode_barang }}</td>
                    <td class="text-gray-500">{{ $b->kategori->nama }}</td>
                    <td class="text-gray-500">
                        Rp {{ number_format($b->harga_beli, 0, ',', '.') }}
                    </td>
                    <td class="text-gray-500">
                        Rp {{ number_format($b->harga_jual, 0, ',', '.') }}
                    </td>
                    <td class="text-gray-500">{{ $b->satuan }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a href="{{ route('master-barang.edit', $b) }}"
                               class="px-3 py-1 text-xs rounded-lg bg-yellow-100 text-yellow-700">
                                Edit
                            </a>

                            <form action="{{ route('master-barang.destroy', $b) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 text-xs rounded-lg bg-red-100 text-red-700">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
