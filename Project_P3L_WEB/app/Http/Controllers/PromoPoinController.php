<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Promo_Poin;

class PromoPoinController extends Controller
{

    public function index()
    {
        $prom_poin = Promo_Poin::all();
        return view('prom_poin.index', compact('prom_poin'));
    }

    public function create()
    {
        return view('prom_poin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);

        try {
            Promo_Poin::create($request->all());
            return redirect()->route('prom_poin.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('prom_poin.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $prom_poin = Promo_Poin::find($id);
        return view('prom_poin.edit', compact('prom_poin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customer' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);

        try {
            Promo_Poin::find($id)->update($request->all());
            return redirect()->route('prom_poin.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('prom_poin.index')->with('error', 'Data gagal diubah');
        }
    }
}
