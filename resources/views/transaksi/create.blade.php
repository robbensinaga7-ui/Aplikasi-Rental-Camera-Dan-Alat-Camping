<!DOCTYPE html>
<html>
<head>
<title>Tambah Transaksi</title>
<style>
body { font-family:Poppins; background:#f4f6f9; padding:20px; }
form {
    background:white;
    padding:20px;
    width:300px;
    border-radius:10px;
}
input, select {
    width:100%;
    padding:8px;
    margin:8px 0;
}
button {
    background:#2c5364;
    color:white;
    border:none;
    padding:10px;
    width:100%;
}
</style>
</head>

<body>

<h2>Tambah Transaksi</h2>

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

</body>
</html>