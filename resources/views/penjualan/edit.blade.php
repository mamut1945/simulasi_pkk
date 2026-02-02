@extends('layouts.app')

@section('content')
<div class="max-w-2xl">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-800">Edit Penjualan</h1>
        <p class="text-sm text-gray-400">Perbarui data faktur</p>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl p-8 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
        <form action="{{ route('penjualan.update', $penjualan) }}"
              method="POST"
              class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm text-gray-500">Tanggal Faktur</label>
                <input type="date" name="tanggal_faktur"
                       value="{{ old('tanggal_faktur', $penjualan->tanggal_faktur) }}"
                       class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
            </div>

            <div>
                <label class="text-sm text-gray-500">Nomor Faktur</label>
                <input type="text" name="nomor_faktur"
                       value="{{ old('nomor_faktur', $penjualan->nomor_faktur) }}"
                       class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
            </div>

            <div>
                <label class="text-sm text-gray-500">Konsumen</label>
                <select name="konsumen_id"
                        class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
                    @foreach ($konsumens as $k)
                        <option value="{{ $k->id }}"
                            @selected(old('konsumen_id', $penjualan->konsumen_id) == $k->id)>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-500">Total</label>
                <input type="number" name="total"
                       value="{{ old('total', $penjualan->total) }}"
                       class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('penjualan.index') }}"
                   class="px-6 py-3 text-sm text-gray-600 hover:bg-gray-100 rounded-xl">
                    Batal
                </a>

                <button
                    class="px-6 py-3 text-sm text-white rounded-xl
                           bg-teal-600 hover:bg-teal-700">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
