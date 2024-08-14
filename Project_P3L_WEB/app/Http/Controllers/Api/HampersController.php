<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hampers;

class HampersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $hampers = Hampers::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $hampers
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
            $hampers = Hampers::create($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $hampers
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
            $hampers = hampers::find($id);

            if (!$hampers) throw new \Exception("Hampers tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $hampers
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
            $hampers = hampers::find($id);

            if (!$hampers) throw new \Exception("Hampers tidak ditemukan");

            $hampers->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $hampers
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
            $hampers = Hampers::find($id);

            if (!$hampers) throw new \Exception("Hampers tidak ditemukan");

            $hampers->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $hampers
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
