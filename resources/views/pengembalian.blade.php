@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Pengembalian Barang</h2>

    <div class="card p-4 shadow-sm">
        <h4 class="mb-3">Data Pengembalian</h4>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalian as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>{{ $item->tgl_pinjam }}</td>
                    <td>{{ $item->tgl_kembali }}</td>
                    <td>
                        <span class="badge 
                            {{ $item->status == 'dipinjam' ? 'bg-warning' : 'bg-success' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Selesai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection