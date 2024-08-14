<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        try {
            $user = User::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil Data',
                "data" => $user
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
            $user = User::create($request->all());
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Insert Data',
                "data" => $user
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
            $user = User::find($id);

            if (!$user) throw new \Exception("Barang tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Ambil Data',
                "data" => $user
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
            $user = User::find($id);

            if (!$user) throw new \Exception("Barang tidak ditemukan");

            $user->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil Update Data',
                "data" => $user
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
            $user = User::find($id);

            if (!$user) throw new \Exception("Barang tidak ditemukan");

            $user->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil delete Data',
                "data" => $user
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
            $userLogin = User::where('name', $authenticationData['username'])->first();
            if (!$userLogin || !password_verify($authenticationData['password'], $userLogin->password)) {
                throw new \Exception("Login Invalid");
            }
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Login',
                "data" => $userLogin
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
            $userChange = User::where('name', $authenticationData['username'])->first();
            if (!$userChange) throw new \Exception("User tidak ditemukan");
            $userChange->password = $request['password'];
            $userChange->save();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil Mengubah Password',
                "data" => $userChange
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
