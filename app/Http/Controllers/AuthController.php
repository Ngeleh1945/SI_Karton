<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menghandle proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lakukan logika autentikasi di sini
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil login, redirect ke halaman dashboard
            return redirect()->route('dashboard');
        }

        // Jika gagal login, redirect kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['username' => 'Username atau Password salah.'])->withInput($request->only('username'));
    }

    // Menghandle proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
