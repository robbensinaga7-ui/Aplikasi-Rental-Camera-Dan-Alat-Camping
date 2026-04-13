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

/* CARD */
.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    width: 250px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

.card h3 {
    margin-bottom: 10px;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background: #2c5364;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
}

.btn:hover {
    background: #0f2027;
}
</style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🏕 Admin</h2>

        <a href="/admin">Dashboard</a>
        <a href="/product">Produk</a>
        <a href="#">Transaksi</a>
        <a href="#">Pengembalian</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="header">
            <h2>Dashboard Admin Camping Rental</h2>
        </div>

        <div class="cards">

            <div class="card">
                <h3>📦 Produk</h3>
                <p>Kelola alat camping</p>
                <a href="/product" class="btn">Buka</a>
            </div>

            <div class="card">
                <h3>💰 Transaksi</h3>
                <p>Data penyewaan</p>
                <a href="#" class="btn">Lihat</a>
            </div>

            <div class="card">
                <h3>🔁 Pengembalian</h3>
                <p>Barang kembali</p>
                <a href="#" class="btn">Cek</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>