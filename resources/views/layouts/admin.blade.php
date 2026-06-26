<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f1f5f9;
    min-height:100vh;
}

/* DEKORASI */
.bg-decoration{
    position:fixed;
    width:400px;
    height:400px;
    border-radius:50%;
    background:rgba(79,172,254,.08);
    top:-150px;
    right:-100px;
    z-index:-1;
}

.bg-decoration2{
    position:fixed;
    width:300px;
    height:300px;
    border-radius:50%;
    background:rgba(168,85,247,.06);
    bottom:-100px;
    left:-100px;
    z-index:-1;
}
/* WRAPPER */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR MODERN */
.sidebar{
    width:260px;
    background:rgba(15,23,42,0.85);
    backdrop-filter:blur(18px);
    padding:20px;
    position:fixed;
    top:0;
    left:-260px;
    bottom:0;
    overflow-y:auto;
    box-shadow:5px 0 30px rgba(0,0,0,.3);
    transition:.35s ease;
    z-index:1000;
    border-right:1px solid rgba(255,255,255,0.08);
}

/* HEADER / PROFILE */
.sidebar .profile{
    text-align:center;
    margin-bottom:30px;
}

.sidebar .profile img{
    width:70px;
    height:70px;
    border-radius:50%;
    border:3px solid rgba(255,255,255,0.2);
    margin-bottom:10px;
}

.sidebar .profile h3{
    color:#fff;
    font-size:16px;
    font-weight:600;
}

.sidebar .profile p{
    font-size:12px;
    color:#94a3b8;
}

/* MENU */
.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:#cbd5f5;
    padding:12px 14px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
    position:relative;
}

/* ICON STYLE */
.sidebar a span{
    display:flex;
    align-items:center;
    justify-content:center;
    width:35px;
    height:35px;
    border-radius:10px;
    background:rgba(255,255,255,0.08);
    font-size:16px;
}

/* HOVER */
.sidebar a:hover{
    background:rgba(79,172,254,0.15);
    color:#fff;
    transform:translateX(6px);
}

/* ACTIVE MENU */
.sidebar a.active{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:#fff;
    font-weight:500;
}

/* GARIS AKTIF */
.sidebar a.active::before{
    content:'';
    position:absolute;
    left:-10px;
    top:50%;
    transform:translateY(-50%);
    width:5px;
    height:60%;
    border-radius:10px;
    background:#00f2fe;
}

/* LOGOUT */
.sidebar .btn-danger{
    margin-top:20px;
    border-radius:12px;
    width:100%;
}

.sidebar.show{ left:0; }

.content{
    width:100%;
    padding:30px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:white;
    margin-bottom:20px;
}

.card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:22px;
    padding:22px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    margin-bottom:20px;
}

.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    border-radius:15px;
    overflow:hidden;
}

th{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:14px;
    font-size:14px;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f5faff;
}

.btn{
    border:none;
    padding:10px 16px;
    border-radius:10px;
    color:white;
    cursor:pointer;
    transition:.3s;
    text-decoration:none;
    display:inline-block;
}

.btn:hover{
    transform:scale(1.05);
}

.btn-primary{
    background:#3498db;
}

.btn-success{
    background:#2ecc71;
}

.btn-danger{
    background:#e74c3c;
}

.btn-warning{
    background:#f39c12;
}

.badge{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    color:white;
}

.badge-primary{background:#3498db;}
.badge-success{background:#2ecc71;}
.badge-danger{background:#e74c3c;}
.badge-warning{background:#f39c12;}

.table-img{
    width:75px;
    border-radius:12px;
    transition:.3s;
}

.table-img:hover{
    transform:scale(1.1);
}

/* SCROLLBAR */
::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#4facfe;
    border-radius:20px;
}
.menu-toggle{
    position:fixed;
    top:15px;
    left:15px;
    width:50px;
    height:50px;
    border:none;
    border-radius:12px;
    background:#0f172a;
    color:white;
    font-size:24px;
    cursor:pointer;
    z-index:1100;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
}
/* RESPONSIVE */
@media(max-width:900px){

.sidebar{
    width:260px;
}

.content{
    margin-left:0;
}

}

</style>

@yield('style')

</head>
<body>

<button class="menu-toggle" onclick="toggleSidebar()">
☰
</button>

<div class="bg-decoration"></div>
<div class="bg-decoration2"></div>

<div class="wrapper">

    <div class="sidebar">

       <div class="profile">
    <img src="https://i.pravatar.cc/100" alt="admin">
    <h3>Admin</h3>
    <p>Administrator</p>
</div>

       <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
    <span>🏠</span> Dashboard
</a>

<a href="/admin/product" class="{{ request()->is('admin/product*') ? 'active' : '' }}">
    <span>📦</span> Produk
</a>

<a href="/admin/pelanggan" class="{{ request()->is('admin/pelanggan*') ? 'active' : '' }}">
    <span>👥</span> Pelanggan
</a>

<a href="/admin/transaksi" class="{{ request()->is('admin/transaksi*') ? 'active' : '' }}">
    <span>💰</span> Transaksi
</a>


<a href="/admin/peminjaman" class="{{ request()->is('admin/peminjaman*') ? 'active' : '' }}">
    <span>📥</span> Peminjaman
</a>

<a href="/admin/pengembalian" class="{{ request()->is('admin/pengembalian*') ? 'active' : '' }}">
    <span>📤</span> Pengembalian
</a>


        <a href="/logout"
           class="btn btn-danger"
           style="margin-top:20px;text-align:center;width:100%;">
            🚪 Keluar
        </a>

    </div>

    <div class="content">
        @yield('content')
    </div>

</div>

@yield('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    toast:true,
    position:'top-end',
    icon:'success',
    title:'{{ session("success") }}',
    showConfirmButton:false,
    timer:3000,
    timerProgressBar:true
});
</script>
@endif

<script>
function toggleSidebar(){
    document.querySelector('.sidebar')
    .classList.toggle('show');
}
</script>

</body>
</html>