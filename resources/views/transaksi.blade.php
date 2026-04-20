@extends('layouts.app') 
// Menggunakan template utama (layout) agar tampilan konsisten di semua halaman

@section('title', 'Transaksi Pembayaran') 
// Menentukan judul halaman

@section('content')
<div class="card">
    <h4 class="mb-3">Data Transaksi Pembayaran</h4>
    // Judul halaman ditampilkan ke user

    <table class="table table-bordered text-center">
        // Menggunakan Bootstrap untuk membuat tabel rapi dan responsif

        <thead style="background-color:#a8c3b8;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Total</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($transaksi as $i => $item)
            // Perulangan data transaksi untuk ditampilkan ke tabel

            <tr>
                <td>{{ $i+1 }}</td>
                // Menampilkan nomor urut data

                <td>{{ $item->nama }}</td>
                // Menampilkan nama pelanggan (aman dari XSS karena {{ }})

                <td>{{ $item->barang }}</td>
                // Menampilkan nama barang yang disewa

                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                // Format angka menjadi mata uang rupiah agar mudah dibaca

                <td>{{ $item->metode }}</td>
                // Menampilkan metode pembayaran (cash / transfer)

                <td>
                    @if($item->status == 'belum_bayar')
                        <span class="badge bg-danger">Belum Bayar</span>
                        // Jika belum bayar → tampil warna merah
                    @else
                        <span class="badge bg-success">Lunas</span>
                        // Jika sudah bayar → tampil warna hijau
                    @endif
                </td>

                <td>
                    @if($item->status == 'belum_bayar')
                        <a href="#" class="btn btn-sm btn-warning">Bayar</a>
                        // Tombol aksi untuk melakukan pembayaran
                    @else
                        <span class="text-success">✔</span>
                        // Jika sudah lunas → tampil tanda centang
                    @endif
                </td>
            </tr>
            @endforeach
            // Mengakhiri perulangan data
        </tbody>
    </table>
</div>
@endsection