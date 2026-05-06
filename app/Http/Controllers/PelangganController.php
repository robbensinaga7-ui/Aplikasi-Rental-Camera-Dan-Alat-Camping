<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

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
}
