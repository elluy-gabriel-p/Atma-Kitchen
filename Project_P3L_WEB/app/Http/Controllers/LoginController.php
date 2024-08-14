<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Karyawan;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('loginPage');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->active) {
                return redirect('home');
            } else {
                Auth::logout();
                Session::flash('error', 'Akun Anda belum diverifikasi. Silakan cek email Anda.');
                return redirect('/login');
            }
        } elseif (Karyawan::where('nama_karyawan', $request->input('email'))->exists()) {
            $karyawan = Karyawan::where('nama_karyawan', $request->input('email'))->first();

            // Check if the provided password matches the stored password
            if ($request->input('password') === $karyawan->password) {
                // Password matches, proceed with authentication
                switch ($karyawan->jabatan) {
                    case 'admin':
                        return redirect('/admin');
                    case 'mo':
                        return redirect('/mo');
                    case 'owner':
                        return redirect('/owner');
                    default:
                        return redirect('/login');
                }
            } else {
                Session::flash('error', 'Password Salah');
                return redirect('/login');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
