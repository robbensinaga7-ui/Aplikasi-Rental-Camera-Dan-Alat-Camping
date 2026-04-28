<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Transaksi</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 220px;
    background: linear-gradient(180deg,#0f2027,#203a43,#2c5364);
    color: white;
    padding: 20px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

.content {
    flex: 1;
    background: #f4f6f9;
    padding: 20px;
}

.form-box {
    background: white;
    padding: 20px;
    width: 350px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

button {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: #2c5364;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #203a43;
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
    </div>

    <!-- CONTENT -->
    <div class="content">

        <h2>Tambah Transaksi</h2>

        <div class="form-box">
            <form method="POST" action="/transaksi">
                @csrf

                <input type="text" name="customer_name" placeholder="Nama">

                <select name="product_id">
                    @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>

                <input type="number" name="qty" placeholder="Jumlah">
                <input type="date" name="rent_date">
                <input type="date" name="return_date">

                <button>Simpan</button>
            </form>
        </div>

    </div>

</div>

</body>
</html>