<!DOCTYPE html>
<html>
<head>
<title>Transaksi</title>
<style>
body { font-family: Poppins; background:#f4f6f9; padding:20px; }
table {
    width:100%;
    border-collapse: collapse;
    background:white;
}
th, td {
    padding:10px;
    border-bottom:1px solid #ddd;
}
th { background:#2c5364; color:white; }
a.btn {
    padding:8px 12px;
    background:#2c5364;
    color:white;
    text-decoration:none;
    border-radius:6px;
}
</style>
</head>

<body>

<h2>📦 Data Transaksi</h2>
<a href="/transaksi/create" class="btn">+ Tambah</a>

<br><br>

<table>
<tr>
    <th>Nama</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Status</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $d->customer_name }}</td>
    <td>{{ $d->product->name }}</td>
    <td>{{ $d->qty }}</td>
    <td>{{ $d->status }}</td>
</tr>
@endforeach

</table>

</body>
</html>