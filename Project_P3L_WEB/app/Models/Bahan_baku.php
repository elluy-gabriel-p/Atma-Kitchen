<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan_baku extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "bahan_baku";

    protected $primaryKey = 'id_bahan_baku';

    protected $fillable = [
        'nama_bahan',
        'satuan',
        'stok_bahan',
    ];
}
