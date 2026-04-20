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
animation:slide 0.6s ease;
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
animation:fade 0.6s ease;
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

/* ANIMATION */
@keyframes fade{
from{opacity:0;transform:translateY(10px);}
to{opacity:1;transform:translateY(0);}
}

@keyframes slide{
from{transform:translateX(-100%);}
to{transform:translateX(0);}
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
<th>Status</th>
</tr>

@foreach($transactions as $t)
<tr>
<td>{{ $t->product->name ?? '-' }}</td>
<td>{{ $t->qty }}</td>
<td>{{ $t->rent_date }}</td>
<td>{{ $t->return_date }}</td>
<td>{{ $t->status }}</td>
</tr>
@endforeach

</table>

</div>

</body>
</html>