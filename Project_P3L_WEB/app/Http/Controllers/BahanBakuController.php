<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Bahan_baku;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahan_baku = Bahan_baku::all();
        return view('admin.bahanBaku.index', compact('bahan_baku'));
    }

    public function create()
    {
        return view('admin.bahanBaku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'satuan' => 'required',
            'stok_bahan' => 'required'
        ]);

        try {
            Bahan_baku::create($request->all());
            return redirect()->route('bahan_baku.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('bahan_baku.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $bahan_baku = Bahan_baku::find($id);
        return view('admin.bahanBaku.edit', compact('bahan_baku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'satuan' => 'required',
            'stok_bahan' => 'required'
        ]);

        try {
            Bahan_baku::find($id)->update($request->all());
            return redirect()->route('bahan_baku.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('bahan_baku.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            Bahan_baku::find($id)->delete();
            return redirect()->route('bahan_baku.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('bahan_baku.index')->with('error', 'Data gagal dihapus');
        }
    }
}
