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
                    <li>Janji Temu</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Janji Temu</h2>
            </div>

            <div class="row flex-lg-row">
                <div class="col-lg-5">
                    <div class="row">
                        <div id="notifSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil - </strong>Produk berhasil dihapus dari keranjangmu
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div id="notifFailed" class="alert alert-danger alert-dismissible fade show" role="alert">
                        </div>
                    </div>
                    @foreach ($user->advertising_cart as $cart)
                    <div id="cardCartId_{{ $cart->id }}" class="card mb-3 cardt border-0 shadow">
                        <div class="row g-0">
                            @foreach ($photos as $photo)
                            @if ($cart->id == $photo->adv_product_id)
                            <img src="{{ asset('storage/' . $photo->url) }}" class="col-md-4 img-fluid rounded" alt="{{ $cart->name }}" style="object-fit: cover;">
                            @break
                            @endif
                            @endforeach
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $cart->name }}</h5>
                                    <p class="card-text"><small class="text-muted">Kategori :</small>
                                        {{ $cart->category == 'IO' ? 'Indoor & Outdoor' : $cart->category }}
                                    </p>
                                    <button class="btn float-end" onclick="removeCartItem({{ auth()->user()->id }}, {{ $cart->id }})">
                                        <i class='bx bx-trash text-danger' style="font-size: 24px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="txtEmpty" class="card mb-3 bg-transparent border-0"><div class="card-body text-muted fs-4">Anda belum menambahkan produk apapun ke keranjang</div></div>
                </div>
                <div class="col-lg-7 mb-5">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-bold">Buat Janji Temu</h5>
                            <p class="card-text d-flex justify-content-between mb-1">
                                <span class="text-muted"><small>Jenis Produk</small></span>
                                <span>Advertising</span>
                            </p>
                            <p class="card-text d-flex justify-content-between mb-4">
                                <span class="text-muted"><small>Jumlah Produk</small></span>
                                <span id="txtTotal"></span>
                            </p>
                            <p class="h6 card-title mt-5 mb-3 fw-bold">Pilih Jadwal</p>
                            <form action="{{ route('customer.appointment.makeAppointment') }}" method="post">
                                @csrf
                                <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="Adv">
                                @foreach ($user->advertising_cart as $cart)
                                <input id="cartId_{{ $cart->id }}" name="ids[]" type="hidden" value="{{$cart->id}}">
                                @endforeach
                                <div class="mb-3 row">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputDate" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+13 day')); ?>" value="<?php echo date('Y-m-d'); ?>" name="date">
                                        <div class="form-text">
                                            Anda hanya dapat membuat janji temu untuk 2 minggu kedepan.
                                        </div>
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="rdoTime1" class="col-sm-2 col-form-label">Jam</label>
                                    <div class="col-sm-10">
                                        <div class="@error('start') is-invalid @enderror @error('end') is-invalid @enderror">
                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime1" autocomplete="off" onclick="selectedTime(this)" data-start="10:00:00" data-end="11:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime1">10:00 - 11:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime2" autocomplete="off" onclick="selectedTime(this)" data-start="11:00:00" data-end="12:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime2">11:00 - 12:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime3" autocomplete="off" onclick="selectedTime(this)" data-start="12:00:00" data-end="13:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime3">12:00 - 13:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime4" autocomplete="off" onclick="selectedTime(this)" data-start="13:00:00" data-end="14:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime4">13:00 -
                                                14:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime5" autocomplete="off" onclick="selectedTime(this)" data-start="14:00:00" data-end="15:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime5">14:00 -
                                                15:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime6" autocomplete="off" onclick="selectedTime(this)" data-start="15:00:00" data-end="16:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime6">15:00 -
                                                16:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime7" autocomplete="off" onclick="selectedTime(this)" data-start="16:00:00" data-end="17:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime7">16:00 -
                                                17:00</label>

                                            <input type="hidden" name="start" id="start" value="">
                                            <input type="hidden" name="end" id="end" value="">
                                        </div>
                                        <div class="form-text">
                                            Waktu yang ditampilkan dalam zona Waktu Indonesia Tengah (WITA) - UTC+08:00.
                                        </div>
                                        @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @error('end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5 form-actions">
                                    <div class="d-grid gap-2">
                                        <button id="btnMake" class="add-cart btn">Buat Janji Temu</button>
                                    </div>
                                    <div id="txtMake" class="form-text">Pilih produk terlebih dahulu untuk dapat membuat janji temu</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection