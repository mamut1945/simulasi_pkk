@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl p-6
            shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-700">Data Konsumen</h2>

        <a href="{{ route('konsumen.create') }}"
           class="px-4 py-2 text-sm rounded-xl
                  bg-blue-600 text-white hover:bg-blue-700 transition">
            + Tambah Konsumen
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400 border-b">
                    <th class="pb-4 font-normal text-left">#</th>
                    <th class="pb-4 font-normal text-left">Nama</th>
                    <th class="pb-4 font-normal text-left">No HP</th>
                    <th class="pb-4 font-normal text-left">Alamat</th>
                    <th class="pb-4 font-normal text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($konsumens as $k)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 text-gray-500">{{ $k->id }}</td>
                    <td class="text-gray-700 font-medium">{{ $k->nama }}</td>
                    <td class="text-gray-500">{{ $k->no_hp }}</td>
                    <td class="text-gray-500">{{ $k->alamat }}</td>
                    <td class="py-4">
                        <div class="flex gap-2">
                            {{-- Edit --}}
                            <a href="{{ route('konsumen.edit', $k->id) }}"
                               class="px-3 py-1 text-xs rounded-lg
                                      bg-yellow-100 text-yellow-700
                                      hover:bg-yellow-200 transition">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('konsumen.destroy', $k->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin mau hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 text-xs rounded-lg
                                               bg-red-100 text-red-700
                                               hover:bg-red-200 transition">
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
