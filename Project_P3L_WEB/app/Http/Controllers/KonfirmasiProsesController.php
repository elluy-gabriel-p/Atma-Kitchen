<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Bahan_baku;
use App\Models\Detail_resep;
use App\Models\Detil_pesanan;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Penggunaan_bahan_baku;

class KonfirmasiProsesController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $twoDaysAfterToday = $today->copy()->addDays(2);

        $pesanan = Pesanan::where('status', 'Pesanan Diterima')
            ->whereBetween('tanggal_ambil', [$today, $twoDaysAfterToday])
            ->get();

        $details = Detil_pesanan::whereIn('id_pesanan', $pesanan->pluck('id_pesanan'))->get();

        return view('mo.konfirmasiProses.index', compact('pesanan', 'details'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return redirect()->route('konfirmasiProses.index')->with('error', 'Pesanan tidak ditemukan');
        }

        $details = Detil_pesanan::where('id_pesanan', $id)->get();
        if ($details->isEmpty()) {
            return redirect()->route('konfirmasiProses.index')->with('error', 'Detail pesanan tidak ditemukan');
        }

        $pemakaianBahan = $this->calculatePemakaianBahan($details);
        return view('mo.konfirmasiProses.pemakaianBahan', compact('pesanan', 'details', 'pemakaianBahan'));
    }

    private function calculatePemakaianBahan($details)
    {
        $pemakaianBahan = [];

        foreach ($details as $detail) {
            $recipe = Detail_resep::where('id_resep', $detail->produk->id_resep)->get();

            foreach ($recipe as $ingredient) {
                $bahanBaku = Bahan_baku::find($ingredient->id_bahan_baku);
                $needed = $ingredient->takaran * $detail->kuantitas;

                if (isset($pemakaianBahan[$bahanBaku->nama_bahan])) {
                    $pemakaianBahan[$bahanBaku->nama_bahan]['jumlah'] += $needed;
                } else {
                    $pemakaianBahan[$bahanBaku->nama_bahan] = [
                        'nama_bahan' => $bahanBaku->nama_bahan,
                        'jumlah' => $needed,
                        'satuan' => $bahanBaku->satuan
                    ];
                }
            }
        }

        return $pemakaianBahan;
    }

    public function processOrder($orderId)
    {
        $details = Detil_pesanan::where('id_pesanan', $orderId)->get();
        if ($details->isEmpty()) {
            return redirect()->route('konfirmasiProses.index')->with('error', 'Detail pesanan tidak ditemukan');
        }

        $pemakaianBahan = $this->calculatePemakaianBahan($details);
        $isEnough = $this->checkBahanBaku($pemakaianBahan);

        if ($isEnough) {
            Pesanan::where('id_pesanan', $orderId)->update(['status' => 'Diproses']);
            $this->catatPemakaian($pemakaianBahan);
            $this->reduceStock($pemakaianBahan);
            return redirect()->route('konfirmasiProses.index')->with('success', 'Pesanan berhasil Diproses');
        } else {
            $bahanBakuTidakCukup = [];
            foreach ($pemakaianBahan as $bahan) {
                $bahanBaku = Bahan_baku::where('nama_bahan', $bahan['nama_bahan'])->first();
                if ($bahanBaku->stok_bahan < $bahan['jumlah']) {
                    $bahanBakuTidakCukup[] = $bahanBaku->nama_bahan;
                }
            }
            return redirect()->route('konfirmasiProses.index')->with('error', 'Bahan baku tidak cukup: ' . implode(', ', $bahanBakuTidakCukup));
        }
    }

    private function checkBahanBaku($pemakaianBahan)
    {
        foreach ($pemakaianBahan as $bahan) {
            $bahanBaku = Bahan_baku::where('nama_bahan', $bahan['nama_bahan'])->first();
            if ($bahanBaku->stok_bahan < $bahan['jumlah']) {
                return false;
            }
        }
        return true;
    }

    private function reduceStock($pemakaianBahan)
    {
        foreach ($pemakaianBahan as $bahan) {
            Bahan_baku::where('nama_bahan', $bahan['nama_bahan'])
                ->decrement('stok_bahan', $bahan['jumlah']);
        }
    }

    //Mencatat pemakaian bahan baku
    public function catatPemakaian($pemakaianBahan)
    {
        foreach ($pemakaianBahan as $bahan) {
            $id_bahan_baku = Bahan_baku::where('nama_bahan', $bahan['nama_bahan'])->first()->id_bahan_baku;
            $penggunaan = Penggunaan_bahan_baku::where('id_bahan_baku', $id_bahan_baku)
                ->where('tgl_pengeluaran', Carbon::today())
                ->first();
            if ($penggunaan) {
                // Jika catatan sudah ada, tambahkan kuantitas
                $penggunaan->kuantitas += $bahan['jumlah'];
                $penggunaan->save();
            } else {
                // Jika catatan tidak ada, buat catatan baru
                Penggunaan_bahan_baku::create([
                    'id_bahan_baku' => $id_bahan_baku,
                    'kuantitas' => $bahan['jumlah'],
                    'tgl_pengeluaran' => Carbon::today()
                ]);
            }
        }
    }
}
