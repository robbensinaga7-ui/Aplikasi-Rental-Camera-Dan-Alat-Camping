<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
{
    $productCount = Product::count();
    $transaksiCount = Transaction::count();
    $totalBooking = Transaction::count();

    $pelangganCount = User::count(); // tambah ini

    $totalPendapatan = Transaction::where('payment_status', 'approved')->sum('price');

    $pendingPembayaran = Transaction::where('payment_status', 'pending')->count();

    $peminjamanCount = Transaction::where('status','dipinjam')->count();

    $pengembalianCount = Transaction::where('status','menunggu_konfirmasi')->count();

    $latestTransaksi = Transaction::latest()->take(5)->get();

    $labels = ['Menunggu', 'Dikonfirmasi', 'Selesai', 'Dibatalkan'];

    $data = [
        Transaction::where('payment_status', 'pending')->count(),
        Transaction::where('payment_status', 'approved')->count(),
        Transaction::where('status', 'dikembalikan')->count(),
        Transaction::where('payment_status', 'rejected')->count(),
    ];

    return view('admin.dashboard', compact(
        'productCount',
        'transaksiCount',
        'totalBooking',
        'pelangganCount', // tambah ini
        'totalPendapatan',
        'pendingPembayaran',
        'latestTransaksi',
        'labels',
        'data',
        'peminjamanCount',
        'pengembalianCount'
    ));
}
public function pelanggan()
{
    $data = User::all();

    return view('admin.pelanggan', compact('data'));
}
public function createPelanggan()
{
    return view('admin.create-pelanggan');
}
public function storePelanggan(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required',
        'address' => 'required',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/admin/pelanggan')
        ->with('success', 'Pelanggan berhasil ditambahkan.');
}
public function editPelanggan(int $id)
{
    $pelanggan = User::findOrFail($id);
    return view('admin.edit-pelanggan', compact('pelanggan'));
}
public function updatePelanggan(Request $request, int $id)
{
    $pelanggan = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $pelanggan->id,
        'phone' => 'required',
        'address' => 'required',
        'password' => 'nullable|min:6',
    ]);

    $pelanggan->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => $request->password
            ? bcrypt($request->password)
            : $pelanggan->password,
    ]);

    return redirect('/admin/pelanggan')
        ->with('success', 'Pelanggan berhasil diperbarui.');
}
public function deletePelanggan(int $id)
{
    $pelanggan = User::findOrFail($id);

    $pelanggan->delete();

    return redirect('/admin/pelanggan')
            ->with('success', 'Pelanggan berhasil dihapus');
}
}