<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Pesanan;
use App\Models\Detil_pesanan;
use App\Models\Detil_poin;
use App\Models\User;
use App\Models\Hampers;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('notaPage', compact('pesanan'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        $detilPesanan = Detil_pesanan::where('id_pesanan', $id)->get();
        $detilPoin = Detil_poin::where('id_pesanan', $id)->get();
        return view('notaPage', compact('pesanan', 'detilPesanan', 'detilPoin'));
    }

    public function pesanProduk($id)
    {
        $produk = Produk::all();
        $hampers = Hampers::all();
        $pesanan = Pesanan::find($id);
        $detilPesanan = Detil_pesanan::where('id_pesanan', $id)->get();

        return view('pesanProdukPage', compact('produk', 'hampers', 'pesanan', 'detilPesanan'));
    }

    public function create()
    {
        $user = User::all();
        return view('pesananPage', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'tanggal_ambil' => 'required',
            'jenis_delivery' => 'required',
            'poin_digunakan' => 'required|integer|min:0',
        ]);

        $user = Auth::user();
        $userPoints = $user->poin;

        if ($request->poin_digunakan > $userPoints) {
            return redirect()->back()->with('error', 'Poin yang digunakan melebihi poin yang Anda miliki.');
        }

        DB::beginTransaction();

        try {
            $pesanan = Pesanan::create([
                'id_customer' => Auth::id(),
                'status' => 'Panding',
                'tanggal_pesan' => now(),
                'alamat' => $request->alamat,
                'tanggal_ambil' => $request->tanggal_ambil,
                'jenis_delivery' => $request->jenis_delivery,
                'poin_digunakan' => $request->poin_digunakan,
            ]);

            $pesanan->no_nota = date('Y.m') . '.' . $pesanan->id_pesanan;
            $pesanan->save();

            foreach (session('cart') as $id => $details) {
                Detil_pesanan::create([
                    'id_pesanan' => $pesanan->id_pesanan,
                    'id_produk' => $id,
                    'kuantitas' => $details['quantity'],
                    'harga_produk' => $details['harga'],
                    'subtotal' => $details['quantity'] * $details['harga'],
                ]);
            }

            $this->calculatePoints($pesanan->id_pesanan);
            $this->handleProductStock(session('cart'));

            // Clear the session cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('home')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('error', 'Data gagal ditambahkan');
        }
    }


    private function handleProductStock($cart)
    {
        foreach ($cart as $id => $details) {
            $produk = Produk::find($id);
            $quantityNeeded = $details['quantity'];

            if ($produk->jumlah_stok >= $quantityNeeded) {
                $produk->jumlah_stok -= $quantityNeeded;
            } else {
                $quantityNeeded -= $produk->jumlah_stok;
                $produk->jumlah_stok = 0;
                $produk->kuota -= $quantityNeeded;
            }

            $produk->save();
        }
    }

    public function calculatePoints($id)
    {
        $pesanan = Pesanan::find($id);
        $user = User::find($pesanan->id_customer);
        $detilPesanan = Detil_pesanan::where('id_pesanan', $id)->get();

        $totalHarga = $detilPesanan->sum('subtotal');
        $customerBirthday = $user->ulang_tahun;
        $points = $this->calculateBasePoints($totalHarga);

        if ($this->isCustomerBirthday($customerBirthday, $pesanan->tanggal_pesan)) {
            $points *= 2;
        }

        $user->poin -= $pesanan->poin_digunakan;
        $user->poin += $points;
        $user->save();

        try {
            $pesanan->poin_didapat = $points;
            $pesanan->save();

            return redirect()->route('pesanan.show', $pesanan->id_pesanan)->with('success', 'Poin berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('pesanan.pesanProduk', $pesanan->id_pesanan)->with('error', 'Poin gagal ditambahkan');
        }
    }

    private function calculateBasePoints($totalHarga)
    {
        $points = 0;
        if ($totalHarga >= 1000000) {
            $points += floor($totalHarga / 1000000) * 200;
            $totalHarga %= 1000000;
        }
        if ($totalHarga >= 500000) {
            $points += floor($totalHarga / 500000) * 75;
            $totalHarga %= 500000;
        }
        if ($totalHarga >= 100000) {
            $points += floor($totalHarga / 100000) * 15;
            $totalHarga %= 100000;
        }
        if ($totalHarga >= 10000) {
            $points += floor($totalHarga / 10000);
            $totalHarga %= 10000;
        }
        return $points;
    }

    private function isCustomerBirthday($customerBirthday, $pesananDate)
    {
        $customerBirthday = new \DateTime($customerBirthday);
        $pesananDate = new \DateTime($pesananDate);
        $diff = $customerBirthday->diff($pesananDate)->days;

        return abs($diff) <= 3;
    }

    public function toInputJarakIndex()
    {
        $pesanan = Pesanan::join('customer', 'pesanan.id_customer', '=', 'customer.id_customer')
            ->select('pesanan.*', 'customer.nama_customer')
            ->where('pesanan.status', 'menunggu konfirmasi')
            ->where('pesanan.jarak', 0)
            ->where('pesanan.jenis_delivery', 'Antar')
            ->get();

        return view('admin.inputJarakPesanan.index', compact('pesanan'));
    }

    public function editjarak($id)
    {
        $pesanan = Pesanan::find($id);
        return view('admin.inputJarakPesanan.edit', compact('pesanan'));
    }

    public function updateJarak($id, Request $request)
    {
        $request->validate([
            'jarak' => 'required'
        ]);

        try {
            $pesanan = Pesanan::find($id);
            $pesanan->jarak = $request->jarak;

            $this->calculateOngkir($pesanan);

            $pesanan->save();

            return redirect()->route('inputJarakPesanan.index')->with('success', ['Biaya Pesanan' => $pesanan->total_biaya, 'Ongkir' => $pesanan->ongkir]);
        } catch (Exception $e) {
            return redirect()->route('inputJarakPesanan.index')->with('error', 'Data gagal diubah');
        }
    }

    private function calculateOngkir($pesanan)
    {
        if ($pesanan->jarak <= 5) {
            $pesanan->total_biaya += 10000;
            $pesanan->ongkir = 10000;
        } elseif ($pesanan->jarak > 5 && $pesanan->jarak <= 10) {
            $pesanan->total_biaya += 15000;
            $pesanan->ongkir = 15000;
        } elseif ($pesanan->jarak > 10 && $pesanan->jarak <= 15) {
            $pesanan->total_biaya += 20000;
            $pesanan->ongkir = 20000;
        } else {
            $pesanan->total_biaya += 25000;
            $pesanan->ongkir = 25000;
        }
    }

    // public function edit($id)
    // {
    //     $pesanan = Pesanan::find($id);
    //     return view('pesanan.edit', compact('pesanan'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'id_hampers' => 'required',
    //         'id_customer' => 'required',
    //         'id_penitip' => 'required',
    //         'id_alamat' => 'required',
    //         'jumlah' => 'required',
    //         'total_harga' => 'required',
    //         'status' => 'required',
    //     ]);

    //     try {
    //         Pesanan::find($id)->update($request->all());
    //         return redirect()->route('notaPage')->with('success', 'Data berhasil diubah');
    //     } catch (Exception $e) {
    //         return redirect()->route('notaPage')->with('error', 'Data gagal diubah');
    //     }
    // }

    // public function destroy($id)
    // {
    //     try {
    //         Pesanan::find($id)->delete();
    //         return redirect()->route('notaPage')->with('success', 'Data berhasil dihapus');
    //     } catch (Exception $e) {
    //         return redirect()->route('notaPage')->with('error', 'Data gagal dihapus');
    //     }
    // }

}
