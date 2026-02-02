@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl p-6 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-700">Data Penjualan</h2>

        <a href="{{ route('penjualan.create') }}"
           class="px-4 py-2 text-sm rounded-xl bg-teal-600 text-white hover:bg-teal-700">
            + Tambah Penjualan
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400 border-b">
                    <th class="pb-4 text-left">#</th>
                    <th class="pb-4 text-left">Tanggal faktur</th>
                    <th class="pb-4 text-left">No Faktur</th>
                    <th class="pb-4 text-left">Konsumen</th>
                    <th class="pb-4 text-left">Total</th>
                    <th class="pb-4 text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($penjualans as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 text-gray-500">{{ $p->id }}</td>
                    <td class="text-gray-500">
                        {{ \Carbon\Carbon::parse($p->tanggal_faktur)->format('d/m/Y') }}
                    </td>
                    <td class="font-medium text-gray-700">{{ $p->nomor_faktur }}</td>
                    <td class="text-gray-500">{{ $p->konsumen->nama }}</td>
                    <td class="text-gray-500">
                        Rp {{ number_format($p->total, 0, ',', '.') }}
                    </td>
                    <td>
                        <div class="flex gap-2">
                            <a href="{{ route('penjualan.detail', $p) }}"
   class="px-3 py-1 text-xs rounded-lg bg-blue-100 text-blue-700">
   Detail
</a>

                            <a href="{{ route('penjualan.edit', $p) }}"
                               class="px-3 py-1 text-xs rounded-lg bg-yellow-100 text-yellow-700">
                                Edit
                            </a>

                            <form action="{{ route('penjualan.destroy', $p) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus data penjualan ini?')">
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
