<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Detil_pesanan;
use App\Models\Produk;
use App\Models\Pesanan;


class DetilPesananController extends Controller
{

    public function index()
    {
        $detil_pesanan = Detil_pesanan::all();
        return view('admin.dataCustomer.index', compact('detil_pesanan'));
    }


    public function create()
    {
        return view('detil_pesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required',
            'id_produk' => 'required',
            'kuantitas' => 'required',
            'subtotal' => 'required',
        ]);

        try {
            Detil_pesanan::create($request->all());
            return redirect()->route('detil_pesanan.index')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('detil_pesanan.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $detil_pesanan = Detil_pesanan::find($id);
        return view('detil_pesanan.edit', compact('detil_pesanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pesanan' => 'required',
            'id_produk' => 'required',
            'kuantitas' => 'required',
            'subtotal' => 'required',
        ]);

        try {
            Detil_pesanan::find($id)->update($request->all());
            return redirect()->route('detil_pesanan.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('detil_pesanan.index')->with('error', 'Data gagal diubah');
        }
    }

    public function addProduktoCart($id)
    {
        $produk = Produk::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama_produk" => $produk->nama_produk,
                "quantity" => 1,
                "harga" => $produk->harga,
                "gambar_produk" => $produk->gambar_produk
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Produk added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk successfully deleted.');
        }
    }
}
