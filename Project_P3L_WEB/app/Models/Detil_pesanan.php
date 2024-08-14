<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detil_pesanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'detil_pesanan';
    protected $fillable = [
        'id_pesanan',
        'id_produk',
        'kuantitas',
        'subtotal',
        'harga_produk',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}
