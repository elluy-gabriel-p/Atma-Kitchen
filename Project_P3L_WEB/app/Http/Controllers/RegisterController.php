<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('loginPage');
    }

    public function actionRegister(Request $request)
    {
        $str = Str::random(100);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'saldo' => 0,
            'verify_key' => $str,
        ]);

        $details = [
            'name' => $request->name,
            'website' => 'Atma Kitchen',
            'datetime' => date('Y-m-d H:i:s'), // Use Laravel's built-in date function
            'url' => request()->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikirim ke email Anda. Silakan cek email Anda untuk mengaktifkan akun.');
        return redirect('/register');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
                ->update([
                    'active' => 1,
                    'email_verified_at' => date('Y-m-d H:i:s'), // Use Laravel's built-in date function
                ]);

            return "Verifikasi berhasil. Akun Anda sudah aktif.";
        } else {
            return "Kunci tidak valid.";
        }
    }
}
