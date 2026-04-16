<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::with('product')->get();
        return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transaksi.create', compact('products'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->all());
        return redirect('/transaksi');
    }
}
