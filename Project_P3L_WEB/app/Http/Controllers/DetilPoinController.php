<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Detil_poin;

class DetilPoinController extends Controller
{
    
    public function index()
    {
        $detil_poin = Detil_poin::all();
        return view('detil_poin.index', compact('detil_poin'));
    }

    public function create()
    {
        return view('detil_poin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_promo_poin' => 'required',
            'id_customer' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);

        try {
            Detil_poin::create($request->all());
            return redirect()->route('detil_poin.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('detil_poin.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $detil_poin = Detil_poin::find($id);
        return view('detil_poin.edit', compact('detil_poin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_promo_poin' => 'required',
            'id_customer' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);

        try {
            Detil_poin::find($id)->update($request->all());
            return redirect()->route('detil_poin.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('detil_poin.index')->with('error', 'Data gagal diubah');
        }
        
    }

}
