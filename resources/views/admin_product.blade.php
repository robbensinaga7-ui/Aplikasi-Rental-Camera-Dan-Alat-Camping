<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin - Data Produk</title>

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
    overflow-y: auto;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

/* BUTTON */
.btn {
    padding: 8px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: white;
    border: none;
    cursor: pointer;
}

.btn-add {
    background: #27ae60;
}

.btn-edit {
    background: #2980b9;
}

.btn-delete {
    background: #c0392b;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

table th, table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

table th {
    background: #2c5364;
    color: white;
}

img {
    width: 80px;
    border-radius: 8px;
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
        <a href="/transaksi">Transaksi</a>
        <a href="/peminjaman">Peminjaman</a>
        <a href="/pengembalian">Pengembalian</a>
        <a href="/logout">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="header">
            <h2>📦 Data Produk</h2>
            <a href="/product/create" class="btn btn-add">+ Tambah Produk</a>
        </div>

        @if(session('success'))
            <p style="color:green; margin-bottom:10px;">
                {{ session('success') }}
            </p>
        @endif

        <table>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

        @foreach($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>

            <td>
                <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/80' }}">
            </td>

            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price,0,',','.') }}</td>
            <td>{{ $product->stock }}</td>

            <td>
                <a href="/product/{{ $product->id }}/edit" class="btn btn-edit">Edit</a>

                <form action="/product/{{ $product->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

        </table>

    </div>

</div>

</body>
</html>