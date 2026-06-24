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

    foreach ($data as $item) {
        $today = now();

        if ($today->gt($item->return_date)) {
            $item->late_days = abs($today->diffInDays($item->return_date));
            $item->fine_late_preview = $item->late_days * 10000;
        } else {
            $item->late_days = 0;
            $item->fine_late_preview = 0;
        }
    }

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

$product = Product::findOrFail($request->product_id);
$totalPrice = $product->price_per_day * $request->qty;

Transaction::create([
    'user_id' => Auth::id(),
    'product_id' => $request->product_id,
    'qty' => $request->qty,
    'rent_date' => $request->rent_date,
    'return_date' => $request->return_date,
    'price' => $totalPrice,
    'status' => 'dipinjam'
]);

    $product->decrement('stock', $request->qty);

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

    // Tambahkan perulangan ini agar data dihitung dengan benar secara real-time
    foreach ($transactions as $item) {
        $today = now();
        if ($today->gt($item->return_date)) {
            $item->late_days = abs($today->diffInDays($item->return_date));
            $item->fine_late_preview = $item->late_days * 10000;
        } else {
            $item->late_days = 0;
            $item->fine_late_preview = 0;
        }
    }

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
if ($t->status === 'ditolak') {
    return back()->with('error','Sudah ditolak');
}
    $t->update([
        'payment_status' => 'rejected',
        'status' => 'ditolak',
        'is_paid' => false
    ]);

    
    $product = Product::find($t->product_id);
    $product->increment('stock', $t->qty);

    return back()->with('success', 'Pembayaran ditolak');
}
public function ajukanKembali(int $id)
{
    $t = Transaction::findOrFail($id);
if ($t->status !== 'dipinjam') {
    return back()->with('error','Tidak bisa ajukan');
}
    $t->status = 'menunggu_konfirmasi';
    $t->save();

    return back()->with('success', 'Menunggu konfirmasi admin');
}

public function konfirmasiKembali(Request $request, int $id)
{
    $request->validate([
        'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat,hilang'
    ]);

    $t = Transaction::findOrFail($id);

    if ($t->status === 'dikembalikan') {
        return back()->with('error', 'Barang sudah dikembalikan');
    }
    if (!in_array($t->status, ['dipinjam', 'menunggu_konfirmasi'])) {
        return back()->with('error', 'Status tidak valid');
    }


    // Hitung ulang harga sewa dasar yang valid
    $correctPrice = $t->price;

    // 2. HITUNG DENDA TELAT (Pastikan Tanggal Real-Time vs Return Date)
    $today = now()->startOfDay(); 
    $return_date = Carbon::parse($t->return_date)->startOfDay();
    $late_days = 0;

    if ($today->gt($return_date)) {
        // Paksa absolute (true) di parameter kedua diffInDays agar tidak minus
        $late_days = $today->diffInDays($return_date);
    }
    $fine_late = $late_days * 10000;

    // 3. DENDA KONDISI BARANG
    $fine_damage = 0;
    $fine_lost = 0;

    if ($request->kondisi == 'rusak_ringan') {
        $fine_damage = 50000;
    } elseif ($request->kondisi == 'rusak_berat') {
        $fine_damage = 150000;
    } elseif ($request->kondisi == 'hilang') {
        $harga_dasar = $t->product->price_per_day ?? ($t->price / $t->qty);
        $fine_lost = $harga_dasar * 10 * $t->qty;
    }

    // 4. TOTAL AKHIR YANG SEBENARNYA
    $total = $correctPrice + $fine_late + $fine_damage + $fine_lost;

    // 5. UPDATE SEMUA KE DATABASE
    $t->update([
        'price'       => $correctPrice, // Simpan harga sewa yang benar ke database
        'status'      => 'dikembalikan',
        'fine_late'   => $fine_late,
        'fine_damage' => $fine_damage,
        'fine_lost'   => $fine_lost,
        'late_days'   => $late_days,
        'condition'   => $request->kondisi,
        'total_price' => $total
    ]);

    // Kembalikan stok barang
    $product = $t->product;
    $product->increment('stock', $t->qty);

    return back()->with('success', 'Pengembalian dikonfirmasi + denda berhasil diperbarui');
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
public function uploadDokumen(Request $request, int $id)
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
    if ($transaksi->status === 'dibatalkan') {
    return back()->with('error','Sudah dibatalkan');
}
    $product = Product::find($transaksi->product_id);

    if($product){
       $product->increment('stock', $transaksi->qty);
    }

    $transaksi->status = 'dibatalkan';
    $transaksi->payment_status = 'dibatalkan';
    $transaksi->is_paid = false;

    $transaksi->save();

    return back()->with('success','Pesanan berhasil dibatalkan');
}
}