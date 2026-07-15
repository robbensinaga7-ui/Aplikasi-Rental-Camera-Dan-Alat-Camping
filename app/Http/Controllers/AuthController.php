<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    // LOGIN ADMIN
    if ($request->email == 'admin@gmail.com' && $request->password == 'admin123') {
        Session::put('is_admin', true);

        return redirect('/admin')
            ->with('success', 'Login admin berhasil!');
    }

    // LOGIN USER
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        return redirect()->route('pelanggan.dashboard')
            ->with('success', 'Login berhasil, selamat datang!');
    }

    return back()->with('error', 'Email atau password salah');
}

// LOGOUT
public function logout()
{
    Auth::logout();

    Session::forget('is_admin');

    return redirect('/login')
        ->with('success', 'Berhasil logout!');
}
public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan');
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('/login')->with('success', 'Password berhasil diubah');
}
}
