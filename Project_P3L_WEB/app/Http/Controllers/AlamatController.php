<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Alamat;

class AlamatController extends Controller
{
    
    public function index()
    {
        $alamat = Alamat::all();
        return view('alamat.index', compact('alamat'));
    }

    public function create()
    {
        return view('alamat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        try {
            Alamat::create($request->all());
            return redirect()->route('alamat.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('alamat.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $alamat = Alamat::find($id);
        return view('alamat.edit', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        try {
            Alamat::find($id)->update($request->all());
            return redirect()->route('alamat.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('alamat,index')->with('error', 'Data gagal diubah');
        }
        
    }


}
