@extends('layouts.admin')

@section('title','Edit Pelanggan')

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
    background:linear-gradient(135deg,#f39c12,#f7b731);
    color:white;
    text-align:center;
    padding:30px;
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
}

.form-control{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:12px;
}

.form-control:focus{
    outline:none;
    border-color:#3498db;
}

.btn-update{
    background:#2ecc71;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
}

.btn-back{
    background:#e74c3c;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    margin-left:10px;
}

</style>

<div class="form-container">

    <div class="form-card">

        <div class="form-header">
            <h2>✏ Edit Pelanggan</h2>
            <p>Perbarui data pelanggan</p>
        </div>

        <div class="form-body">

            <form action="/admin/pelanggan/update/{{ $pelanggan->id }}" method="POST">

                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text"
                           name="name"
                           value="{{ $pelanggan->name }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $pelanggan->email }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text"
                           name="phone"
                           value="{{ $pelanggan->phone }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address"
                              class="form-control"
                              rows="4">{{ $pelanggan->address }}</textarea>
                </div>

                <div class="form-group">
                    <label>Password Baru (Opsional)</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>

                <button type="submit" class="btn-update">
                    💾 Update
                </button>

                <a href="/admin/pelanggan" class="btn-back">
                    ↩ Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection