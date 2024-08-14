<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    public $table = 'resep';

    protected $primaryKey = 'id_resep';

    public $timestamps = false;

    protected $fillable = [
        'nama_resep',
        'kuota_harian',
    ];
}
