@extends('layouts.app')

@section('title', 'Product')

@section('content')

<!-- TITLE -->
<div class="title" data-aos="fade-up">
<h1>Katalog Produk</h1>
<p>Temukan peralatan camping terbaik untuk petualanganmu</p>
</div>

<!-- SEARCH -->
<div class="search-box" data-aos="fade-up">
<input type="text" id="searchInput" placeholder="Cari produk...">
</div>

<!-- PRODUCT LIST -->
<div class="product-container">

@forelse($products as $product)

<div class="product-card product-item"
     data-name="{{ $product->name }}"
     data-aos="zoom-in">

    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/250' }}" alt="product">

    <div class="product-body">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Stok: {{ $product->stock }}</p>
        <p>Kategori: {{ $product->category->name ?? '-' }}</p>

        <div class="price">
            Rp {{ number_format($product->price,0,',','.') }} / hari
        </div>

        @if($product->stock > 0)
            <a href="#" class="btn">Sewa</a>
        @else
            <button class="btn" disabled>Habis</button>
        @endif
    </div>

</div>

@empty
    <p style="text-align:center; width:100%;">Tidak ada produk</p>
@endforelse

</div>

@endsection

@section('scripts')
<script>
const searchInput = document.getElementById("searchInput");
const products = document.querySelectorAll(".product-item");

searchInput.addEventListener("keyup", function () {
    let value = this.value.toLowerCase();

    products.forEach(product => {
        let name = product.getAttribute("data-name").toLowerCase();

        product.style.display = name.includes(value) ? "block" : "none";
    });
});
</script>
@endsection