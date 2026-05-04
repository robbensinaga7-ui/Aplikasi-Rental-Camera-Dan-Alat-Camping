<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    public function index()
{
    $data = Transaction::with(['product', 'user'])->get();
    return view('admin.transaksi', compact('data'));
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

    $rent = Carbon::parse($request->rent_date);
$return = Carbon::parse($request->return_date);

$days = $rent->diffInDays($return) + 1;
$product = Product::findOrFail($request->product_id);
$totalPrice = $product->price_per_day * $days * $request->qty;

Transaction::create([
    'user_id' => Auth()->id(),
    'product_id' => $request->product_id,
    'qty' => $request->qty,
    'rent_date' => $request->rent_date,
    'return_date' => $request->return_date,
    'price' => $totalPrice,
    'fine' => 0,
    'status' => 'dipinjam'
]);

    $product->stock -= $request->qty;
    $product->save();

    return redirect('/admin/transaksi')->with('success', 'Berhasil transaksi');
}

    public function dashboard(Request $request)
{
    $name = $request->user_id;

    $transactions = Transaction::with('product')
        ->when($name, function ($query) use ($name) {
            $query->where('user_id', $name);
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
    public function bayar(Request $request, $id)
{
    $request->validate([
        'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $t = Transaction::findOrFail($id);

    $file = $request->file('bukti');
    $path = $file->store('bukti_pembayaran', 'public');

    $t->payment_proof = $path;
    $t->payment_status = 'pending';
    $t->is_paid = false;
    $t->save();

    return back()->with('success', 'Upload berhasil, menunggu admin');
}

private function hitungDenda($transaksi)
{
    $today = Carbon::now();
    $returnDate = Carbon::parse($transaksi->return_date);

    if ($today->gt($returnDate)) {
        $lateDays = $returnDate->diffInDays($today);

        $dendaPerHari = 10000; // bisa kamu ubah

        return $lateDays * $dendaPerHari;
    }

    return 0;
}
public function kembalikan($id)
{
    $transaksi = Transaction::findOrFail($id);

    // tanggal hari ini
    $today = Carbon::now();
    $tgl_kembali = Carbon::parse($transaksi->return_date);

    $denda = 0;

    // cek telat
    if ($today->gt($tgl_kembali)) {
        $telat = $tgl_kembali->diffInDays($today);
        $denda = $telat * 10000; // 10rb per hari
    }

    // update transaksi
    $transaksi->status = 'dikembalikan';
    $transaksi->fine = $denda;
    $transaksi->save();

    // balikin stok
    $produk = $transaksi->product;
    $produk->stock += $transaksi->qty;
    $produk->save();

    return back()->with('success', 'Barang berhasil dikembalikan!');

}
public function adminPembayaran()
{
    $transactions = Transaction::with('product')->get();
    return view('admin.pembayaran', compact('transactions'));
}

public function acc($id)
{
    $t = Transaction::findOrFail($id);

    $t->update([
        'payment_status' => 'approved',
        'is_paid' => true,
        'paid_at' => now()
    ]);

    return back()->with('success', 'Pembayaran disetujui');
}

public function tolak($id)
{
    $t = Transaction::findOrFail($id);

    $t->update([
        'payment_status' => 'rejected',
        'status' => 'ditolak',
        'is_paid' => false
    ]);

    
    $product = Product::find($t->product_id);
    $product->stock += $t->qty;
    $product->save();

    return back()->with('success', 'Pembayaran ditolak');
}
public function ajukanKembali($id)
{
    $t = Transaction::findOrFail($id);

    $t->status = 'menunggu_konfirmasi';
    $t->save();

    return back()->with('success', 'Menunggu konfirmasi admin');
}

public function konfirmasiKembali($id)
{
    $t = Transaction::findOrFail($id);

    $today = now();
    $returnDate = \Carbon\Carbon::parse($t->return_date);

    $fine = 0;

    if ($today->gt($returnDate)) {
        $late = $returnDate->diffInDays($today);
        $fine = $late * 10000;
    }

    $t->status = 'dikembalikan';
    $t->fine = $fine;
    $t->save();

    $product = $t->product;
    $product->stock += $t->qty;
    $product->save();

    return back()->with('success', 'Pengembalian dikonfirmasi');
}
}