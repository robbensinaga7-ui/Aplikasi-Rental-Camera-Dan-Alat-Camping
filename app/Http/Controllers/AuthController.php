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
   $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // ✅ LOGIN ADMIN (TANPA DATABASE)
    if ($request->email == 'admin@gmail.com' && $request->password == 'admin123') {
        session(['is_admin' => true]);
        return redirect('/admin');
    }

    // ✅ LOGIN USER BIASA (DARI DATABASE)
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->route('pelanggan.dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}

// LOGOUT
public function logout()
{
   Auth::logout(); // logout user
    session()->forget('is_admin'); // hapus admin session

    return redirect('/login');
}
}
