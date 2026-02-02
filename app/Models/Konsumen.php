<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsumen extends Model
{
    use HasFactory;
    
    protected $table = 'konsumens';
    
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }

}
