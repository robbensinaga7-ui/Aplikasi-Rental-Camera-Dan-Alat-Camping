@extends('app')

@section('title', 'Pengembalian Barang')

@section('content')
<div class="card">

    <h3 style="margin-bottom: 15px;">Data Pengembalian</h3>

 <table class="table table-bordered table-hover text-center align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Penyewa</th>
            <th>Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th style="width: 15%;">Status</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

        <tbody>
            @forelse($pengembalian as $index => $k)
          <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-start">{{ $k->nama }}</td>
                <td class="text-start">{{ $k->barang }}</td>
                <td class="text-center">{{ $k->tgl_pinjam }}</td>
                <td class="text-center">{{ $k->tgl_kembali }}</td>

    <td class="text-center">
        @if($k->status == 'dipinjam')
            <span class="badge bg-warning">Dipinjam</span>
        @elseif($k->status == 'dikembalikan')
            <span class="badge bg-success">Dikembalikan</span>
        @endif
    </td>

    <td class="text-center">
        <a href="#" class="btn btn-primary btn-sm">Selesai</a>
    </td>
</tr>

            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Tidak ada data pengembalian
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>
@endsection