@extends('layouts.home')



@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2></h2>
                    <ol>
                        <li><a href="{{ route('customer.home') }}">Halaman Utama</a></li>
                        <li>Profil Saya</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->
    </main>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data"
                        action="{{ route('customer.profile.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="inputHorizontal"
                                        placeholder="Masukkan nama Anda" required autofocus value="{{ $user->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="number" name="telephone"
                                    class="form-control @error('telephone') is-invalid @enderror" id="inputHorizontal"
                                    placeholder="Contoh: 1234567890" required autofocus value="{{ $user->telephone }}">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="inputHorizontal"
                                    placeholder="Contoh@gmail.com" required autofocus value="{{ $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-end">
                                <a href="{{ route('customer.profile.edit', $user->id) }}" type="reset"
                                    class="btn btn-outline-danger btn-rounded">Batal</a>
                                <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
