@extends('layouts.pelanggan')

@section('title','Produk Camping')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    font-size:30px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:10px;
}

/* SUBTITLE */
.page-subtitle{
    color:#64748b;
    margin-bottom:25px;
}
/* HERO */
.hero-product{
    background:linear-gradient(135deg,#3498db,#6c5ce7);
    color:white;
    padding:35px;
    border-radius:25px;
    margin-bottom:25px;
    box-shadow:0 15px 35px rgba(52,152,219,.25);
}

.hero-product h1{
    font-size:34px;
    margin-bottom:10px;
    color:white;
}

.hero-product p{
    opacity:.95;
}

/* STATS */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:25px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.4s;
    overflow:hidden;
    position:relative;
}

.stat-card::before{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-30px;
    right:-30px;
}

.stat-card h2,
.stat-card p{
    color:white;
}

/* DECORATION */
.content{
    position:relative;
}

.content::before{
    content:'';
    position:fixed;
    width:300px;
    height:300px;
    border-radius:50%;
    background:rgba(52,152,219,.08);
    top:-100px;
    right:-100px;
    z-index:-1;
}

.content::after{
    content:'';
    position:fixed;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(108,92,231,.08);
    bottom:-100px;
    left:-100px;
    z-index:-1;
}

/* STOCK BADGE */
.stock-badge{
    position:absolute;
    top:15px;
    right:15px;
    padding:8px 12px;
    border-radius:20px;
    color:white;
    font-size:12px;
    font-weight:600;
}

.stock-ready{
    background:#2ecc71;
}

.stock-empty{
    background:#e74c3c;
}

/* FORM BOX */
.form-box{
    margin-top:15px;
    padding:15px;
    background:#f8fbff;
    border-radius:18px;
}
/* PRODUCT CONTAINER */
.product-container{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));
    gap:25px;
}

/* PRODUCT CARD */
.product-card{
    position:relative;
    overflow:hidden;
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    border-radius:22px;
    padding:15px;
    max-width:400px;
    margin:auto;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    transition:0.4s;
    animation:fadeUp 0.6s ease;
}

/* SHINE EFFECT */
.product-card::before{
    content:'';
    position:absolute;
    top:0;
    left:-120%;
    width:100%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.35),
        transparent
    );
    transition:0.7s;
}

.product-card:hover::before{
    left:120%;
}

/* HOVER */
.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 35px rgba(0,0,0,0.12);
}

/* IMAGE */
.product-img{
    width:100%;
    height:150px;
    object-fit:contain;
    background:#f8fafc;
    border-radius:16px;
    margin-bottom:15px;
    transition:0.4s;
}

.product-img:hover{
    transform:scale(1.03);
}

/* PRODUCT TITLE */
.product-info{
    font-size:14px;
    color:#64748b;
    margin-bottom:6px;
}

.product-title{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:5px;
    text-align:center;
}

.product-price{
    margin:12px 0;
    font-size:20px;
    font-weight:700;
    color:#3498db;
    text-align:center;
}

/* INPUT */
.form-input{
    width:100%;
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #dbe2ea;
    margin-bottom:12px;
    transition:0.3s;
    background:white;
}

.form-input:focus{
    outline:none;
    border-color:#3498db;
    box-shadow:0 0 0 4px rgba(52,152,219,0.1);
}
.form-label{
    display:block;
    margin-bottom:6px;
    font-size:13px;
    font-weight:600;
    color:#334155;
}
/* BUTTON */
.btn-sewa{
    width:100%;
    border:none;
    padding:12px;
    border-radius:14px;
    background:linear-gradient(135deg,#3498db,#6c9cff);
    color:white;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-sewa:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* EMPTY */
.empty-product{
    text-align:center;
    padding:50px;
    background:white;
    border-radius:20px;
    color:#94a3b8;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

/* ANIMATION */
@keyframes fadeUp{

from{
    opacity:0;
    transform:translateY(20px);
}

to{
    opacity:1;
    transform:translateY(0);
}

}
/* ANIMASI TAMBAHAN */

@keyframes fadeLeft{
    from{
        opacity:0;
        transform:translateX(-40px);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}

@keyframes pulse{
    0%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.05);
    }
    100%{
        transform:scale(1);
    }
}

@keyframes float{
    0%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-8px);
    }
    100%{
        transform:translateY(0);
    }
}

@keyframes zoomSlow{
    0%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.04);
    }
    100%{
        transform:scale(1);
    }
}

/* HERO */
.hero-product{
    animation:fadeLeft .8s ease;
}

/* STATISTIK */
.stat-card{
    animation:fadeUp .8s ease;
}

.stat-card:nth-child(1){
    animation-delay:.1s;
}

.stat-card:nth-child(2){
    animation-delay:.2s;
}

.stat-card:nth-child(3){
    animation-delay:.3s;
}

.stat-card h2{
    animation:pulse 2s infinite;
}

/* CARD PRODUK */
.product-card{
    animation:fadeUp .8s ease;
}

.product-card:nth-child(1){
    animation-delay:.1s;
}

.product-card:nth-child(2){
    animation-delay:.2s;
}

.product-card:nth-child(3){
    animation-delay:.3s;
}

.product-card:nth-child(4){
    animation-delay:.4s;
}

/* BADGE STOK */
.stock-badge{
    animation:float 3s infinite ease-in-out;
}

/* GAMBAR */
.product-img{
    animation:zoomSlow 5s infinite ease-in-out;
}



.btn-sewa:hover{
    transform:translateY(-4px) scale(1.03);
    box-shadow:0 10px 20px rgba(52,152,219,.3);
}

/* FORM */
.form-box{
    transition:.3s;
}

.product-card:hover .form-box{
    background:#eef7ff;
}

/* HERO BULATAN */
.hero-product::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(255,255,255,.15);
    border-radius:50%;
    top:-70px;
    right:-70px;
    animation:float 5s infinite;
}

.hero-product{
    position:relative;
    overflow:hidden;
}
/* RESPONSIVE */
@media(max-width:768px){

.page-title{
    font-size:24px;
}

.product-card{
    padding:15px;
}

.product-img{
    height:170px;
}

}
.btn-sewa:disabled{
    background: #cbd5e1;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
    opacity: 0.7;
}
.payment-modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    backdrop-filter: blur(6px);
    justify-content:center;
    align-items:center;
    z-index:999;
}

/* ANIMASI MASUK */
.payment-content{
    background:white;
    padding:30px;
    border-radius:20px;
    width:420px;
    max-width:90%;
    animation:zoomIn .35s ease;
    position:relative;
    box-shadow:0 20px 50px rgba(0,0,0,0.2);
}

/* CLOSE BUTTON */
.close-modal{
    position:absolute;
    top:15px;
    right:15px;
    font-size:18px;
    cursor:pointer;
    color:#64748b;
}

.close-modal:hover{
    color:#e74c3c;
}

/* HEADER */
.modal-header{
    text-align:center;
    margin-bottom:15px;
}

.modal-header h3{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
}

.modal-header p{
    font-size:13px;
    color:#64748b;
}

/* INFO BOX */
.bank-box{
    background:#f1f5f9;
    padding:12px;
    border-radius:12px;
    margin-bottom:15px;
    text-align:center;
    font-size:14px;
}

/* INPUT FILE */
input[type="file"]{
    margin-bottom:10px;
}

/* ANIMASI */
@keyframes zoomIn{
    from{
        opacity:0;
        transform:scale(0.8);
    }
    to{
        opacity:1;
        transform:scale(1);
    }
}
</style>
@endsection

@section('content')

<h1 class="page-title">
     Produk Camping
</h1>

<p class="page-subtitle">
    Pilih perlengkapan camping terbaik untuk petualanganmu
</p>

<div class="content">

<div class="hero-product">

    <h1>Produk Camping</h1>

    <p>
        Pilih perlengkapan camping terbaik untuk petualanganmu
    </p>

</div>

<div class="stats">

    <div class="stat-card">
        <h2>{{ $products->count() }}</h2>
        <p>Total Produk</p>
    </div>

    <div class="stat-card">
        <h2>{{ $products->where('stock','>',0)->count() }}</h2>
        <p>Produk Tersedia</p>
    </div>

    <div class="stat-card">
        <h2>{{ $products->where('stock','<=',0)->count() }}</h2>
        <p>Stok Habis</p>
    </div>

</div>


<div class="product-container">

@forelse($products as $product)

<div class="product-card">

    @if($product->stock > 0)
        <span class="stock-badge stock-ready">
            ✅ Tersedia
        </span>
    @else
        <span class="stock-badge stock-empty">
            ❌ Habis
        </span>
    @endif

    <img
    class="product-img"
    src="{{ asset('storage/' . $product->image) }}"
    alt="{{ $product->name }}">

    <h3 class="product-title">
        {{ $product->name }}
    </h3>

    <p class="product-info">
         Stok : {{ $product->stock }}
    </p>

    <p class="product-price">
        Rp {{ number_format($product->price,0,',','.') }}/hari
    </p>

    <div class="form-box">

    <form action="{{ route('sewa.store') }}" method="POST">

        @csrf

        <input
        type="hidden"
        name="product_id"
        value="{{ $product->id }}">

       <label class="form-label">
     Tanggal Pinjam
</label>
<input
type="date"
name="rent_date"
class="form-input"
required>

<label class="form-label">
     Tanggal Kembali
</label>
<input
type="date"
name="return_date"
class="form-input"
required>

<label class="form-label">
     Qty
</label>
<input
type="number"
name="qty"
value="1"
min="1"
max="{{ $product->stock }}"
class="form-input"
required>

    <button 
    type="button"
    class="btn-sewa"
    onclick="openSewaModal(this, {{ $product->id }}, {{ $product->price }})"
    {{ $product->stock <= 0 ? 'disabled' : '' }}
>
    {{ $product->stock > 0 ? 'Sewa Sekarang' : 'Stok Habis' }}
</button>
    </form>

    </div>

</div>

@empty

<div class="empty-product">
    Tidak ada produk tersedia
</div>

@endforelse
<!-- MODAL SEWA -->
<div id="sewaModal" class="payment-modal">

    <div class="payment-content">

        <!-- tombol close -->
        <span class="close-modal" onclick="closeSewaModal()">✖</span>

        <div class="modal-header">
            <h3>Konfirmasi Sewa</h3>
            <p>Lengkapi pembayaran untuk melanjutkan</p>
        </div>

        <div class="bank-box">
            <strong>Transfer ke:</strong><br>
            BCA - 1234567890<br>
            Smartrent
        </div>

        <form id="formSewa" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="product_id" id="product_id">

            <label>Total Harga</label>
            <input type="text" id="total_harga" class="form-input" readonly>

            <label>Bukti Pembayaran</label>
            <input type="file" name="bukti" accept="image/*" required>

            <label>Foto KTP</label>
            <input type="file" name="ktp" accept="image/*" required>

            <br>

            <button type="submit" class="btn-sewa">
                 Kirim & Sewa
            </button>
        </form>

    </div>

</div>
</div>
<script>
function openSewaModal(btn, productId, price){

    let card = btn.closest('.product-card');

    let rent = card.querySelector('input[name="rent_date"]').value;
    let kembali = card.querySelector('input[name="return_date"]').value;
    let qty = card.querySelector('input[name="qty"]').value;

    if(!rent || !kembali || !qty){
        alert("Isi tanggal & qty dulu!");
        return;
    }

    let t1 = new Date(rent);
    let t2 = new Date(kembali);

    let hari = Math.ceil((t2 - t1) / (1000 * 60 * 60 * 24));

    if(hari <= 0){
        alert("Tanggal tidak valid!");
        return;
    }

    let total = price * qty * hari;

    // tampilkan modal
    document.getElementById('sewaModal').style.display = 'flex';

    // isi hidden input
    document.getElementById('product_id').value = productId;

    // TAMBAH hidden input dinamis
    let form = document.getElementById('formSewa');

   

    // hapus input lama
form.querySelectorAll('.hidden-dynamic').forEach(e => e.remove());

// buat manual (AMAN)
let inputRent = document.createElement('input');
inputRent.type = 'hidden';
inputRent.name = 'rent_date';
inputRent.value = rent;
inputRent.classList.add('hidden-dynamic');

let inputReturn = document.createElement('input');
inputReturn.type = 'hidden';
inputReturn.name = 'return_date';
inputReturn.value = kembali;
inputReturn.classList.add('hidden-dynamic');

let inputQty = document.createElement('input');
inputQty.type = 'hidden';
inputQty.name = 'qty';
inputQty.value = qty;
inputQty.classList.add('hidden-dynamic');

form.appendChild(inputRent);
form.appendChild(inputReturn);
form.appendChild(inputQty);

    // tampilkan total
    document.getElementById('total_harga').value =
        "Rp " + total.toLocaleString('id-ID');

    form.action = "/sewa";
}

function closeSewaModal(){
    document.getElementById('sewaModal').style.display = 'none';
}

window.onclick = function(e){
    let modal = document.getElementById('sewaModal');
    if(e.target === modal){
        modal.style.display = "none";
    }
}
</script>
@endsection