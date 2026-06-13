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
    'user_id' => Auth::id(),
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
 public function bayar(Request $request, int $id)
{
    $t = Transaction::findOrFail($id);

    $request->validate([
        'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $file = $request->file('bukti');

    $path = $file->store(
        'bukti_pembayaran',
        'public'
    );

    $t->payment_proof = $path;
    $t->payment_status = 'pending';
    $t->is_paid = false;

    $t->save();

    return back()->with(
        'success',
        'Upload berhasil, menunggu admin'
    );
}

private function hitungDenda(Transaction $transaksi)
{
    $today = Carbon::now();
    $returnDate = Carbon::parse($transaksi->return_date);

    if ($today->gt($returnDate)) {
        $lateDays = $returnDate->diffInDays($today);

        $dendaPerHari = 10000; 

        return $lateDays * $dendaPerHari;
    }

    return 0;
}
public function kembalikan(int $id)
{
    $t = Transaction::findOrFail($id);

    $t->status = 'menunggu_konfirmasi';
    $t->save();

    return back()->with('success', 'Pengembalian diajukan, menunggu admin');
}
public function adminPembayaran()
{
    $transactions = Transaction::with('product')->get();
    return view('admin.pembayaran', compact('transactions'));
}

public function acc(int $id)
{
    $t = Transaction::findOrFail($id);

    // CEK KTP
    if (!$t->ktp_image) {
        return back()->with(
            'error',
            '❌ Peminjaman tidak dapat disetujui karena pelanggan belum mengupload foto KTP.'
        );
    }

    // CEK BUKTI PEMBAYARAN
    if (!$t->payment_proof) {
        return back()->with(
            'error',
            '❌ Peminjaman tidak dapat disetujui karena pelanggan belum mengupload bukti pembayaran.'
        );
    }

    $t->update([
        'payment_status' => 'approved',
        'is_paid' => true,
        'paid_at' => now()
    ]);

    return back()->with(
        'success',
        '✅ Pembayaran berhasil disetujui.'
    );
}

public function tolak(int $id)
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
public function ajukanKembali(int $id)
{
    $t = Transaction::findOrFail($id);

    $t->status = 'menunggu_konfirmasi';
    $t->save();

    return back()->with('success', 'Menunggu konfirmasi admin');
}

public function konfirmasiKembali(int $id)
{
    $transaksi = Transaction::find($id);

    // HITUNG DENDA
    $today = Carbon::now();

    $returnDate = Carbon::parse($transaksi->return_date);

    if ($today->gt($returnDate)) {

        $lateDays = $returnDate->diffInDays($today);

        $dendaPerHari = 10000;

        $transaksi->fine = $lateDays * $dendaPerHari;

    } else {

        $transaksi->fine = 0;
    }

    // UPDATE STATUS
    $transaksi->status = 'dikembalikan';

    $transaksi->save();

    return back()->with('success', 'Pengembalian berhasil dikonfirmasi');
}
public function peminjaman()
{
    $data = Transaction::with(['product','user'])
        ->where('status', 'dipinjam')
        ->get();

    return view('admin.peminjaman', compact('data'));
}

public function pengembalian()
{
    $data = Transaction::with(['product','user'])
        ->whereIn('status', ['menunggu_konfirmasi','dikembalikan'])
        ->get();

    return view('admin.pengembalian', compact('data'));
}
public function uploadDokumen(Request $request, $id)
{
    $request->validate([
        'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'ktp'   => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $t = Transaction::findOrFail($id);

    $paymentProof = $request->file('bukti')
        ->store('bukti_pembayaran', 'public');

    $ktp = $request->file('ktp')
        ->store('ktp', 'public');

    $t->payment_proof = $paymentProof;
    $t->ktp_image = $ktp;
    $t->payment_status = 'pending';
    $t->is_paid = false;

    $t->save();

    return back()->with(
        'success',
        'Dokumen berhasil diupload'
    );
} 
public function batalkan(int $id)
{
    $transaksi = Transaction::findOrFail($id);

    // kembalikan stok
    $product = Product::find($transaksi->product_id);

    if($product){
        $product->stock += $transaksi->qty;
        $product->save();
    }

    $transaksi->status = 'dibatalkan';
    $transaksi->payment_status = 'dibatalkan';
    $transaksi->is_paid = false;

    $transaksi->save();

    return back()->with('success','Pesanan berhasil dibatalkan');
}
}