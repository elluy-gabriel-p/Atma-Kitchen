<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detil_poin extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'detil_poin';

    protected $fillable = [
        'no_nota',
        'id_promo',
        'jumlah_poin',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo_poin::class, 'id_promo');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'no_nota');
    }
}
