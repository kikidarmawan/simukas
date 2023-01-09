<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function proses(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('gagal', $validator->errors()->first())->withInput();
            } else {
                $email = $request->email;
                $password = $request->password;

                $user = User::where('email', $email)->first();
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('dashboard')->with('berhasil', 'Login berhasil!');
                } else {
                    return redirect()->back()->with('gagal', 'Email atau password tidak terdaftar!')->withInput();
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
