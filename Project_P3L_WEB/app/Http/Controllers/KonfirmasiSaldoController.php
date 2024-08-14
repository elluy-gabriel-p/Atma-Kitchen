<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\User;

class KonfirmasiSaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::join('users', 'users.id', '=', 'saldo.id_customer')
            ->where('statusPenarikan', 'belum dikonfirmasi')
            ->get();

        return view('admin.konfirmasiSaldo.index', compact('saldo'));
    }

    public function update($id)
    {
        $saldo = Saldo::find($id);
        return view('admin.konfirmasiSaldo.update', compact('saldo'));
    }

    public function updateStatus($id)
    {
        $saldo = Saldo::findOrFail($id);
        $saldo->statusPenarikan = 'Diterima';
        $saldo->save();

        $user = User::find($saldo->id_customer);
        $user->saldo -= $saldo->saldoKembali;
        $user->save();

        return redirect()->route('saldo.index', $id)->with('success', 'Saldo Diterima.');
    }

    public function updateStatusN($id)
    {
        $saldo = Saldo::findOrFail($id);
        $saldo->statusPenarikan = 'Ditolak';
        $saldo->save();

        return redirect()->route('saldo.index', $id)->with('danger', 'Saldo Ditolak.');
    }
}
