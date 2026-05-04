<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Transaksi</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* WRAPPER */
.wrapper {
    display: flex;
    height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    background: linear-gradient(180deg,#0f2027,#203a43,#2c5364);
    color: white;
    padding: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
    transform: translateX(5px);
}

/* CONTENT */
.content {
    flex: 1;
    background: #f4f6f9;
    padding: 20px;
}

/* TABLE */
.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.table th {
    background: #a8c3b8;
}

.badge {
    padding: 5px 10px;
    border-radius: 6px;
    color: white;
}

.bg-danger {
    background: red;
}

.bg-success {
    background: green;
}
</style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🏕 Admin</h2>

        <a href="/admin">Dashboard</a>
        <a href="/admin/product">Produk</a>
        <a href="/admin/transaksi">Transaksi</a>
        <a href="/admin/pembayaran">Pembayaran</a>
        <a href="/peminjaman">Peminjaman</a>
        <a href="/pengembalian">Pengembalian</a>

        <form action="/logout" method="POST" style="margin-top:20px;">
            @csrf
            <button style="
                width:100%;
                padding:12px;
                border:none;
                border-radius:10px;
                background:#e74c3c;
                color:white;
                cursor:pointer;
            ">
                🚪 Keluar
            </button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <h2>Data Transaksi</h2>

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

                    <!-- TOTAL -->
<td>
    Rp {{ number_format($item->price + $item->fine, 0, ',', '.') }}
</td>

                    <!-- STATUS -->
                    <td>
    @if($item->status == 'dipinjam')
        <span style="color:blue;">DiPinjam</span>

    @elseif($item->status == 'menunggu_konfirmasi')
        <form action="/admin/konfirmasi-kembali/{{ $item->id }}" method="POST">
            @csrf
            <button style="
                background:green;
                color:white;
                border:none;
                padding:6px 10px;
                border-radius:6px;
                cursor:pointer;
            ">
                Konfirmasi
            </button>
        </form>

    @elseif($item->status == 'dikembalikan')
        ✔ Dikembalikan
    @endif
</td>

                    <!-- DENDA -->
                    <td>
                        Rp {{ $item->denda ?? 0 }}
                    </td>
<td>
@if($item->payment_proof)
    <img src="{{ asset('storage/'.$item->payment_proof) }}" width="70">
@else
    -
@endif
</td>

<td>
@if($item->payment_status == 'pending')

<form action="{{ url('/admin/acc/'.$item->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" style="
        background:#2ecc71;
        color:white;
        border:none;
        padding:6px 12px;
        border-radius:6px;
        cursor:pointer;
    ">
        ✔ ACC
    </button>
</form>

<form action="{{ url('/admin/tolak/'.$item->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" style="
        background:#e74c3c;
        color:white;
        border:none;
        padding:6px 12px;
        border-radius:6px;
        cursor:pointer;
    ">
        ✖ Tolak
    </button>
</form>

@elseif($item->payment_status == 'approved')
    <span style="color:green;">Lunas</span>

@elseif($item->payment_status == 'rejected')
    <span style="color:red;">Ditolak</span>

@else
    <span style="color:gray;">Belum Upload</span>
@endif
</td>
                    <!-- AKSI -->
                    <td>
                        @if($item->status == 'dipinjam')
                            <form action="/kembalikan/{{ $item->id }}" method="POST">
                                @csrf
                                <button style="
                                    background:#3498db;
                                    color:white;
                                    border:none;
                                    padding:6px 10px;
                                    border-radius:6px;
                                    cursor:pointer;
                                ">
                                    Kembalikan
                                </button>
                            </form>
                        @else
                            ✔ Selesai
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>
</html>