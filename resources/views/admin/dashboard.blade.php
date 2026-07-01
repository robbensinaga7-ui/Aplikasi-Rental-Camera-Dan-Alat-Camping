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
.hero-dashboard,
.card,
.card-stat{
    opacity:0;
    transform:translateY(30px);
    animation:fadeUp .8s ease forwards;
}

.card-stat:nth-child(1){animation-delay:.1s;}
.card-stat:nth-child(2){animation-delay:.2s;}
.card-stat:nth-child(3){animation-delay:.3s;}
.card-stat:nth-child(4){animation-delay:.4s;}
.card-stat:nth-child(5){animation-delay:.5s;}
.card-stat:nth-child(6){animation-delay:.6s;}
.card-stat:nth-child(7){animation-delay:.7s;}
.card-stat:nth-child(8){animation-delay:.8s;}

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
.hero-dashboard{
    position:relative;
    overflow:hidden;
}

.hero-dashboard::before{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(255,255,255,.15);
    border-radius:50%;
    top:-80px;
    right:-80px;
    animation:float 6s ease-in-out infinite;
}

.hero-dashboard::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.1);
    border-radius:50%;
    bottom:-50px;
    left:-50px;
    animation:float 8s ease-in-out infinite;
}

@keyframes float{
    0%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-20px);
    }
    100%{
        transform:translateY(0);
    }
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
    transform:translateY(-10px) scale(1.03);
    box-shadow:
        0 20px 40px rgba(0,0,0,.2),
        0 0 25px rgba(255,255,255,.4);
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
.activity-item{
    opacity:0;
    transform:translateX(-20px);
    animation:slideIn .6s ease forwards;
}

.activity-item:nth-child(1){animation-delay:.1s;}
.activity-item:nth-child(2){animation-delay:.2s;}
.activity-item:nth-child(3){animation-delay:.3s;}
.activity-item:nth-child(4){animation-delay:.4s;}
.activity-item:nth-child(5){animation-delay:.5s;}

@keyframes slideIn{
    from{
        opacity:0;
        transform:translateX(-20px);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}
}
/* TOP PROFILE HEADER */
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
    width:65px;
    height:65px;
    border-radius:50%;
}

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
<div class="top-profile">

    <div class="left">
        <img src="https://i.pravatar.cc/100" alt="admin">
        <div>
            <p>Selamat datang kembali,</p>
            <h2>Admin 👋</h2>
            <span class="role">Administrator</span>
        </div>
    </div>

    <div class="right">
        <div class="info-box">
            📅 <div>
                <small>Tanggal</small>
                <b>{{ date('d M Y') }}</b>
            </div>
        </div>

        <div class="info-box">
            ⏰ <div>
                <small>Waktu</small>
                <b id="jam"></b>
            </div>
        </div>
    </div>

</div>
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
         Aktivitas Terbaru
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
    animation:{
        animateRotate:true,
        animateScale:true,
        duration:2000
    },
    plugins:{
        legend:{
            position:'bottom'
        }
    }
}

});

}
document.querySelectorAll('.counter').forEach(counter => {

    let target = parseInt(counter.innerText.replace(/\D/g,''));

    if(isNaN(target)) return;

    let count = 0;
    let speed = target / 80;

    const update = () => {

        count += speed;

        if(count < target){
            counter.innerText = Math.floor(count);
            requestAnimationFrame(update);
        }else{
            counter.innerText = target.toLocaleString('id-ID');
        }

    }

    update();

});

</script>
<script>
function updateJam(){
    const now = new Date();
    let jam = now.getHours().toString().padStart(2,'0');
    let menit = now.getMinutes().toString().padStart(2,'0');
    let detik = now.getSeconds().toString().padStart(2,'0');

    document.getElementById('jam').innerHTML = jam+':'+menit+':'+detik;
}
setInterval(updateJam,1000);
updateJam();
</script>

@endsection