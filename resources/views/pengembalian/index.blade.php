<!DOCTYPE html>
<html>
<head>
<title>Pengembalian</title>
<style>
body { font-family:Poppins; background:#f4f6f9; padding:20px; }
table {
    width:100%;
    border-collapse: collapse;
    background:white;
}
th, td {
    padding:10px;
    border-bottom:1px solid #ddd;
}
th { background:#1b5e20; color:white; }
a.btn {
    padding:8px 12px;
    background:#1b5e20;
    color:white;
    text-decoration:none;
    border-radius:6px;
}
</style>
</head>

<body>

<h2>🔁 Data Pengembalian</h2>
<a href="/pengembalian/create" class="btn">+ Tambah</a>

<br><br>

<table>
<tr>
    <th>Nama</th>
    <th>Tanggal Kembali</th>
    <th>Denda</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $d->transaction->customer_name }}</td>
    <td>{{ $d->return_date }}</td>
    <td>Rp {{ $d->fine }}</td>
</tr>
@endforeach

</table>

</body>
</html>