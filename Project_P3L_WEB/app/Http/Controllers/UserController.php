<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Exception;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\Detil_pesanan;

class UserController extends Controller
{
    use HasFactory;

    public function adminindex()
    {

        $pesanan = Pesanan::join('users', 'users.id', '=', 'pesanan.id_customer')
            ->select('users.*', 'pesanan.*')
            ->get();





        return view('admin.dataCustomer.index', compact('pesanan'));
    }

    // public function create()
    // {
    //     return view('admin.user.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'password' => 'required',
    //         'email' => 'required',
    //         'saldo' => 'required',
    //         'verify_key' => 'required'
    //     ]);

    //     try {
    //         User::create($request->all());
    //         return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan');
    //     } catch (Exception $e) {
    //         return redirect()->route('user.index')->with('error', 'Data gagal ditambahkan');
    //     }
    // }

    public function adminsearch($tekscari)
    {
        $user = User::where('name', 'like', "%$tekscari%")->get();
        return view('admin.user.index', compact('user'));
    }




    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'password' => 'required',
    //         'email' => 'required',
    //         'saldo' => 'required',
    //         'verify_key' => 'required'
    //     ]);

    //     try {
    //         User::find($id)->update($request->all());
    //         return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    //     } catch (Exception $e) {
    //         return redirect()->route('user.index')->with('error', 'Data gagal diubah');
    //     }
    // }

    // public function destroy($id)
    // {
    //     try {
    //         User::find($id)->delete();
    //         return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    //     } catch (Exception $e) {
    //         return redirect()->route('user.index')->with('error', 'Data gagal dihapus');
    //     }
    // }

    public function userProfile()
    {
        $user = auth()->user();
        return view('userProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect()->route('user.userProfile')->with('success', 'Data berhasil diubah');
    }

    public function historypesanan($id)
    {

        $pesanan = Detil_pesanan::join('produk', 'produk.id_produk', '=', 'detil_pesanan.id_produk')
            ->join('pesanan', 'pesanan.id_pesanan', '=', 'detil_pesanan.id_pesanan')
            ->select('produk.*', 'detil_pesanan.*', 'pesanan.*')
            ->where('pesanan.id_customer', $id)
            ->get();


        return view('historyPemesananUser', compact('pesanan'));
    }

    public function daftarpesanancust($id)
    {

        $pesanan = Detil_pesanan::join('produk', 'produk.id_produk', '=', 'detil_pesanan.id_produk')
            ->join('pesanan', 'pesanan.id_pesanan', '=', 'detil_pesanan.id_pesanan')
            ->select('produk.*', 'detil_pesanan.*', 'pesanan.*')
            ->where('pesanan.id_customer', $id)
            ->where('pesanan.status', 'belum dibayar')
            ->get();


        return view('customer.pembayaran.index', compact('pesanan'));
    }


    public function uploadPage($id)
    {
        $pesanan = Pesanan::find($id);
        return view('customer.pembayaran.buktiUpload', compact('pesanan'));
    }

    public function uploadBukti(Request $request, $id_pesanan)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pesanan = Pesanan::find($id_pesanan);
        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        $file = $request->file('bukti_pembayaran');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/bukti_pembayaran'), $filename);

        $pesanan->bukti_pembayaran = $filename;
        $pesanan->status = "sudah dibayar";
        $pesanan->save();

        return redirect()->route('user.userProfile')->with('success', 'Bukti pembayaran berhasil diupload.');
    }


}
