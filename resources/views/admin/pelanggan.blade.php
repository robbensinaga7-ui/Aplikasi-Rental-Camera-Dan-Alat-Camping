@extends('layouts.admin')

@section('title','Data Pelanggan')

@section('style')
<style>

/* HERO */
.hero-customer{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    padding:25px 30px;
    border-radius:25px;
    margin-bottom:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 30px rgba(0,0,0,.12);
    position:relative;
    overflow:hidden;
}

.hero-customer::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-50px;
    right:-50px;
}

.hero-customer h1{
    margin:0;
    font-size:32px;
}

.hero-customer p{
    margin-top:8px;
    opacity:.9;
}

.hero-count{
    background:rgba(255,255,255,.2);
    padding:15px 25px;
    border-radius:15px;
    backdrop-filter:blur(10px);
    font-size:22px;
    font-weight:bold;
}

/* CARD */
.customer-card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:25px;
    padding:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* BUTTON */
.btn-add{
    background:linear-gradient(135deg,#00c853,#69f0ae);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:14px;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr{
    transition:.3s;
}

tr:hover{
    background:#f5faff;
}

.btn-warning{
    background:linear-gradient(135deg,#ff9800,#ffc107);
}

.btn-danger{
    background:linear-gradient(135deg,#ff5252,#ff1744);
}

.number{
    font-weight:bold;
    color:#0f172a;
}

@media(max-width:768px){

.hero-customer{
    flex-direction:column;
    gap:15px;
    text-align:center;
}

}
</style>
@endsection

@section('content')

<div class="hero-customer">

    <div>
        <h1>👥 Data Pelanggan</h1>
        <p>Kelola seluruh data pelanggan rental kamera dan alat camping</p>
    </div>

    <div class="hero-count">
        {{ count($data) }} Pelanggan
    </div>

</div>

<div class="customer-card">

    <div style="margin-bottom:20px;">

        <a href="/admin/pelanggan/create"
           class="btn btn-add">
            ➕ Tambah Pelanggan
        </a>

    </div>

    <div class="table-box">

        <table>

            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $p)

            <tr>

                <td class="number">
                    {{ $p->id }}
                </td>

                <td>{{ $p->name }}</td>

                <td>{{ $p->email }}</td>

                <td>{{ $p->phone }}</td>

                <td>{{ $p->address }}</td>

                <td>

                    <a href="/admin/pelanggan/edit/{{ $p->id }}"
                       class="btn btn-warning">
                        ✏ Edit
                    </a>

                    <a href="/admin/pelanggan/delete/{{ $p->id }}"
                       class="btn btn-danger"
                       onclick="return confirm('Yakin hapus pelanggan?')">
                        🗑 Hapus
                    </a>

                </td>

            </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection