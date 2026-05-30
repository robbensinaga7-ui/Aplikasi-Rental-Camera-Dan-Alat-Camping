@extends('layouts.admin')

@section('title','Data Pelanggan')

@section('content')

<h1 class="page-title">
    👥 Data Pelanggan
</h1>

<div class="card">

    <div style="margin-bottom:20px;">

        <a href="/admin/pelanggan/create" class="btn btn-success">
            ➕ Tambah Pelanggan
        </a>

    </div>

    <div class="table-box">

        <table>

            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $p)

            <tr>

                <td>{{ $p->id }}</td>

                <td>{{ $p->name }}</td>

                <td>{{ $p->email }}</td>

                <td>{{ $p->phone }}</td>

                <td>{{ $p->address }}</td>

                <td>

                    <a href="/admin/pelanggan/edit/{{ $p->id }}"
                       class="btn btn-warning">
                        ✏ Edit
                    </a>

                    <a href="/admin/pelanggan/delete/{{ $p->id }}"
                       class="btn btn-danger"
                       onclick="return confirm('Yakin hapus pelanggan?')">
                        🗑 Hapus
                    </a>

                </td>

            </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection