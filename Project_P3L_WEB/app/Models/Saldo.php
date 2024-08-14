<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    public $table = 'saldo';

    protected $primaryKey = 'id_saldo';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'saldoKembali',
        'nomorRekening',
        'statusPenarikan'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }
}
