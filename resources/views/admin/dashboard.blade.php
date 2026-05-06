<!-- dashboard.blade.php -->

@extends('layouts.admin')

@section('title','Dashboard')

@section('style')
<style>

.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}

.card-stat{
    border-radius:20px;
    padding:25px;
    color:white;
    transition:.4s;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.card-stat:hover{
    transform:translateY(-8px);
}

.card-blue{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.card-green{
    background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.card-orange{
    background:linear-gradient(135deg,#f6d365,#fda085);
}

.card-purple{
    background:linear-gradient(135deg,#a18cd1,#fbc2eb);
}

.card-red{
    background:linear-gradient(135deg,#ff758c,#ff7eb3);
}

.card-stat h3{
    margin-top:10px;
    font-size:16px;
}

.card-stat p{
    font-size:30px;
    font-weight:bold;
    margin-top:10px;
}

.chart-box{
    width:350px;
    height:350px;
    margin:auto;
}

.activity-item{
    padding:10px 0;
    border-bottom:1px solid #eee;
}

</style>
@endsection

@section('content')

<h1 class="page-title">Dashboard Admin</h1>

<!-- CARD STAT -->
<div class="stats">

    <div class="card-stat card-blue">
        📦
        <h3>Produk</h3>
        <p>{{ $productCount }}</p>
    </div>

    <div class="card-stat card-green">
        💰
        <h3>Transaksi</h3>
        <p>{{ $transaksiCount }}</p>
    </div>

    <div class="card-stat card-orange">
        📋
        <h3>Booking</h3>
        <p>{{ $totalBooking }}</p>
    </div>

    <div class="card-stat card-purple">
        💵
        <h3>Pendapatan</h3>
        <p>Rp {{ number_format($totalPendapatan,0,',','.') }}</p>
    </div>

    <div class="card-stat card-red">
        💳
        <h3>Pending</h3>
        <p>{{ $pendingPembayaran }}</p>
    </div>

</div>

<!-- CHART -->
<div class="card">

    <h3 style="text-align:center;margin-bottom:20px;">
        📊 Status Transaksi
    </h3>

    <div class="chart-box">
        <canvas id="chartTransaksi"></canvas>
    </div>

</div>

<!-- AKTIVITAS -->
<div class="card">

    <h3 style="margin-bottom:15px;">
        🕒 Aktivitas Terbaru
    </h3>

    @foreach($latestTransaksi as $t)

    <div class="activity-item">
        Transaksi baru oleh
        <b>{{ $t->user->name ?? '-' }}</b>
        pada {{ $t->created_at }}
    </div>

    @endforeach

</div>

@endsection

@section('script')

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const labels = @json($labels ?? []);
const data = @json($data ?? []);

if(data.length !== 0){

new Chart(document.getElementById('chartTransaksi'), {

    type:'pie',

    data:{
        labels:labels,

        datasets:[{
            data:data,

            backgroundColor:[
                '#f39c12',
                '#2ecc71',
                '#3498db',
                '#e74c3c'
            ],

            borderWidth:2,
            borderColor:'#fff'
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                position:'bottom'
            }
        }
    }

});

}

</script>

@endsection