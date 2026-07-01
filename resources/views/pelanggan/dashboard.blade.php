@extends('layouts.pelanggan')

@section('title','Dashboard Pelanggan')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    font-size:30px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:10px;
}

/* CARD */
.welcome-card{
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:25px;
}

.welcome-card h3{
    color:#2c3e50;
    margin-bottom:8px;
}

.welcome-card p{
    color:#64748b;
}

/* SECTION TITLE */
.section-title{
    margin-bottom:15px;
    color:#1e293b;
}

/* TABLE CARD */
.table-card{
    background:white;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    overflow:hidden;
}

/* TABLE */
.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

/* HEADER */
th{
    background:linear-gradient(135deg,#1e293b,#334155);
    color:white;
    padding:14px;
    font-size:14px;
    white-space:nowrap;
}
/* DECORATION */
.dashboard-wrapper{
    position:relative;
}

.dashboard-wrapper::before{
    content:'';
    position:fixed;
    width:350px;
    height:350px;
    border-radius:50%;
    background:rgba(52,152,219,.08);
    top:-100px;
    right:-100px;
    z-index:-1;
}

.dashboard-wrapper::after{
    content:'';
    position:fixed;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(108,92,231,.08);
    bottom:-80px;
    left:-80px;
    z-index:-1;
}

/* HERO */
.hero-dashboard{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:30px;
    border-radius:25px;
    margin-bottom:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
    position:relative;
    overflow:hidden;
}

.hero-dashboard::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-70px;
    right:-70px;
}

.hero-dashboard h1{
    font-size:36px;
    margin-bottom:10px;
}

/* STATS */
.stats{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:25px;
}

.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    background:white;
    padding:30px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-card h3{
    font-size:40px;
    margin-bottom:8px;
    color:#2563eb;
}

.stat-card p{
    color:#64748b;
    font-weight:600;
}

/* TABLE HEADER */
th{
    background:linear-gradient(135deg,#3498db,#6c5ce7);
}

/* TABLE CARD */
.table-card{
    border-radius:25px;
}

/* TABLE ROW */
tbody tr:hover{
    background:#eef6ff;
}

/* TOTAL */
.total-price{
    color:#3498db;
    font-weight:700;
}

/* STATUS */
.badge{
    box-shadow:0 4px 10px rgba(0,0,0,.08);
}
/* BODY */
td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

tr{
    transition:0.3s;
}

tr:hover{
    background:#f8fbff;
}

/* BADGE */
.badge{
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
}

.badge-belum{
    background:#fdecea;
    color:#e74c3c;
}

.badge-pending{
    background:#fff4e5;
    color:#f39c12;
}

.badge-lunas{
    background:#e8f8f0;
    color:#27ae60;
}

/* BUTTON */
.btn-ajukan{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#3498db,#6c9cff);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}

.btn-bayar{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#f39c12,#f7b731);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}
.btn-batal{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#e74c3c,#ff6b6b);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}

.btn-batal:hover{
    transform:translateY(-2px);
    opacity:0.95;
}
.btn-ajukan:hover,
.btn-bayar:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* IMAGE */
.bukti-img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:12px;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.bukti-img:hover{
    transform:scale(1.08);
}

/* FILE */
input[type=file]{
    width:100%;
    font-size:12px;
    margin-top:5px;
}
.modal-img{
    display:none;
    position:fixed;
    z-index:9999;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.85);
    justify-content:center;
    align-items:center;
}

.modal-img img{
    max-width:90%;
    max-height:90%;
    border-radius:15px;
}

.close-modal{
    position:absolute;
    top:20px;
    right:30px;
    color:white;
    font-size:40px;
    cursor:pointer;
}
.payment-modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.7);
    z-index:9999;
    justify-content:center;
    align-items:center;
}

.payment-content{
    background:white;
    width:450px;
    max-width:90%;
    border-radius:20px;
    padding:25px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.payment-content h3{
    margin-bottom:15px;
    color:#2563eb;
}

.payment-content p{
    margin:10px 0;
    font-size:16px;
}
/* RESPONSIVE */
@media(max-width:768px){

.page-title{
    font-size:24px;
}

th,
td{
    font-size:12px;
    padding:10px;
}

.bukti-img{
    width:65px;
    height:65px;
}

}
/* ANIMATION */
@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

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
        transform:translateY(-10px);
    }
    100%{
        transform:translateY(0);
    }
}

/* HERO */
.hero-dashboard{
    animation:fadeLeft .8s ease;
}

/* STATS */
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

/* ANGKA STATISTIK */
.stat-card h3{
    animation:pulse 2s infinite;
}

/* TITLE */
.section-title{
    animation:fadeLeft 1s ease;
}

/* TABLE */
.table-card{
    animation:fadeUp 1s ease;
}

/* BUTTON */
.btn-ajukan,
.btn-bayar,
.btn-batal{
    transition:.3s;
}

.btn-ajukan:hover,
.btn-bayar:hover,
.btn-batal:hover{
    transform:translateY(-3px) scale(1.05);
}

/* BADGE */
.badge{
    animation:none;
}

/* IMAGE */
.bukti-img{
    transition:.4s;
}

.bukti-img:hover{
    transform:scale(1.15) rotate(2deg);
}

/* HERO CIRCLE */
.hero-dashboard::before{
    animation:float 5s infinite ease-in-out;
}
/* TOP PROFILE */
.top-profile{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(255,255,255,0.7);
    backdrop-filter:blur(15px);
    padding:20px 25px;
    border-radius:20px;
    margin-bottom:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

/* LEFT */
.top-profile .left{
    display:flex;
    align-items:center;
    gap:15px;
}

.top-profile .left img{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #4facfe;
    image-rendering:-webkit-optimize-contrast;
}

/* TEXT */
.top-profile .left p{
    font-size:13px;
    color:#64748b;
}

.top-profile .left h2{
    font-size:22px;
    font-weight:700;
}

.top-profile .role{
    background:#4facfe;
    color:white;
    font-size:11px;
    padding:4px 10px;
    border-radius:20px;
}

/* RIGHT */
.top-profile .right{
    display:flex;
    gap:15px;
}

.info-box{
    display:flex;
    align-items:center;
    gap:10px;
    background:white;
    padding:10px 15px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
    font-size:13px;
}
</style>
@endsection

@section('content')

<div class="dashboard-wrapper">
<div class="top-profile">

    <div class="left">
      <img 
    src="{{ Auth::user()->photo 
        ? asset('uploads/profile/'.Auth::user()->photo) 
        : 'https://i.pravatar.cc/300' }}"
    alt="Foto Profil"
    loading="lazy"
>

        <div>
            <p>Selamat datang kembali,</p>
            <h2>{{ Auth::user()->name }} 👋</h2>
            <span class="role">Pelanggan</span>
        </div>
    </div>

    <div class="right">
        <div class="info-box">
             <div>
                <small>Tanggal</small>
                <b>{{ date('d M Y') }}</b>
            </div>
        </div>

        <div class="info-box">
             <div>
                <small>Waktu</small>
                <b id="jam"></b>
            </div>
        </div>
    </div>

</div>
@if(session('error'))
<div style="
    background:#fee2e2;
    color:#b91c1c;
    padding:12px;
    border-radius:12px;
    margin-bottom:15px;
    font-weight:600;">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div style="
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:12px;
    margin-bottom:15px;
    font-weight:600;">
    {{ session('success') }}
</div>
@endif

<div class="hero-dashboard">
    <h2>👋 Halo, {{ $name }}</h2>
    <p>
        Selamat datang di sistem rental camping.
        Kelola peminjaman dan pantau status transaksi Anda dengan mudah.
    </p>
</div>

<div class="stats">

    <div class="stat-card">
        <h3>{{ $transactions->count() }}</h3>
        <p>Total Transaksi</p>
    </div>

    <div class="stat-card">
        <h3>{{ $transactions->where('status','dipinjam')->count() }}</h3>
        <p>Sedang Dipinjam</p>
    </div>

    <div class="stat-card">
        <h3>{{ $transactions->where('status','dikembalikan')->count() }}</h3>
        <p>Selesai</p>
    </div>

</div>

<!-- TITLE -->
<h2 class="section-title">
     Riwayat Peminjaman
</h2>

<!-- TABLE -->
<div class="table-card">

<div class="table-box">

<table>

<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Sewa</th>
    <th>Kembali</th>
    <th>Tanggal kembalikan Barang</th>
    <th>Total</th>
    <th>Detail Biaya</th>
    <th>Kondisi</th>
    <th>Status</th>
    <th>Status Bayar</th>
    <th>Dokumen</th>
    <th>Upload Foto Barang Rusak</th>
</tr>

@foreach($transactions as $t)

<tr @if($t->fine_preview > 0) style="background:#fff5f5;" @endif>

    <td>
        {{ $t->product->name ?? '-' }}
    </td>

    <td>
        {{ $t->qty }}
    </td>

    <td>
        {{ \Carbon\Carbon::parse($t->rent_date)->format('d M Y') }}
    </td>

    <td>
        {{ \Carbon\Carbon::parse($t->return_date)->format('d M Y') }}
    </td>

    <td>
@if($t->returned_at)

    {{ \Carbon\Carbon::parse($t->returned_at)->format('d M Y') }}

@else

    <span style="color:#94a3b8;">
        Belum dikembalikan
    </span>

@endif
</td>


   <td class="total-price">
Rp {{ number_format(
    ($t->price ?? 0)
    + ($t->fine_late ?? 0)
    + ($t->fine_damage ?? 0)
    + ($t->fine_lost ?? 0)
,0,',','.') }}
</td>

<td>
    Sewa: Rp {{ number_format($t->price,0,',','.') }} <br>

    @if($t->fine_late > 0)
         Telat: Rp {{ number_format($t->fine_late,0,',','.') }} <br>
    @endif

    @if($t->fine_damage > 0)
         Rusak: Rp {{ number_format($t->fine_damage,0,',','.') }} <br>
    @endif

    @if($t->fine_lost > 0)
         Hilang: Rp {{ number_format($t->fine_lost,0,',','.') }}
    @endif

    @if(
        $t->fine_late == 0 &&
        $t->fine_damage == 0 &&
        $t->fine_lost == 0
    )
        <span style="color:green;"> Tidak ada denda</span>
    @endif
    @if($t->status == 'dipinjam' && $t->fine_preview > 0)
    <br>
    <span style="color:red;">
        ⚠️ Estimasi telat {{  $t->late_days_preview}} hari<br>
        Denda: Rp {{ number_format($t->fine_preview,0,',','.') }}
    </span>
    <br>
    <small style="color:#f39c12;">
        *Denda final ditentukan admin saat pengembalian
    </small>
@endif
</td>
<td>
    @if($t->status == 'dikembalikan')

        @if(($t->fine_lost ?? 0) > 0)
        <span class="badge badge-belum"> Hilang</span>

    @elseif(($t->fine_damage ?? 0) > 0)
        <span class="badge badge-pending"> Rusak</span>

    @else
        <span class="badge badge-lunas"> Baik</span>
    @endif

    @else
        <span style="color:#94a3b8;">-</span>
    @endif
</td>
    <!-- STATUS -->
<td>

    @if($t->status == 'dipinjam')

        <span class="badge badge-pending">
            Dipinjam
        </span>

      <form action="/ajukan-kembali/{{ $t->id }}" method="POST">
    @csrf

    <button class="btn-ajukan">
        Ajukan Pengembalian
    </button>
</form>

        <form action="/batalkan/{{ $t->id }}" method="POST">

            @csrf

            <button
                type="submit"
                class="btn-batal"
                onclick="return confirm('Yakin ingin membatalkan pesanan?')">
                 Batalkan Pesanan
            </button>

        </form>

    @elseif($t->status == 'menunggu_konfirmasi')

       <span class="badge badge-pending">
    Dicek Admin
</span>

<br>
<small style="color:#64748b;">
    Barang sedang diperiksa
</small>

    @elseif($t->status == 'dikembalikan')

        <span class="badge badge-lunas">
            Dikembalikan
        </span>

    @elseif($t->status == 'ditolak')

        <span class="badge badge-belum">
            Ditolak
        </span>

    @elseif($t->status == 'dibatalkan')

        <span class="badge badge-belum">
            Dibatalkan
        </span>

    @endif

</td>

   <!-- PAYMENT -->
<td>

   @if($t->payment_status == 'pending')
    <span class="badge badge-pending">Menunggu</span>

@elseif($t->payment_status == 'approved')
    <span class="badge badge-lunas">Lunas</span>

@elseif($t->payment_status == 'rejected')
    <span class="badge badge-belum">Ditolak</span>

@elseif($t->payment_status == 'dibatalkan')
    <span class="badge badge-belum">Dibatalkan</span>
@endif

</td>

<td>

@if($t->payment_proof && $t->ktp_image)

    <div>
        <b> Dokumen Lengkap</b><br>

    <a href="javascript:void(0)"
  data-image="{{ url('storage/'.$t->payment_proof) }}"
   onclick="showImage(this.dataset.image); return false;">
    Lihat Bukti
</a>

|

<a href="javascript:void(0)"
   data-image="{{ url('storage/'.$t->ktp_image) }}"
   onclick="showImage(this.dataset.image); return false;">
   🪪 Lihat KTP
</a>
    </div>

@else
<button
    type="button"
    class="btn-bayar"
    onclick="openPaymentModal()">
     Lihat Rekening Tujuan
</button>

<br><br>
<form
    action="{{ route('transaksi.uploadDokumen',$t->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <label>Bukti Pembayaran</label>
    <input type="file" name="bukti" accept="image/*" required>

    <br><br>

    <label>Foto KTP</label>
    <input type="file" name="ktp" accept="image/*" required>

    <br><br>

    <button type="submit" class="btn-bayar">
        Upload Dokumen
    </button>

</form>

@endif

</td>
<td>

@if($t->damage_photo)
    <a href="javascript:void(0)"
       data-image="{{ url('storage/'.$t->damage_photo) }}"
       onclick="showImage(this.dataset.image); return false;">
        Lihat Foto
    </a>

@elseif($t->status == 'dipinjam')

    <form action="{{ route('transaksi.uploadRusak',$t->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="foto_rusak" accept="image/*" required>

        <br><br>

        <button type="submit" class="btn-bayar">
            Upload
        </button>
    </form>

@else
    <span style="color:#94a3b8;">-</span>
@endif

</td>
</tr>

@endforeach

</table>

<!-- MODAL GAMBAR -->
<div id="imageModal" class="modal-img">
    <span class="close-modal" onclick="closeImage()">&times;</span>
    <img id="modalImage">
</div>

<!-- MODAL PEMBAYARAN -->
<div id="paymentModal" class="payment-modal">

    <div class="payment-content">

        <h3> Informasi Pembayaran</h3>

        <p><strong>Bank:</strong> BCA</p>

        <p><strong>No Rekening:</strong><br>1234567890</p>

        <p><strong>Atas Nama:</strong><br>Rental Camping</p>

        <button class="btn-batal" onclick="closePaymentModal()">
            Tutup
        </button>

    </div>

</div>

<script>
function showImage(src){
    document.getElementById('imageModal').style.display='flex';
    document.getElementById('modalImage').src=src;
}

function closeImage(){
    document.getElementById('imageModal').style.display='none';
}

function openPaymentModal(){
    document.getElementById('paymentModal').style.display='flex';
}

function closePaymentModal(){
    document.getElementById('paymentModal').style.display='none';
}
</script>
<script>
function updateJam(){
    const now = new Date();
    let jam = now.getHours().toString().padStart(2,'0');
    let menit = now.getMinutes().toString().padStart(2,'0');
    let detik = now.getSeconds().toString().padStart(2,'0');

    document.getElementById('jam').innerHTML =
        jam+':'+menit+':'+detik;
}

setInterval(updateJam,1000);
updateJam();
</script>
@endsection