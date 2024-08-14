<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Penggunaan_bahan_baku;

class PenggunaanBahanBakuController extends Controller
{
    public function index()
    {
        $penggunaan_bahan_baku = Penggunaan_bahan_baku::all();
        return view('penggunaan_bahan_baku.index', compact('penggunaan_bahan_baku'));
    }

    public function create()
    {
        return view('penggunaan_bahan_baku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bahan_baku' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        try {
            Penggunaan_bahan_baku::create($request->all());
            return redirect()->route('penggunaan_bahan_baku.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('penggunaan_bahan_baku.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $penggunaan_bahan_baku = Penggunaan_bahan_baku::find($id);
        return view('penggunaan_bahan_baku.edit', compact('penggunaan_bahan_baku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_bahan_baku' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        try {
            Penggunaan_bahan_baku::find($id)->update($request->all());
            return redirect()->route('penggunaan_bahan_baku.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('penggunaan_bahan_baku.index')->with('error', 'Data gagal diubah');
        }
    }

    public function delete($id)
    {
        try {
            Penggunaan_bahan_baku::find($id)->delete();
            return redirect()->route('penggunaan_bahan_baku.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('penggunaan_bahan_baku.index')->with('error', 'Data gagal dihapus');
        }
    }
}
