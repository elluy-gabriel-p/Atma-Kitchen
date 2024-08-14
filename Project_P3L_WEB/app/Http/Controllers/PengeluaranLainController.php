<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Pengeluaran_lain;

class PengeluaranLainController extends Controller
{
    public function index()
    {
        $pengeluaran_lain = Pengeluaran_lain::all();
        return view('mo.pengeluaranLain.index', compact('pengeluaran_lain'));
    }

    public function create()
    {
        return view('mo.pengeluaranLain.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_pengeluaran' => 'required',
            'jenis' => 'required',
            'tanggal_pengeluaran' => 'required',
        ]);

        try {
            Pengeluaran_lain::create($request->all());
            return redirect()->route('pengeluaran_lain.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('pengeluaran_lain.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $pengeluaran_lain = Pengeluaran_lain::find($id);
        return view('mo.pengeluaranLain.edit', compact('pengeluaran_lain'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'total_pengeluaran' => 'required',
            'jenis' => 'required',
            'tanggal_pengeluaran' => 'required',
        ]);

        try {
            Pengeluaran_lain::find($id)->update($request->all());
            return redirect()->route('pengeluaran_lain.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('pengeluaran_lain.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            Pengeluaran_lain::find($id)->delete();
            return redirect()->route('pengeluaran_lain.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('pengeluaran_lain.index')->with('error', 'Data gagal dihapus');
        }
    }
}
