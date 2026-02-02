<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', KategoriController::class); 

Route::resource('konsumen', KonsumenController::class)
    ->parameters(['konsumen' => 'konsumen']);

Route::resource('master-barang', MasterBarangController::class)
    ->parameters(['master-barang' => 'master_barang']);

Route::resource('penjualan', PenjualanController::class)
    ->parameters(['penjualan' => 'penjualan']);


Route::get(
    'penjualan/{penjualan}/detail',
    [DetailPenjualanController::class, 'index']
)->name('penjualan.detail');

Route::post(
    'penjualan/{penjualan}/detail',
    [DetailPenjualanController::class, 'store']
)->name('penjualan.detail.store');

Route::delete(
    'detail-penjualan/{detail_penjualan}',
    [DetailPenjualanController::class, 'destroy']
)->name('detail-penjualan.destroy');
