<h1>Tambah Category</h1>

<form action="/category" method="POST">
@csrf

<input type="text" name="name" placeholder="Nama Category">
<button type="submit">Simpan</button>

</form>