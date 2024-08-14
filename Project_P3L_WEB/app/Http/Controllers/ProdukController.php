<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Http\Request;
use Exception;
use App\Models\Produk;
use App\Models\Penitip;
use App\Models\Hampers;
use App\Models\Resep;


class ProdukController extends Controller
{

    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $hampers = Hampers::all();
        $resep = Resep::all();
        return view('admin.produk.create', compact('hampers', 'resep'));
    }

    public function createTitipan()
    {
        $penitip = Penitip::all();
        return view('admin.produk.createTitipan', compact('penitip'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'jumlah_stok' => 'required',
            'tipe_produk' => 'required',
            'gambar_produk' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:1920'
        ]);
        $image  = $request->file('gambar_produk');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        try {


            $produk = Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'jumlah_stok' => $request->jumlah_stok,
                'tipe_produk' => $request->tipe_produk,
                'porsi' => $request->porsi,
                'gambar_produk' => $result,
                'id_resep' => $request->id_resep,
                'id_hampers' => $request->id_hampers
            ]);
            return redirect()->route('produk.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $penitip = Penitip::all();
        $hampers = Hampers::all();
        $resep = Resep::all();
        return view('admin.produk.edit', compact('produk', 'penitip', 'hampers', 'resep'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'jumlah_stok' => 'required',
            'tipe_produk' => 'required'
        ]);

        try {
            $produk = Produk::find($id);
            $produk->update($request->all());

            if ($request->tipe_produk != 'Titipan') {
                $produk->resep->kuota_harian = $request->kuota_harian;
                $produk->resep->save();
            }

            return redirect()->route('produk.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            CloudinaryStorage::delete(Produk::find($id)->gambar_produk);
            Produk::find($id)->delete();
            return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data gagal dihapus');
        }
    }
}
