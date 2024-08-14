<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Pembelian_bahan_baku;
use App\Models\Bahan_baku;
use Carbon\Carbon;

class PembelianBahanBakuController extends Controller
{

    public function index()
    {
        $pembelian_bahan_baku = Pembelian_bahan_baku::all();
        return view('mo.beliBahan.index', compact('pembelian_bahan_baku'));
    }

    public function create()
    {
        $bahan_baku = Bahan_baku::all();
        return view('mo.beliBahan.create', compact('bahan_baku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bahan_baku' => 'required',
            'harga_bahan_baku' => 'required',
            'kuantitas' => 'required',
            'tanggal_pengeluaran' => 'required'
        ]);

        try {
            $beli = Pembelian_bahan_baku::create($request->all());
            // Update product stok
            $beli = Bahan_baku::findOrFail($request->id_bahan_baku);
            $beli->stok_bahan += $request->kuantitas;
            $beli->save();
            return redirect()->route('beliBahan.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('beliBahan.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $pembelian_bahan_baku = Pembelian_bahan_baku::find($id);
        $bahan_baku = Bahan_baku::all();

        // Periksa apakah pembaharuan dilakukan pada tanggal yang sama dengan tanggal pengeluaran
        if (Carbon::parse($pembelian_bahan_baku->tanggal_pengeluaran)->format('Y-m-d') != now()->format('Y-m-d')) {
            return redirect()->route('beliBahan.index')->with('error', 'Data hanya dapat diubah pada saat tanggal pengeluaran');
        }

        return view('mo.beliBahan.edit', compact('pembelian_bahan_baku', 'bahan_baku'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data request
        $request->validate([
            'id_bahan_baku' => 'required',
            'harga_bahan_baku' => 'required',
            'kuantitas' => 'required',
        ]);

        try {
            // Temukan pembelian dengan id yang diberikan
            $pembelian = Pembelian_bahan_baku::find($id);

            // Hitung perbedaan kuantitas
            $oldQuantity = $pembelian->kuantitas;
            $newQuantity = $request->kuantitas;
            $quantityDifference = $newQuantity - $oldQuantity;

            // Perbarui pembelian
            $pembelian->update($request->all());

            // Sesuaikan stok_bahan di tabel produk
            $beli = Bahan_baku::find($pembelian->id_bahan_baku);
            $beli->stok_bahan += $quantityDifference;
            $beli->save();


            // Kembalikan ke halaman index dengan pesan sukses
            return redirect()->route('beliBahan.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            // Kembalikan ke halaman index dengan pesan error jika terjadi pengecualian
            return redirect()->route('beliBahan.index')->with('error', 'Data gagal diubah');
        }
    }


    public function destroy($id)
    {
        try {
            // Temukan pembelian dengan id yang diberikan
            $pembelian = Pembelian_bahan_baku::find($id);

            // Periksa apakah tanggal penghapusan sama dengan tanggal pengeluaran
            if (Carbon::parse($pembelian->tanggal_pengeluaran)->format('Y-m-d') != now()->format('Y-m-d')) {
                return redirect()->route('beliBahan.index')->with('error', 'Hanya bisa menghapus pada saat tanggal pengeluaran');
            }

            // Temukan produk yang terkait
            $beli = Bahan_baku::find($pembelian->id_bahan_baku);

            // Kurangi stok_bahan dengan kuantitas pembelian yang dihapus
            $beli->stok_bahan -= $pembelian->kuantitas;
            $beli->save();

            // Hapus catatan pembelian
            $pembelian->delete();

            // Kembalikan ke halaman index dengan pesan sukses
            return redirect()->route('beliBahan.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            // Kembalikan ke halaman index dengan pesan error jika terjadi pengecualian
            return redirect()->route('beliBahan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
