<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Penitip;

class PenitipController extends Controller
{
    
    public function index()
    {
        $penitip = Penitip::all();
        return view('mo.penitip.index', compact('penitip'));
    }

    public function create()
    {
        return view('mo.penitip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penitip' => 'required'
        ]);

        try {
            Penitip::create($request->all());
            return redirect()->route('penitip.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('penitip.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $penitip = Penitip::find($id);
        return view('mo.penitip.edit', compact('penitip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penitip' => 'required',
        ]);

        try {
            Penitip::find($id)->update($request->all());
            return redirect()->route('penitip.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('penitip.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            Penitip::find($id)->delete();
            return redirect()->route('penitip.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('penitip.index')->with('error', 'Data gagal dihapus');
        }
    }

}
