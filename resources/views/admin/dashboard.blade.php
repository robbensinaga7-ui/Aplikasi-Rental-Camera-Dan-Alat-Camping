@extends('layouts.admin')

@section('title','Dashboard')

@section('style')
<style>

.hero-dashboard{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:30px;
    border-radius:25px;
    margin-bottom:25px;
    box-shadow:0 15px 30px rgba(0,0,0,.15);
}

.hero-dashboard h1{
    font-size:35px;
    margin-bottom:8px;
}

.hero-dashboard p{
    opacity:.9;
    font-size:15px;
}

.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card-stat{
    border-radius:25px;
    padding:25px;
    color:white;
    transition:.4s;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    position:relative;
    overflow:hidden;
}

.card-stat::before{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    background:rgba(255,255,255,.15);
    border-radius:50%;
    top:-30px;
    right:-30px;
}

.card-stat::after{
    content:'';
    position:absolute;
    width:70px;
    height:70px;
    background:rgba(255,255,255,.1);
    border-radius:50%;
    bottom:-20px;
    left:-20px;
}

.card-stat:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.2);
}

.card-blue{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.card-teal{
    background:linear-gradient(135deg,#11998e,#38ef7d);
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

.card-cyan{
    background:linear-gradient(135deg,#36d1dc,#5b86e5);
}

.card-pink{
    background:linear-gradient(135deg,#ff9a9e,#fad0c4);
}

.card-stat h3{
    margin-top:10px;
    font-size:18px;
    font-weight:600;
}

.card-stat p{
    font-size:36px;
    font-weight:bold;
    margin-top:10px;
}

.card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:25px;
    padding:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    margin-top:25px;
}

.chart-box{
    width:450px;
    height:450px;
    margin:auto;
}

.activity-item{
    background:#f8fafc;
    border-left:5px solid #4facfe;
    border-radius:15px;
    padding:15px;
    margin-bottom:12px;
    transition:.3s;
}

.activity-item:hover{
    transform:translateX(5px);
    background:#eef7ff;
}

@media(max-width:768px){

    .chart-box{
        width:100%;
        height:320px;
    }

    .hero-dashboard h1{
        font-size:28px;
    }

}
</style>
@endsection

@section('content')

<div class="hero-dashboard">
    <h1>🏕 Dashboard Admin</h1>
    <p>
        Selamat datang di Sistem Rental Kamera & Alat Camping
    </p>
</div>

<div class="stats">

    <x-admin-stat
        color="card-blue"
        icon="📦"
        title="Produk"
        :value="$productCount"
    />

    <x-admin-stat
        color="card-blue"
        icon="👥"
        title="Pelanggan"
        :value="$pelangganCount"
    />

    <x-admin-stat
        color="card-green"
        icon="💰"
        title="Transaksi"
        :value="$transaksiCount"
    />

    <x-admin-stat
        color="card-orange"
        icon="📋"
        title="Booking"
        :value="$totalBooking"
    />

    <x-admin-stat
        color="card-cyan"
        icon="📥"
        title="Peminjaman"
        :value="$peminjamanCount"
    />

    <x-admin-stat
        color="card-pink"
        icon="📤"
        title="Pengembalian"
        :value="$pengembalianCount"
    />

    <x-admin-stat
        color="card-purple"
        icon="💵"
        :title="'Pendapatan'"
        :value="'Rp '.number_format($totalPendapatan,0,',','.')"
    />

    <x-admin-stat
        color="card-red"
        icon="💳"
        title="Pending"
        :value="$pendingPembayaran"
    />

</div>

<div class="card">

    <h3 style="text-align:center;margin-bottom:20px;">
        📊 Status Transaksi
    </h3>

    <div class="chart-box">
        <canvas id="chartTransaksi"></canvas>
    </div>

</div>

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const labels = {!! json_encode($labels ?? []) !!};
const data = {!! json_encode($data ?? []) !!};

if(data.length !== 0){

new Chart(document.getElementById('chartTransaksi'), {

    type:'doughnut',

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
            borderWidth:3,
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