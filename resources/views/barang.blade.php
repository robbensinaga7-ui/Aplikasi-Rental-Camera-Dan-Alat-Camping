@extends('app')

@section('content')
<div class="container mt-4">
    <h2>Data Barang</h2>

    <a href="/admin/barang/tambah" class="btn btn-primary mb-3">Tambah Barang</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga / Hari</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $b)
            <tr>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->kategori }}</td>
                <td>{{ $b->harga }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    <a href="/admin/barang/edit/{{ $b->id }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/admin/barang/hapus/{{ $b->id }}" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection