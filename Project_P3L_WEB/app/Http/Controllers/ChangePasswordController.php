<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required',
            'new_password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            Session::flash('message', 'Email atau password lama tidak valid.');
            return redirect()->back();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('message', 'Password berhasil diubah.');
        return redirect('/login');
    }
}
