@extends('layouts.app')

@section('content')
<div class="max-w-2xl">

    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-800">Tambah Barang</h1>
        <p class="text-sm text-gray-400">Input data barang baru</p>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
        <form action="{{ route('master-barang.store') }}" method="POST" class="space-y-6">
            @csrf

            @include('master-barang.partials.form')

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('master-barang.index') }}" class="text-gray-500">Batal</a>
                <button class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
