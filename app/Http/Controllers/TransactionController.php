<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
        'product_id' => 'required|exists:products,id',
        'customer_name' => 'required',
        'qty' => 'required|integer|min:1',
        'rent_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:rent_date',
    ]);

    $product = Product::find($request->product_id);

    if (!$product) {
        return back()->with('error', 'Produk tidak ditemukan');
    }

    if ($product->stock < $request->qty) {
        return back()->with('error', 'Stok tidak cukup');
    }

    Transaction::create([
        'customer_name' => $request->customer_name,
        'product_id' => $request->product_id,
        'qty' => $request->qty,
        'rent_date' => $request->rent_date,
        'return_date' => $request->return_date,
        'status' => 'dipinjam'
    ]);

    $product->stock -= $request->qty;
    $product->save();

    return redirect('/transaksi')->with('success', 'Berhasil transaksi');
}

    public function dashboard(Request $request)
{
    $name = $request->customer_name;

    $transactions = Transaction::with('product')
        ->when($name, function ($query) use ($name) {
            $query->where('customer_name', $name);
        })
        ->get();

    $products = Product::all();

    return view('pelanggan.dashboard', compact('transactions', 'products', 'name'));
}
public function adminDashboard()
    {
        $totalProduct = Product::count();
        $totalTransaction = Transaction::count();
        $totalBorrowed = Transaction::where('status', 'dipinjam')->sum('qty');

        $chart = Transaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        return view('admin.dashboard', compact(
            'totalProduct',
            'totalTransaction',
            'totalBorrowed',
            'chart'
        ));
    }
}
