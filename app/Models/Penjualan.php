<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';

    protected $fillable = [
        'tanggal_faktur',
        'nomor_faktur',
        'konsumen_id',
        'total',
    ];

    // Relasi ke Konsumen
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

}
