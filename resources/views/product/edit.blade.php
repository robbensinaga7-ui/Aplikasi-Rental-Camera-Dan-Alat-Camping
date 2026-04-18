<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .card {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #444;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
            transition: 0.3s;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            border-color: #764ba2;
            box-shadow: 0 0 8px rgba(118,75,162,0.3);
        }

        textarea {
            resize: none;
        }

        .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

        button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(118,75,162,0.3);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(118,75,162,0.4);
        }

        .preview {
            text-align: center;
            margin-top: 10px;
        }

        .preview img {
            width: 120px;
            border-radius: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>✏️ Edit Product</h1>

    <form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name }}">

        <label>Deskripsi</label>
        <textarea name="description" rows="3">{{ $product->description }}</textarea>

        <label>Harga</label>
        <input type="number" name="price" value="{{ $product->price }}">

        <label>Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}">

        <label>Ganti Gambar Produk</label>
        <input type="file" name="image" accept="image/*">

        <!-- preview gambar lama -->
        <div class="preview">
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $product->image) }}">
        </div>

        <!-- BUTTON TENGAH -->
        <div class="btn-center">
            <button type="submit">💾 Update Product</button>
        </div>

    </form>
</div>

</body>
</html>