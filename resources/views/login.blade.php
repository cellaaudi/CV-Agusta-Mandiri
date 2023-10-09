@extends('layouts.auth')

@section('content')
<h2 class="mt-3 text-center">Selamat datang kembali di CV Agusta Mandiri</h2>
<p class="text-center">Masuk untuk dapat mengakses layanan dari kami dengan lebih lengkap</p>
<form class="mt-4" method="POST" action="{{ route('login') }}">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="email">Email</label>
                <input class="form-control" id="email" type="email" placeholder="contoh@gmail.com">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="pwd">Password</label>
                <input class="form-control" id="pwd" type="password" placeholder="Masukkan password Anda">
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn w-100 btn-primary btn-rounded">Masuk</button>
        </div>
        <div class="col-lg-12 text-center mt-5">
            Belum memiliki akun? <a href="#" class="text-danger">Daftar</a>
        </div>
    </div>
</form>
@endsection