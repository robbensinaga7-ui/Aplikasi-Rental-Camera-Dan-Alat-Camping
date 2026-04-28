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
        <a href="/peminjaman">Peminjaman</a>
        <a href="/pengembalian">Pengembalian</a>
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
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->product->name ?? '-' }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->rent_date }}</td>
                    <td>{{ $item->return_date }}</td>

                    <td>
                        @if($item->status == 'dipinjam')
                            <span class="badge bg-danger">Dipinjam</span>
                        @else
                            <span class="badge bg-success">Dikembalikan</span>
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