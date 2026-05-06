
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
    background:linear-gradient(135deg,#eef2f7,#f8fbff);
}

/* WRAPPER */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar{
    width:240px;
    background:linear-gradient(180deg,#1e293b,#334155);
    padding:20px;
    position:fixed;
    top:0;
    left:0;
    bottom:0;
    overflow-y:auto;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:35px;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    color:white;
    padding:13px 15px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar a:hover,
.sidebar a.active{
    background:rgba(255,255,255,0.15);
    transform:translateX(5px);
}

/* CONTENT */
.content{
    margin-left:240px;
    width:100%;
    padding:25px;
}

/* TITLE */
.page-title{
    font-size:28px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:20px;
}

/* CARD */
.card{
    background:white;
    border-radius:18px;
    padding:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    margin-bottom:20px;
}

/* TABLE */
.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:linear-gradient(135deg,#1e293b,#334155);
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
    background:#f8fbff;
}

/* BUTTON */
.btn{
    border:none;
    padding:8px 14px;
    border-radius:8px;
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

/* BADGE */
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

/* IMAGE */
.table-img{
    width:75px;
    border-radius:10px;
    transition:.3s;
}

.table-img:hover{
    transform:scale(1.1);
}

/* RESPONSIVE */
@media(max-width:900px){

.sidebar{
    width:100%;
    position:relative;
}

.content{
    margin-left:0;
}

.wrapper{
    flex-direction:column;
}

}

</style>

@yield('style')

</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>🏕 Admin</h2>

        <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="/admin/product" class="{{ request()->is('admin/product*') ? 'active' : '' }}">
            📦 Produk
        </a>

        <a href="/admin/transaksi" class="{{ request()->is('admin/transaksi*') ? 'active' : '' }}">
            💰 Transaksi
        </a>

        <a href="/admin/pembayaran" class="{{ request()->is('admin/pembayaran*') ? 'active' : '' }}">
            💳 Pembayaran
        </a>

        <a href="/admin/peminjaman" class="{{ request()->is('admin/peminjaman*') ? 'active' : '' }}">
            📥 Peminjaman
        </a>

        <a href="/admin/pengembalian" class="{{ request()->is('admin/pengembalian*') ? 'active' : '' }}">
            📤 Pengembalian
        </a>

        <a href="/logout" class="btn btn-danger" style="margin-top:20px;text-align:center;width:100%;">
            🚪 Keluar
        </a>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

@yield('script')

</body>
</html>