@php
    $barang = $barang ?? null;
@endphp

<div>
    <label class="text-sm text-gray-500">Nama Barang</label>
    <input type="text" name="nama_barang"
           value="{{ old('nama_barang', $barang->nama_barang ?? '') }}"
           class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-gray-500">Harga Beli</label>
        <input type="number" name="harga_beli"
               value="{{ old('harga_beli', $barang->harga_beli ?? '') }}"
               class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
    </div>

    <div>
        <label class="text-sm text-gray-500">Harga Jual</label>
        <input type="number" name="harga_jual"
               value="{{ old('harga_jual', $barang->harga_jual ?? '') }}"
               class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
    </div>
</div>

<div>
    <label class="block text-sm text-gray-500 mb-2">
        Satuan
    </label>

    <select name="satuan"
            class="w-full px-4 py-3 rounded-xl
                   bg-gray-50 border border-gray-200
                   focus:ring-2 focus:ring-teal-200">

        <option value="">-- Pilih Satuan --</option>

        @php
            $satuans = ['pcs', 'box', 'pack', 'lusin', 'kg', 'gram', 'liter', 'meter'];
        @endphp

        @foreach ($satuans as $satuan)
            <option value="{{ $satuan }}"
                {{ old('satuan', $master_barang->satuan ?? '') == $satuan ? 'selected' : '' }}>
                {{ strtoupper($satuan) }}
            </option>
        @endforeach
    </select>

    @error('satuan')
        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
    @enderror
</div>


<div>
    <label class="text-sm text-gray-500">Kategori</label>
    <select name="kategori_id"
            class="w-full mt-2 px-4 py-3 rounded-xl border bg-gray-50">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategoris as $k)
            <option value="{{ $k->id }}"
                @selected(old('kategori_id', $barang->kategori_id ?? '') == $k->id)>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
</div>
