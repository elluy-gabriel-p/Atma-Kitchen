<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Detil_pesanan;
use App\Models\Resep;
use App\Models\DetilResep;
use App\Models\Bahan_baku;
use Exception;


class KonfirmasiController extends Controller
{
    public function index()
    {
        $pesanan = Detil_pesanan::join('produk', 'produk.id_produk', '=', 'detil_pesanan.id_produk')
            ->join('pesanan', 'pesanan.id_pesanan', '=', 'detil_pesanan.id_pesanan')
            ->where('status', 'sudah dibayar')
            ->get();
        
        return view('mo.konfirmasiPesanan.index', compact('pesanan'));
    }

    public function update($id)
    {
        $pesanan = Pesanan::find($id);
        return view('mo.konfirmasiPesanan.update', compact('pesanan'));
    }


    public function updateStatus($id)
    {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->status = 'Pesanan Diterima';
            $pesanan->save();

            $user = User::find($pesanan->id_customer);
            $user->poin += $pesanan->poin_didapat;
            $user->save();

            $bahanBaku = Bahan_baku::find($id);
            $bahanBaku->stok_bahan -= 50;
            $bahanBaku->save();

            return redirect()->route('terimaPesanan.index', $id)->with('success', 'Pesanan Diterima.');
    }
    public function updateStatusN($id)
    {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->status = 'Pesanan Ditolak';
            $pesanan->save();

            $user = User::find($pesanan->id_customer);
            $user->saldo += $pesanan->total_biaya;
            $user->save();

            $detilPesanan = Detil_pesanan::where('id_pesanan', $id)->get();
            foreach ($detilPesanan as $detil) {
                $produk = $detil->produk;
                $produk->jumlah_stok += $detil->kuantitas;
                $produk->save();
            }

            



            return redirect()->route('terimaPesanan.index', $id)->with('danger', 'Pesanan Ditolak.');
    }

}
