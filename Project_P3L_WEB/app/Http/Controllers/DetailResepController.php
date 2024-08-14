<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Detail_resep;

class DetailResepController extends Controller
{
    public function index()
    {
        $detail_resep = Detail_resep::all();
        return view('detail_resep.index', compact('detail_resep'));
    }

    public function create()
    {
        return view('detail_resep.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_resep' => 'required',
            'id_bahan_baku' => 'required',
            'jumlah' => 'required',
        ]);

        try {
            Detail_resep::create($request->all());
            return redirect()->route('detail_resep.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('detail_resep.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $detail_resep = Detail_resep::find($id);
        return view('detail_resep.edit', compact('detail_resep'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_resep' => 'required',
            'id_bahan_baku' => 'required',
            'jumlah' => 'required',
        ]);

        try {
            Detail_resep::find($id)->update($request->all());
            return redirect()->route('detail_resep.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('detail_resep.index')->with('error', 'Data gagal diubah');
        }
    }

    public function delete($id)
    {
        try {
            Detail_resep::find($id)->delete();
            return redirect()->route('detail_resep.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('detail_resep.index')->with('error', 'Data gagal dihapus');
        }
    }
}
