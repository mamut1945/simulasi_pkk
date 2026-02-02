@extends('layouts.app')

@section('content')

<div class="max-w-xl">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-800">
            Edit Kategori
        </h1>
        <p class="text-sm text-gray-400 mt-1">
            Perbarui nama kategori
        </p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl p-8
                shadow-[0_20px_40px_rgba(0,0,0,0.04)]">

        <form action="{{ route('kategori.update', $kategori->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-sm text-gray-500 mb-2">
                    Nama Kategori
                </label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama', $kategori->nama) }}"
                       class="w-full px-4 py-3 rounded-xl
                              bg-gray-50 border border-gray-200
                              focus:outline-none focus:ring-2
                              focus:ring-teal-200 focus:border-teal-400">

                @error('nama')
                    <p class="text-sm text-red-500 mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('kategori.index') }}"
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
