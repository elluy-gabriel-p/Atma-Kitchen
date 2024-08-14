<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan_bahan_baku extends Model
{

    public $timestamps = false;

    public $table = 'penggunaan_bahan_baku';

    use HasFactory;

    protected $fillable = [
        'id_bahan_baku',
        'kuantitas',
        'tgl_pengeluaran'
    ];

    public function bahan_baku()
    {
        return $this->belongsTo(Bahan_baku::class, 'id_bahan_baku');
    }
}
