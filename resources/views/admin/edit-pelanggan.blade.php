@extends('layouts.admin')

@section('title','Edit Pelanggan')

@section('content')

<style>

body{
    background:linear-gradient(135deg,#f39c12,#f7b731);
    min-height:100vh;
}

/* Hiasan bulat */
body::before,
body::after{
    content:"";
    position:absolute;
    border-radius:50%;
    opacity:.2;
}

body::before{
    width:200px;
    height:200px;
    background:white;
    top:40px;
    left:40px;
}

body::after{
    width:300px;
    height:300px;
    background:white;
    bottom:40px;
    right:40px;
}

/* Container */
.form-container{
    max-width:700px;
    margin:auto;
    padding-top:40px;
    animation:fadeIn 1s ease;
}

/* Card */
.form-card{
    background:rgba(255,255,255,0.9);
    backdrop-filter:blur(10px);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
    transform:translateY(30px);
    animation:slideUp 0.8s ease forwards;
}

/* Header */
.form-header{
    background:linear-gradient(135deg,#f39c12,#f7b731);
    color:white;
    text-align:center;
    padding:30px;
}

.form-header h2{
    margin-bottom:8px;
}

/* Body */
.form-body{
    padding:30px;
}

/* Floating Label */
.form-group{
    position:relative;
    margin-bottom:22px;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    transition:.3s;
}

.form-group label{
    position:absolute;
    top:12px;
    left:15px;
    color:#888;
    background:white;
    padding:0 5px;
    transition:.3s;
    pointer-events:none;
}

/* kondisi aktif */
.form-group input:focus,
.form-group textarea:focus{
    border-color:#e67e22;
    box-shadow:0 0 0 4px rgba(230,126,34,0.2);
}

.form-group input:focus + label,
.form-group textarea:focus + label,
.form-group input:not(:placeholder-shown) + label,
.form-group textarea:not(:placeholder-shown) + label{
    top:-10px;
    font-size:12px;
    color:#e67e22;
}

/* Button */
.btn-update{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn-update:hover{
    transform:scale(1.05);
    box-shadow:0 8px 20px rgba(46,204,113,0.4);
}

.btn-back{
    background:linear-gradient(135deg,#e74c3c,#ff6b6b);
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:12px;
    margin-left:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    transform:scale(1.05);
    box-shadow:0 8px 20px rgba(231,76,60,0.4);
}

/* Animasi */
@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    to{
        transform:translateY(0);
        opacity:1;
    }
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
                    <input type="text" name="name" value="{{ $pelanggan->name }}" placeholder=" " required>
                    <label>Nama</label>
                </div>

                <div class="form-group">
                    <input type="email" name="email" value="{{ $pelanggan->email }}" placeholder=" " required>
                    <label>Email</label>
                </div>

                <div class="form-group">
                    <input type="text" name="phone" value="{{ $pelanggan->phone }}" placeholder=" ">
                    <label>No HP</label>
                </div>

                <div class="form-group">
                    <textarea name="address" rows="4" placeholder=" ">{{ $pelanggan->address }}</textarea>
                    <label>Alamat</label>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder=" ">
                    <label>Password Baru (Opsional)</label>
                </div>

                <button type="submit" class="btn-update"> Update</button>
                <a href="/admin/pelanggan" class="btn-back">↩ Kembali</a>

            </form>

        </div>

    </div>

</div>

@endsection