<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Resep;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        return view('admin.resep.index', compact('resep'));
    }

    public function create()
    {
        return view('admin.resep.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_resep' => 'required',
            'kuota_harian' => 'required',
        ]);

        try {
            Resep::create($request->all());
            return redirect()->route('resep.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('resep.index')->with('error', 'Data gagal ditambahkan');
        }
    }
    public function edit($id)
    {
        $resep = Resep::find($id);
        return view('admin.resep.edit', compact('resep'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_resep' => 'required',
            'kuota_harian' => 'required',
        ]);

        try {
            Resep::find($id)->update($request->all());
            return redirect()->route('resep.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('resep.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            Resep::find($id)->delete();
            return redirect()->route('resep.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('resep.index')->with('error', 'Data gagal dihapus');
        }
    }
}
