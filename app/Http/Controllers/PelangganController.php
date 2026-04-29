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

    return view('pelanggan.dashboard', [
        'name' => $name,
        'products' => Product::all(),
        'transaction' => Transaction::where('customer_name', $name)->get(),
    ]);
    }
}
