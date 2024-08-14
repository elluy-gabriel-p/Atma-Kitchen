<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        try {
            $karyawan = Karyawan::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil Data',
                "data" => $karyawan
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
            $karyawan = Karyawan::create($request->all());
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Insert Data',
                "data" => $karyawan
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
            $karyawan = Karyawan::find($id);

            if (!$karyawan) throw new \Exception("Barang tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Ambil Data',
                "data" => $karyawan
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
            $karyawan = Karyawan::find($id);

            if (!$karyawan) throw new \Exception("Barang tidak ditemukan");

            $karyawan->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Update Data',
                "data" => $karyawan
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
            $karyawan = Karyawan::find($id);

            if (!$karyawan) throw new \Exception("Barang tidak ditemukan");

            $karyawan->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil delete Data',
                "data" => $karyawan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function authenticate(Request $request)
    {
        try {
            $authenticationData = $request->only('username', 'password');
            $karyawanLogin = Karyawan::where('nama_karyawan', $authenticationData['username'])->where('password', $authenticationData['password'])->first();
            if (!$karyawanLogin) throw new \Exception("Login Invalid");
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Login',
                "data" => $karyawanLogin
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $authenticationData = $request->only('username', 'password');
            $karyawanChange = Karyawan::where('nama_karyawan', $authenticationData['username'])->first();
            if (!$karyawanChange) throw new \Exception("Karyawan tidak ditemukan");
            $karyawanChange->password = $request['password'];
            $karyawanChange->save();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Mengubah Password',
                "data" => $karyawanChange
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
