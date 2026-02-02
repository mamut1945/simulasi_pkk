@extends('layouts.app')

@section('content')
<div class="max-w-2xl">

    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-800">Edit Barang</h1>
        <p class="text-sm text-gray-400">Perbarui data barang</p>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
        <form action="{{ route('master-barang.update', $master_barang) }}"
              method="POST"
              class="space-y-6">
            @csrf
            @method('PUT')

            @include('master-barang.partials.form', ['barang' => $master_barang])

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('master-barang.index') }}" class="text-gray-500">Batal</a>
                <button class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
