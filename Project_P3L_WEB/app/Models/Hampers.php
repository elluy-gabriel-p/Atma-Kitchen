<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hampers extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "hampers";

    protected $primaryKey = 'id_hampers';

    protected $fillable = [
        'nama_hampers',
        'harga_hampers',
        'deskripsi_hampers',
        'tgl_mulai_promo',
        'tgl_akhir_promo',
    ];
}
