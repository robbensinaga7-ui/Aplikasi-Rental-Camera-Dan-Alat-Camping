<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/register')->with('success', 'Berhasil daftar!');
    }

// FORM LOGIN
public function showLogin()
{
    return view('auth.login');
}

// PROSES LOGIN
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // LOGIN USER DARI DATABASE
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // cek kalau admin manual
        if ($request->email == 'admin@gmail.com') {
            session(['is_admin' => true]);
            return redirect('/admin');
        }

       return redirect()->route('pelanggan.dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}

// LOGOUT
public function logout()
{
    session()->forget('is_admin');
    return redirect('/login');
}
}
