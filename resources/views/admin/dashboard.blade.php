<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

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

/* HEADER */
.header {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* STAT CARDS */
.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.card-stat {
    background: white;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card-stat:hover {
    transform: translateY(-5px);
}

.card-stat h3 {
    font-size: 14px;
    color: #555;
}

.card-stat p {
    font-size: 22px;
    font-weight: bold;
    margin-top: 10px;
}

/* BOX */
.box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-top: 20px;
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

        <div class="header">
            <h2>Dashboard Admin Camping Rental</h2>
        </div>

        <!-- STATISTICS -->
        <div class="stats">

            <div class="card-stat">
                <h3>📦 Produk</h3>
                <p>{{ $productCount }}</p>
            </div>

            <div class="card-stat">
                <h3>💰 Transaksi</h3>
                <p>{{ $transaksiCount }}</p>
            </div>

            <div class="card-stat">
                <h3>📥 Peminjaman</h3>
                <p>{{ $peminjamanCount }}</p>
            </div>

            <div class="card-stat">
                <h3>📤 Pengembalian</h3>
                <p>{{ $pengembalianCount }}</p>
            </div>

        </div>

        <!-- AKTIVITAS -->
        <div class="box">
            <h3>🕒 Aktivitas Terbaru</h3>

            <ul style="margin-top:10px; padding-left:20px;">
                @foreach($latestTransaksi as $t)
                    <li>Transaksi baru - {{ $t->created_at }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</div>

</body>
</html>