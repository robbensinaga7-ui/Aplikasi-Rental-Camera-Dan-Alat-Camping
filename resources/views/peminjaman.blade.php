<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 220px;
    background: linear-gradient(180deg,#0f2027,#203a43,#2c5364);
    color: white;
    padding: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
    transform: translateX(5px);
}

.content {
    flex: 1;
    background: #f4f6f9;
    padding: 20px;
}

.header {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.box {
    background: white;
    padding: 25px; /* tambah jarak dalam box */
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* jarak tabel dari atas */
.table {
    margin-top: 15px;
}

/* kasih padding biar isi tabel lega */
table th, table td {
    padding: 12px !important;
}

/* biar tabel gak terlalu sempit */
table {
    width: 100%;
    border-collapse: collapse;
}
</style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🏕 Admin</h2>

        <a href="/admin">Dashboard</a>
        <a href="/admin/product">Produk</a>
        <a href="/admin/transaksi">Transaksi</a>
        <a href="/peminjaman">Peminjaman</a>
        <a href="/pengembalian">Pengembalian</a>

        <form action="/logout" method="POST" style="margin-top:20px;">
            @csrf
            <button style="
                width:100%;
                padding:12px;
                border:none;
                border-radius:10px;
                background:#e74c3c;
                color:white;
                cursor:pointer;
            ">
                🚪 Keluar
            </button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="header">
            <h2>Data Peminjaman</h2>
        </div>

        <div class="box">

            <table class="table table-bordered text-center">
                <thead style="background-color:#a8c3b8;">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($peminjaman as $i => $item)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->barang }}</td>
                        <td>{{ $item->tgl_pinjam }}</td>
                        <td>{{ $item->tgl_kembali }}</td>
                        <td>{{ $item->durasi }}</td>

                        <td>
                            @if($item->status == 'dipinjam')
                                <span class="badge bg-warning">Dipinjam</span>
                            @elseif($item->status == 'terlambat')
                                <span class="badge bg-danger">Terlambat</span>
                            @else
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>

                        <td>
                            <a href="/peminjaman/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="/kembalikan/{{ $item->id }}" class="btn btn-sm btn-success">Kembalikan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>

</body>
</html>