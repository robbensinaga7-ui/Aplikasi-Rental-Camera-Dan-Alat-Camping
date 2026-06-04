<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Product - Camping Rental</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:'Poppins',sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;

    background:linear-gradient(
    -45deg,
    #0f2027,
    #203a43,
    #2c5364,
    #1c92d2);

    background-size:400% 400%;
    animation:gradientMove 10s ease infinite;
}

/* ANIMASI BG */
@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* FLOATING */
body::before,
body::after{
    content:"";
    position:absolute;
    width:300px;
    height:300px;
    border-radius:50%;
    background:rgba(255,255,255,0.05);
    animation:float 6s ease-in-out infinite;
}

body::before{
    top:-50px;
    left:-50px;
}

body::after{
    bottom:-50px;
    right:-50px;
}

@keyframes float{
    0%,100%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(30px);
    }
}

/* CARD */
.card{
    position:relative;
    z-index:2;

    background:rgba(255,255,255,0.95);

    width:400px;

    padding:30px;

    border-radius:20px;

    box-shadow:0 20px 40px rgba(0,0,0,0.3);

    animation:pop 0.8s ease;
}

@keyframes pop{
    from{
        opacity:0;
        transform:scale(0.8);
    }
    to{
        opacity:1;
        transform:scale(1);
    }
}

/* TITLE */
h1{
    text-align:center;
    margin-bottom:20px;
    color:#1c92d2;
    font-size:24px;
}

/* INPUT */
input,
textarea{
    width:100%;
    padding:12px;
    margin:8px 0;

    border:1px solid #ddd;
    border-radius:10px;

    outline:none;

    transition:0.3s;

    font-family:'Poppins',sans-serif;
}

input:focus,
textarea:focus{
    border-color:#1c92d2;
    box-shadow:0 0 10px rgba(28,146,210,0.4);
    transform:scale(1.02);
}

/* TEXTAREA */
textarea{
    resize:none;
    height:100px;
}

/* IMAGE */
.preview-img{
    width:120px;
    border-radius:12px;
    margin-top:10px;
    margin-bottom:10px;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
    transition:0.3s;
}

.preview-img:hover{
    transform:scale(1.05);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    margin-top:10px;

    background:linear-gradient(45deg,#1c92d2,#00c6ff);

    color:white;

    border:none;
    border-radius:10px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;

    position:relative;
    overflow:hidden;
}

button:hover{
    transform:scale(1.05);
}

/* RIPPLE */
button::after{
    content:"";
    position:absolute;

    width:0;
    height:0;

    border-radius:50%;

    background:rgba(255,255,255,0.4);

    top:50%;
    left:50%;

    transform:translate(-50%,-50%);

    transition:width .4s,height .4s;
}

button:active::after{
    width:220px;
    height:220px;
}

/* BACK */
.back{
    text-align:center;
    margin-top:12px;
}

.back a{
    text-decoration:none;
    font-size:13px;
    color:#444;
}

.back a:hover{
    color:#1c92d2;
}

</style>
</head>

<body>

<div class="card">

<h1>✏️ Edit Produk Camping</h1>

<form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<input
type="text"
name="name"
value="{{ $product->name }}"
placeholder="Nama Produk">

<textarea
name="description"
placeholder="Deskripsi Produk">{{ $product->description }}</textarea>

<input
type="number"
name="price"
value="{{ $product->price }}"
placeholder="Harga / hari">

<input
type="number"
name="stock"
value="{{ $product->stock }}"
placeholder="Stok Produk">

<input
type="text"
name="category_name"
value="{{ $product->category->name ?? '' }}"
placeholder="Kategori Produk">

<input type="file" name="image">

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
class="preview-img">

@endif

<button type="submit">
🚀 Update Produk
</button>

</form>

<div class="back">
    <a href="/admin/product">
        ← Kembali ke Product
    </a>
</div>

</div>

</body>
</html>