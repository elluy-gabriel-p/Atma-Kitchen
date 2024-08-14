<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan_baku;
use App\Models\Detail_resep;

class listBahanController extends Controller
{
    public function index()
    {
        $bahan_baku = Bahan_baku::where('stok_bahan', '<', 0)->get();
        return view('mo.listBahanBaku.listBahanBaku', compact('bahan_baku'));
    }
}
