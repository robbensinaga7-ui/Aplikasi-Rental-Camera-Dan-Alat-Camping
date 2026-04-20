<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class PelangganProductController extends Controller
{
     public function index(Request $request)
    {
        return view('pelanggan.product', [
            'products' => Product::all(),
            'name' => $request->customer_name ?? null
        ]);
    }
}
