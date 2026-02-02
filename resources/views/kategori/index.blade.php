@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl p-6
            shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-base font-medium text-gray-800">
            Data Kategori
        </h2>

        <a href="{{ route('kategori.create') }}"
           class="px-4 py-2 rounded-xl text-sm text-white
                  bg-teal-600 hover:bg-teal-700">
            + Tambah
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-gray-400">
                    <th class="pb-4 font-normal text-left">#</th>
                    <th class="pb-4 font-normal text-left">Nama</th>
                    <th class="pb-4 font-normal text-right">Action</th>
                </tr>
            </thead>

            <tbody class="">
                @foreach ($kategoris as $k)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 text-gray-500">{{ $k->id }}</td>
                    <td class="text-gray-700">{{ $k->nama }}</td>
                    <td class="py-4 text-right">
                        <div class="flex justify-end gap-3">
                            {{-- Edit --}}
                            <a href="{{ route('kategori.edit', $k->id) }}"
                               class="text-sm text-teal-600 hover:underline">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('kategori.destroy', $k->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="text-sm text-red-500 hover:underline">
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
