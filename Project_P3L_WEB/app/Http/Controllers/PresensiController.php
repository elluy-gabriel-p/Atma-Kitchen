<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::all();
        return view('presensi.indeks', compact('presensi'));
    }

    public function create()
    {
        return view('presensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        try {
            Presensi::create($request->all());
            return redirect()->route('presensi.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('presensi.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $presensi = Presensi::find($id);
        return view('presensi.edit', compact('presensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        try {
            Presensi::find($id)->update($request->all());
            return redirect()->route('presensi.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('presensi.index')->with('error', 'Data gagal diubah');
        }
    }

    public function delete($id)
    {
        try {
            Presensi::find($id)->delete();
            return redirect()->route('presensi.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('presensi.index')->with('error', 'Data gagal dihapus');
        }
    }


}
