<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo_poin extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelipatan',
        'besar_poin',
    ];
}
