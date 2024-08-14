<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        
        try {
            
            $Presensi = Presensi::join('presensi', 'presensi.id_karyawan', '=', 'karyawan.id_karyawan')
                                ->select('presensi.*', 'karyawan.id_karyawan', 'karyawan.nama_karyawan')
                                ->get();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil Data',
                "data" => $Presensi
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
            $Presensi = Presensi::create($request->all());
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Insert Data',
                "data" => $Presensi
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
            $Presensi = Presensi::find($id);

            if (!$Presensi) throw new \Exception("Barang tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Ambil Data',
                "data" => $Presensi
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
            $Presensi = Presensi::find($id);

            if (!$Presensi) throw new \Exception("Barang tidak ditemukan");

            $Presensi->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Update Data',
                "data" => $Presensi
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
