@extends('layouts.pelanggan')

@section('title','Profile Saya')

@section('content')

<div class="card">

    <h2 style="margin-bottom:20px;">
        👤 Profile Saya
    </h2>

    <p><b>Nama :</b> {{ Auth::user()->name }}</p>
    <br>

    <p><b>Email :</b> {{ Auth::user()->email }}</p>
    <br>

    <p><b>No HP :</b> {{ Auth::user()->phone }}</p>
    <br>

    <p><b>Alamat :</b> {{ Auth::user()->address }}</p>

</div>

@endsection