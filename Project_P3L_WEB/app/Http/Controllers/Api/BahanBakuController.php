<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bahan_baku;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $bahanBaku = Bahan_baku::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $bahanBaku
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $bahanBaku = Bahan_baku::create($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $bahanBaku
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $bahanBaku = Bahan_baku::find($id);

            if (!$bahanBaku) throw new \Exception("Bahan baku tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $bahanBaku
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $bahanBaku = Bahan_baku::find($id);

            if (!$bahanBaku) throw new \Exception("Bahan baku tidak ditemukan");

            $bahanBaku->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $bahanBaku
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $bahanBaku = Bahan_baku::find($id);

            if (!$bahanBaku) throw new \Exception("Bahan baku tidak ditemukan");

            $bahanBaku->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $bahanBaku
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }
}
