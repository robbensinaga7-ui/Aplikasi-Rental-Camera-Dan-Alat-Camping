<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Product - Camping Rental</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;

    /* animated gradient */
    background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1c92d2);
    background-size: 400% 400%;
    animation: gradientMove 10s ease infinite;
}

@keyframes gradientMove {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* floating circles */
body::before, body::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

body::before {
    top: -50px;
    left: -50px;
}

body::after {
    bottom: -50px;
    right: -50px;
}

@keyframes float {
    0%,100% {transform: translateY(0);}
    50% {transform: translateY(30px);}
}

/* CARD */
.card {
    position: relative;
    z-index: 2;
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 18px;
    width: 380px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    animation: pop 0.8s ease;
}

@keyframes pop {
    from {opacity: 0; transform: scale(0.8);}
    to {opacity: 1; transform: scale(1);}
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #1c92d2;
    font-size: 22px;
}

/* INPUT */
input, textarea {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 10px;
    outline: none;
    transition: 0.3s;
    font-family: 'Poppins', sans-serif;
}

input:focus, textarea:focus {
    border-color: #1c92d2;
    box-shadow: 0 0 10px rgba(28,146,210,0.4);
    transform: scale(1.02);
}

/* BUTTON */
button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background: linear-gradient(45deg, #1c92d2, #00c6ff);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}

/* hover effect */
button:hover {
    transform: scale(1.05);
}

/* ripple animation */
button::after {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.4s, height 0.4s;
}

button:active::after {
    width: 200px;
    height: 200px;
}

/* link */
.back {
    text-align: center;
    margin-top: 10px;
}

.back a {
    text-decoration: none;
    font-size: 12px;
    color: #444;
}

.back a:hover {
    color: #1c92d2;
}
</style>

</head>

<body>

<div class="card">

<h1>🏕 Tambah Produk Camping</h1>

<form action="/product" method="POST" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Nama Produk">

<textarea name="description" placeholder="Deskripsi Produk"></textarea>

<input type="number" name="price" placeholder="Harga / hari">

<input type="number" name="stock" placeholder="Stok Produk">
<input type="text" name="category_name" placeholder="Masukkan Kategori">
<input type="file" name="image">

<button type="submit">🚀 Simpan Produk</button>

</form>

<div class="back">
    <a href="/pages/product">← Kembali ke Product</a>
</div>

</div>

</body>
</html>