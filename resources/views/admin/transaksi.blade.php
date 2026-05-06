@extends('layouts.admin')

@section('title','Data Transaksi')

@section('style')
<style>

/* TITLE */
h2{
    margin-bottom: 15px;
}

/* TABLE BOX */
.table-box{
    background: linear-gradient(135deg,#ffffff,#f9fbfd);
    padding: 15px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

/* TABLE */
.table {
    width: 100%;
    border-collapse: collapse;
}

/* HEADER */
.table th {
    background: linear-gradient(135deg,#2c3e50,#34495e);
    color: white;
    padding: 12px;
}

/* CELL */
.table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #eee;
    transition: 0.3s;
}

/* HOVER */
.table tr:hover {
    background: #f1f6fb;
}

/* BUTTON */
.btn {
    border:none;
    padding:6px 12px;
    border-radius:6px;
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

.btn-blue { background:#3498db; }
.btn-green { background:#2ecc71; }
.btn-red { background:#e74c3c; }

/* BADGE */
.badge {
    padding: 5px 10px;
    border-radius: 8px;
    color: white;
    font-size: 12px;
}

.badge-blue { background:#3498db; }
.badge-green { background:#2ecc71; }
.badge-red { background:#e74c3c; }
.badge-orange { background:#f39c12; }

/* IMAGE */
img {
    border-radius: 8px;
    transition: 0.3s;
}

img:hover {
    transform: scale(1.1);
}

</style>
@endsection

@section('content')

<h2>📄 Data Transaksi</h2>

<div class="table-box">
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Total</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Bukti</th>
            <th>Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $i => $item)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $item->user->name ?? '-' }}</td>
            <td>{{ $item->product->name ?? '-' }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->rent_date }}</td>
            <td>{{ $item->return_date }}</td>

            <td>
                Rp {{ number_format($item->price + $item->fine, 0, ',', '.') }}
            </td>

            <!-- STATUS -->
            <td>
                @if($item->status == 'dipinjam')
                    <span class="badge badge-blue">Dipinjam</span>

                @elseif($item->status == 'menunggu_konfirmasi')
                    <form action="/admin/konfirmasi-kembali/{{ $item->id }}" method="POST">
                        @csrf
                        <button class="btn btn-green">Konfirmasi</button>
                    </form>

                @elseif($item->status == 'dikembalikan')
                    <span class="badge badge-green">Selesai</span>

                @elseif($item->status == 'ditolak')
                    <span class="badge badge-red">Ditolak</span>
                @endif
            </td>

            <!-- DENDA -->
            <td>Rp {{ $item->fine ?? 0 }}</td>

            <!-- BUKTI -->
            <td>
                @if($item->payment_proof)
                    <img src="{{ asset('storage/'.$item->payment_proof) }}" width="70">
                @else
                    -
                @endif
            </td>

            <!-- PEMBAYARAN -->
            <td>
                @if($item->payment_status == 'pending')

                    <form action="{{ url('/admin/acc/'.$item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-green">✔</button>
                    </form>

                    <form action="{{ url('/admin/tolak/'.$item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-red">✖</button>
                    </form>

                @elseif($item->payment_status == 'approved')
                    <span class="badge badge-green">Lunas</span>

                @elseif($item->payment_status == 'rejected')
                    <span class="badge badge-red">Ditolak</span>

                @else
                    <span class="badge badge-orange">Belum</span>
                @endif
            </td>

            <!-- AKSI -->
            <td>
                @if($item->status == 'dipinjam')
                    <form action="/kembalikan/{{ $item->id }}" method="POST">
                        @csrf
                        <button class="btn btn-blue">Kembalikan</button>
                    </form>
                @else
                    ✔
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection