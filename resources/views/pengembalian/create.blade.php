<!DOCTYPE html>
<html>
<head>
<title>Tambah Pengembalian</title>
<style>
body { font-family:Poppins; background:#f4f6f9; padding:20px; }
form {
    background:white;
    padding:20px;
    width:300px;
    border-radius:10px;
}
select, input {
    width:100%;
    padding:8px;
    margin:8px 0;
}
button {
    background:#1b5e20;
    color:white;
    border:none;
    padding:10px;
    width:100%;
}
</style>
</head>

<body>

<h2>Tambah Pengembalian</h2>

<form method="POST" action="/pengembalian">
@csrf

<select name="transaction_id">
@foreach($transactions as $t)
<option value="{{ $t->id }}">{{ $t->customer_name }}</option>
@endforeach
</select>

<input type="date" name="return_date">
<input type="number" name="fine" placeholder="Denda">

<button>Simpan</button>

</form>

</body>
</html>