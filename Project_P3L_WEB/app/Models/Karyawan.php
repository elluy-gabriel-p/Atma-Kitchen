<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    public $timestamps = false;

    protected $fillable = [
        'nama_karyawan',
        'password',
        'honor_harian',
        'bonus',
        'jabatan',
        'kehadiran'
    ];
}
