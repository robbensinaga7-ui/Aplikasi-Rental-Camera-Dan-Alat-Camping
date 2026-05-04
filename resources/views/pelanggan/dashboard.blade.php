<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Pelanggan</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
display:flex;
min-height:100vh;
background:#f5f7fb;
}

/* SIDEBAR */
.sidebar{
width:260px;
background:linear-gradient(180deg,#2c3e50,#34495e);
color:white;
padding:20px;
}

.sidebar h2{
text-align:center;
margin-bottom:25px;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:12px;
margin:6px 0;
border-radius:8px;
transition:0.3s;
font-size:14px;
}

.sidebar a:hover{
background:rgba(255,255,255,0.1);
transform:translateX(5px);
}

/* CONTENT */
.content{
flex:1;
padding:25px;
}

h1{
color:#2c3e50;
margin-bottom:10px;
}

.card{
background:white;
padding:18px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.06);
margin-bottom:20px;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,0.06);
}

th{
background:#34495e;
color:white;
padding:12px;
font-size:14px;
}

td{
padding:12px;
text-align:center;
border-bottom:1px solid #eee;
font-size:14px;
}

/* STATUS BADGE */
.badge{
padding:5px 10px;
border-radius:20px;
font-size:12px;
font-weight:500;
}

.badge-belum{ background:#fdecea; color:#e74c3c; }
.badge-pending{ background:#fff4e5; color:#f39c12; }
.badge-lunas{ background:#e8f8f0; color:#27ae60; }

/* UPLOAD BOX */
.upload-box{
display:flex;
flex-direction:column;
gap:6px;
align-items:center;
}

input[type="file"]{
font-size:12px;
}

/* BUTTON */
.btn-bayar{
background:#f39c12;
color:white;
border:none;
padding:6px 12px;
border-radius:6px;
cursor:pointer;
font-size:12px;
transition:0.3s;
}

.btn-bayar:hover{
background:#e67e22;
}

/* IMAGE */
.bukti-img{
width:70px;
border-radius:6px;
}

</style>
</head>

<body>

<div class="sidebar">
<h2>🏕 Rental</h2>

<a href="/pelanggan/dashboard">🏠 Dashboard</a>
<a href="/pelanggan/product">📦 Produk</a>
<a href="/riwayat">📜 Riwayat</a>
<a href="/logout">🚪 Logout</a>
</div>

<div class="content">

<h1>Dashboard Pelanggan</h1>

<div class="card">
<h3>👋 Halo, {{ $name }}</h3>
<p>Silakan pilih menu Produk untuk mulai menyewa alat camping.</p>
</div>

<h2>📜 Riwayat Peminjaman</h2>

<table>
<tr>
<th>Produk</th>
<th>Qty</th>
<th>Sewa</th>
<th>Kembali</th>
<th>Total</th>
<th>Status</th>
<th>Status Bayar</th>
<th>Bukti</th>
</tr>

@foreach($transactions as $t)
<tr>
<td>{{ $t->product->name ?? '-' }}</td>
<td>{{ $t->qty }}</td>
<td>{{ $t->rent_date }}</td>
<td>{{ $t->return_date }}</td>

<td>Rp {{ $t->price + $t->fine }}</td>

<!-- STATUS -->
<td>
    @if($t->status == 'dipinjam')
        <span class="badge badge-pending">Dipinjam</span>

        <!-- 🔥 TOMBOL AJUKAN -->
        <form action="/ajukan-kembali/{{ $t->id }}" method="POST">
            @csrf
            <button style="
                margin-top:5px;
                background:#3498db;
                color:white;
                border:none;
                padding:5px 10px;
                border-radius:6px;
                cursor:pointer;
            ">
                Ajukan Pengembalian
            </button>
        </form>

    @elseif($t->status == 'menunggu_konfirmasi')
        <span style="color:orange;">Menunggu Konfirmasi</span>

    @elseif($t->status == 'dikembalikan')
        <span class="badge badge-lunas">Dikembalikan</span>
    @elseif($t->status == 'ditolak')
    <span style="color:red;">Transaksi Ditolak</span>
    @endif
    
</td>

<!-- STATUS BAYAR -->
<td>
    @if(!$t->payment_status)
        <span class="badge badge-belum">Belum</span>
    @elseif($t->payment_status == 'pending')
        <span class="badge badge-pending">Menunggu</span>
    @elseif($t->payment_status == 'approved')
        <span class="badge badge-lunas">Lunas</span>
    @elseif($t->payment_status == 'rejected')
        <span class="badge badge-belum">Ditolak</span>
    @endif
</td>

<!-- BUKTI -->
<td>
<div class="upload-box">

@if($t->payment_proof)
    <img src="{{ asset('storage/'.$t->payment_proof) }}" class="bukti-img">
@endif

@if(!$t->payment_proof && $t->status != 'dikembalikan')
<form action="{{ route('transaksi.bayar', $t->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="bukti" required>
    <button type="submit" class="btn-bayar">Upload</button>
</form>

@elseif($t->payment_status == 'rejected')
<form action="{{ route('transaksi.bayar', $t->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="bukti" required>
    <button type="submit" class="btn-bayar">Upload Ulang</button>
</form>

@endif

</div>
</td>

</tr>
@endforeach

</table>

</div>

</body>
</html>