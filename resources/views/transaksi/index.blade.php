<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Transaksi</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
/* sama seperti punyamu */
</style>

</head>

<body>

<div class="wrapper">

    <div class="sidebar">
        <h2>🏕 Admin</h2>
        <a href="/admin">Dashboard</a>
        <a href="/admin/product">Produk</a>
        <a href="/admin/transaksi">Transaksi</a>
    </div>

    <div class="content">

        <h2>Data Transaksi</h2>

        <a href="/transaksi/create" style="margin-bottom:10px;display:inline-block;background:#2c5364;color:white;padding:8px 12px;border-radius:6px;text-decoration:none;">
            + Tambah
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Tanggal Pinjam</th>
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
                    <td>{{ $item->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>
</html>