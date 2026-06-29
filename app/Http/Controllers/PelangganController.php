<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PelangganController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $products = Product::all();
        $transactions = Transaction::where('user_id', Auth::id())->get();

        return view('pelanggan.dashboard', compact(
            'name',
            'products',
            'transactions'
        ));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('pelanggan.profile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $user = User::findOrFail(Auth::id());

    // VALIDASI (PENTING 🔥)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // UPLOAD FOTO
    if ($request->hasFile('photo')) {

        $file = $request->file('photo');

        // HAPUS FOTO LAMA (BIAR GAK NUMPUK)
        if ($user->photo && file_exists(public_path('uploads/profile/'.$user->photo))) {
            unlink(public_path('uploads/profile/'.$user->photo));
        }

        // NAMA FILE RANDOM (LEBIH AMAN)
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        // SIMPAN TANPA RESIZE (BIAR HD)
        $file->move(public_path('uploads/profile'), $filename);

        $user->photo = $filename;
    }

    // UPDATE DATA
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    $user->save();

    return back()->with('success', 'Profile updated successfully.');
}

    public function uploadKtp(Request $request, int $id)
    {
        $request->validate([
            'ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $transaction = Transaction::findOrFail($id);

        if ($request->hasFile('ktp')) {

            $path = $request->file('ktp')->store(
                'ktp',
                'public'
            );

            $transaction->ktp_image = $path;
            $transaction->save();
        }

        return back()->with(
            'success',
            'KTP berhasil diupload.'
        );
    }
}