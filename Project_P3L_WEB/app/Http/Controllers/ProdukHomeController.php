<?php

namespace App\Http\Controllers;

use App\Models\Hampers;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukHomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $hampers = Hampers::all();

        return view('produkPage', compact('produk', 'hampers'));
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        return view('detailProdukPage', compact('produk'));
    }

    public function edit($id)
    {
        $hampers = Hampers::find($id);
        $produk = Produk::all();

        return view('detailProdukPage', compact('hampers', 'produk'));
    }
}
