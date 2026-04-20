<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->customer_name ?? Auth::user()->name;

        return view('pelanggan.dashboard', [
            'name' => $name,
            'products' => Product::all(),
            'transactions' => Transactions::where('customer_name', $name)->get(),
        ]);
    }
}
