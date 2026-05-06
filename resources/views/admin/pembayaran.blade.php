@extends('layouts.admin')

@section('title','Konfirmasi Pembayaran')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    margin-bottom:20px;
}

/* CARD CONTAINER */
.card-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:25px;
}

/* CARD TOP */
.card-top{
    position:relative;
    overflow:hidden;
    padding:24px;
    border-radius:20px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.4s;
}

.card-top:hover{
    transform:translateY(-8px);
}

.card-top::before{
    content:'';
    position:absolute;
    top:0;
    left:-120%;
    width:100%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.25),
        transparent
    );
    transition:0.6s;
}

.card-top:hover::before{
    left:120%;
}

.card-top h4{
    font-size:15px;
    font-weight:500;
    margin-bottom:10px;
}

.card-top p{
    font-size:30px;
    font-weight:bold;
}

.card-icon{
    position:absolute;
    right:20px;
    bottom:15px;
    font-size:42px;
    opacity:0.2;
}

/* CARD COLORS */
.card-blue{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

.card-orange{
    background:linear-gradient(135deg,#f6b93b,#fa983a);
}

.card-green{
    background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.card-red{
    background:linear-gradient(135deg,#ff6b6b,#ff758c);
}

/* TABLE CARD */
.payment-card{
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
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

/* BODY */
td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

tr:hover{
    background:#f8fbff;
    transition:0.3s;
}

/* IMAGE */
.payment-img{
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:14px;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.payment-img:hover{
    transform:scale(1.08);
}

/* BUTTON */
.btn{
    border:none;
    padding:8px 14px;
    border-radius:10px;
    cursor:pointer;
    color:white;
    transition:0.3s;
    font-size:13px;
}

.btn:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

.btn-acc{
    background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.btn-tolak{
    background:linear-gradient(135deg,#ff6b6b,#ff758c);
}

/* BADGE */
.badge{
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    color:white;
    font-weight:500;
}

.pending{
    background:#f39c12;
}

.approved{
    background:#2ecc71;
}

.rejected{
    background:#e74c3c;
}

/* TOTAL */
.total-price{
    font-weight:600;
    color:#2c3e50;
}

/* RESPONSIVE */
@media(max-width:768px){

.card-top p{
    font-size:24px;
}

th,
td{
    font-size:13px;
    padding:10px;
}

.payment-img{
    width:70px;
    height:70px;
}

.btn{
    padding:6px 10px;
    font-size:12px;
}

}

</style>
@endsection

@section('content')

<h1 class="page-title">
    💳 Konfirmasi Pembayaran
</h1>

<!-- TOP CARD -->
<div class="card-container">

    <div class="card-top card-blue">
        <h4>Total Transaksi</h4>
        <p>{{ count($transactions) }}</p>
        <div class="card-icon">📊</div>
    </div>

    <div class="card-top card-orange">
        <h4>Pending</h4>
        <p>{{ $transactions->where('payment_status','pending')->count() }}</p>
        <div class="card-icon">⏳</div>
    </div>

    <div class="card-top card-green">
        <h4>Disetujui</h4>
        <p>{{ $transactions->where('payment_status','approved')->count() }}</p>
        <div class="card-icon">✔</div>
    </div>

    <div class="card-top card-red">
        <h4>Ditolak</h4>
        <p>{{ $transactions->where('payment_status','rejected')->count() }}</p>
        <div class="card-icon">✖</div>
    </div>

</div>

<!-- TABLE -->
<div class="payment-card">

<div class="table-box">

<table>

    <tr>
        <th>Produk</th>
        <th>User</th>
        <th>Total</th>
        <th>Bukti</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($transactions as $t)

    <tr>

        <td>
            {{ $t->product->name }}
        </td>

        <td>
            {{ $t->user->name ?? '-' }}
        </td>

        <td class="total-price">
            Rp {{ number_format($t->price + $t->fine,0,',','.') }}
        </td>

        <!-- IMAGE -->
        <td>

            @if($t->payment_proof)

                <img
                class="payment-img"
                src="{{ asset('storage/'.$t->payment_proof) }}">

            @else

                -

            @endif

        </td>

        <!-- STATUS -->
        <td>

            @if($t->payment_status == 'pending')

                <span class="badge pending">
                    Pending
                </span>

            @elseif($t->payment_status == 'approved')

                <span class="badge approved">
                    Disetujui
                </span>

            @elseif($t->payment_status == 'rejected')

                <span class="badge rejected">
                    Ditolak
                </span>

            @endif

        </td>

        <!-- BUTTON -->
        <td>

            @if($t->payment_status == 'pending')

                <form
                action="/admin/acc/{{ $t->id }}"
                method="POST"
                style="display:inline;">

                    @csrf

                    <button class="btn btn-acc">
                        ✔
                    </button>

                </form>

                <form
                action="/admin/tolak/{{ $t->id }}"
                method="POST"
                style="display:inline;">

                    @csrf

                    <button class="btn btn-tolak">
                        ✖
                    </button>

                </form>

            @else

                ✔

            @endif

        </td>

    </tr>

    @endforeach

</table>

</div>

</div>

@endsection