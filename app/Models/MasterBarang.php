<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'master_barangs';
    
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'harga_jual',
        'harga_beli',
        'satuan',
        'kategori_id',
    ];

    protected static function booted()
    {
        static::creating(function ($barang) {

            // Ambil kode terakhir
            $last = self::orderBy('id', 'desc')->first();

            $nextNumber = $last
                ? (int) substr($last->kode_barang, 4) + 1
                : 1;

            $barang->kode_barang = 'BRG-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

}

