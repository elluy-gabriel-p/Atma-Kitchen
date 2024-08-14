<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    public $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    public $timestamps = false;

    

    protected $fillable = [
        'id_karyawan',
        'tanggal_presensi',
        'status_presensi'
    ];


    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
