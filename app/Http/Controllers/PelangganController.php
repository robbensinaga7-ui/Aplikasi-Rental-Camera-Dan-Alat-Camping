<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
          $name = Auth::user()->name;
    $products = Product::all();
    $transactions = Transaction::where('user_id', Auth::id())->get();

    return view('pelanggan.dashboard', compact('name', 'products', 'transactions'));
    }
    
    public function profile()
    {
        $user = Auth::user();
        return view('pelanggan.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'phone', 'address']));
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}