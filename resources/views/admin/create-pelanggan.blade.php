@extends('layouts.admin')

@section('title','Tambah Pelanggan')

@section('content')

<style>

.form-container{
    max-width:700px;
    margin:auto;
}

.form-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.form-header{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    text-align:center;
    padding:30px;
}

.form-header h2{
    margin-bottom:8px;
}

.form-body{
    padding:30px;
}

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
}

.form-control{
    width:100%;
    padding:12px 15px;
    border:1px solid #dbe2ea;
    border-radius:12px;
    transition:.3s;
}

.form-control:focus{
    outline:none;
    border-color:#3498db;
    box-shadow:0 0 0 4px rgba(52,152,219,0.15);
}

.btn-save{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}

.btn-back{
    background:linear-gradient(135deg,#e74c3c,#ff6b6b);
    color:white;
    text-decoration:none;
    padding:12px 25px;
    border-radius:12px;
    margin-left:10px;
    font-weight:600;
}

.btn-save:hover,
.btn-back:hover{
    opacity:.9;
}

.icon-box{
    font-size:60px;
    margin-bottom:10px;
}

</style>

<div class="form-container">

    <div class="form-card">

        <div class="form-header">

            <div class="icon-box">
                👤
            </div>

            <h2>Tambah Data Pelanggan</h2>

            <p>
                Isi data pelanggan dengan lengkap
            </p>

        </div>

        <div class="form-body">

            <form action="/admin/pelanggan/store" method="POST">

                @csrf

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama pelanggan"
                        required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan email"
                        required>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        placeholder="Masukkan nomor HP">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea
                        name="address"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alamat pelanggan"></textarea>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required>
                </div>

                <button type="submit" class="btn-save">
                    💾 Simpan Data
                </button>

                <a href="/admin/pelanggan" class="btn-back">
                    ↩ Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection