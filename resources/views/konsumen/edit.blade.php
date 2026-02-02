@extends('layouts.app')

@section('content')

<div class="max-w-2xl">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-800">
            Edit Konsumen
        </h1>
        <p class="text-sm text-gray-400 mt-1">
            Perbarui data konsumen
        </p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl p-8
                shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

        <form action="{{ route('konsumen.update', $konsumen->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-sm text-gray-500 mb-2">
                    Nama Konsumen
                </label>
                <input type="text"
                       name="nama"
                       value="{{ old('nama', $konsumen->nama) }}"
                       class="w-full px-4 py-3 rounded-xl
                              bg-gray-50 border border-gray-200
                              focus:outline-none focus:ring-2
                              focus:ring-teal-200 focus:border-teal-400">
                @error('nama')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm text-gray-500 mb-2">
                    No. HP
                </label>
                <input type="text"
                       name="no_hp"
                       value="{{ old('no_hp', $konsumen->no_hp) }}"
                       class="w-full px-4 py-3 rounded-xl
                              bg-gray-50 border border-gray-200
                              focus:outline-none focus:ring-2
                              focus:ring-teal-200 focus:border-teal-400">
                @error('no_hp')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm text-gray-500 mb-2">
                    Alamat
                </label>
                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full px-4 py-3 rounded-xl
                           bg-gray-50 border border-gray-200
                           focus:outline-none focus:ring-2
                           focus:ring-teal-200 focus:border-teal-400">{{ old('alamat', $konsumen->alamat) }}</textarea>

                @error('alamat')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('konsumen.index') }}"
                   class="px-6 py-3 rounded-xl text-sm
                          text-gray-600 hover:bg-gray-100">
                    Batal
                </a>

                <button
                    class="px-6 py-3 rounded-xl text-sm text-white
                           bg-teal-600 hover:bg-teal-700
                           shadow-[0_10px_20px_rgba(13,148,136,0.3)]">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
