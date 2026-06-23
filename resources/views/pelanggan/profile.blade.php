@extends('layouts.pelanggan')

@section('title','Profile Saya')

@section('style')
<style>

body{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    min-height:100vh;
}

/* Hiasan background */
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
    top:50px;
    left:50px;
}

body::after{
    width:300px;
    height:300px;
    background:white;
    bottom:50px;
    right:50px;
}

/* Card */
.profile-card{
    max-width:750px;
    margin:40px auto;
    background:rgba(255,255,255,0.9);
    backdrop-filter:blur(12px);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
    animation:fadeIn 1s ease;
}

/* Header */
.profile-header{
    background:linear-gradient(135deg,#4facfe,#00c6ff);
    padding:40px;
    text-align:center;
    color:white;
}

/* Avatar animasi */
.profile-avatar{
    width:100px;
    height:100px;
    border-radius:50%;
    background:white;
    color:#3498db;
    font-size:40px;
    font-weight:bold;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    margin-bottom:15px;
    animation:float 3s ease-in-out infinite;
}

/* Body */
.profile-body{
    padding:30px;
}

/* Item */
.profile-item{
    background:#f8fbff;
    padding:15px;
    border-radius:15px;
    margin-bottom:15px;
    transition:.3s;
}

.profile-item:hover{
    transform:translateX(5px);
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

.profile-item label{
    font-size:13px;
    color:#64748b;
}

.profile-item p{
    font-weight:600;
}

/* Form */
.form-control{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    transition:.3s;
}

.form-control:focus{
    border-color:#3498db;
    box-shadow:0 0 10px rgba(52,152,219,.2);
}

/* Button */
.btn-edit,
.btn-save,
.btn-cancel{
    padding:12px 20px;
    border:none;
    border-radius:12px;
    cursor:pointer;
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-edit{
    background:linear-gradient(135deg,#3498db,#6c9cff);
}

.btn-save{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
}

.btn-cancel{
    background:linear-gradient(135deg,#e74c3c,#c0392b);
    margin-left:10px;
}

.btn-edit:hover,
.btn-save:hover,
.btn-cancel:hover{
    transform:scale(1.05);
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

/* Success */
.success-box{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:12px;
    margin-bottom:15px;
    animation:fadeIn .5s ease;
}

/* Animasi view switch */
.fade{
    animation:fadeSwitch .4s ease;
}

/* Keyframes */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

@keyframes fadeSwitch{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes float{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
}

</style>
@endsection

@section('content')

<div class="profile-card">

    <div class="profile-header">

        <div class="profile-avatar" style="overflow:hidden;">
    @if(Auth::user()->photo)
        <img src="{{ asset('uploads/profile/' . Auth::user()->photo) }}"
             alt="Foto Profil"
             style="width:100%;height:100%;object-fit:cover;">
    @else
        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
    @endif
</div>

        <h2>{{ Auth::user()->name }}</h2>
        <p>{{ Auth::user()->email }}</p>
    </div>

    <div class="profile-body">

        @if(session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <!-- VIEW -->
        <div id="profileView" class="fade">

            <div class="profile-item">
                <label>Nama</label>
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="profile-item">
                <label>Email</label>
                <p>{{ Auth::user()->email }}</p>
            </div>

            <div class="profile-item">
                <label>No HP</label>
                <p>{{ Auth::user()->phone }}</p>
            </div>

            <div class="profile-item">
                <label>Alamat</label>
                <p>{{ Auth::user()->address }}</p>
            </div>

            <button onclick="showEditForm()" class="btn-edit">
                ✏️ Edit Profile
            </button>

        </div>

        <!-- EDIT -->
        <div id="editForm" style="display:none;">

    <form action="/pelanggan/profile/update"
          method="POST"
          enctype="multipart/form-data">

            @csrf

                <div style="margin-bottom:15px;">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>No HP</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" style="height:100px;">{{ Auth::user()->address }}</textarea>
                </div>
<div style="margin-bottom:15px;">
    <label>Foto Profil</label>
    <input
        type="file"
        name="photo"
        accept="image/*"
        class="form-control">
</div>
                <button type="submit" class="btn-save">
                    💾 Update Profile
                </button>

                <button type="button" onclick="hideEditForm()" class="btn-cancel">
                    ❌ Batal
                </button>

            </form>

        </div>

    </div>

</div>

<script>

function showEditForm(){
    document.getElementById('profileView').style.display='none';
    let form = document.getElementById('editForm');
    form.style.display='block';
    form.classList.add('fade');
}

function hideEditForm(){
    document.getElementById('editForm').style.display='none';
    let view = document.getElementById('profileView');
    view.style.display='block';
    view.classList.add('fade');
}

</script>

@endsection