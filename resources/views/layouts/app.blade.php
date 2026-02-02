<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r">
        <div class="p-6 font-bold text-xl">
            Navigation
        </div>

        <nav class="px-6 space-y-4 text-sm">
            <a href="{{ route('kategori.index') }}" class="block text-gray-700 hover:text-teal-600">kategori</a>
            <a href="{{ route('konsumen.index') }}" class="block text-gray-700 hover:text-teal-600">konsumen</a>
            <a href="{{ route('master-barang.index') }}" class="block text-gray-700 hover:text-teal-600">master barang</a>
            <a href="{{ route('penjualan.index') }}" class="block text-gray-700 hover:text-teal-600">penjualan</a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1">
        {{-- Topbar --}}
        <div class="flex items-center justify-between px-8 py-4 bg-white border-b">
            <div></div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Cards</span>
                <span class="text-sm text-gray-600">Invoices</span>
                <div class="flex items-center gap-2">
                    <span class="text-sm">Hi, Sara</span>
                    <img src="https://i.pravatar.cc/40"
                        class="w-8 h-8 rounded-full" />
                </div>
            </div>
        </div>

        {{-- Page Content --}}
        <div class="p-8">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
