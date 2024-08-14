<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran_lain extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "pengeluaran_lain";
    protected $primaryKey = "id_pengeluaran";

    protected $fillable = [
        'total_pengeluaran',
        'jenis',
        'tanggal_pengeluaran'
    ];
}
