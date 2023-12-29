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
                    <li><a href="{{ route('customer.advertising') }}">Agusta Advertising</a></li>
                    <li>Keranjang</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing portfolio section-bg inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Keranjang: Agusta Advertising</h2>
            </div>

            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-5">
                    @foreach ($user->advertising_cart as $cart)
                    <div class="card mb-3 cardt" style="max-width: 800px;">
                        <div class="row g-0">
                            <div class="col-md-4 preview">
                                @foreach ($photos as $photo)
                                @if ($cart->id == $photo->adv_product_id)
                                <img id="photoPreview" src="{{ asset('storage/' . $photo->url) }}" class="img-fluid mx-auto d-block rounded-start" alt="{{ $cart->name }}">
                                @break
                                @endif
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $cart -> name }}</h5>
                                    <p class="card-text"><small class="text-muted">Kategori :</small> {{ $cart->category == 'IO' ? 'Indoor & Outdoor' : $cart->category }}</p>
                                    <button class="btn float-end">
                                        <i class='bx bx-trash text-muted ' style="font-size: 24px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-7 mb-5">
                    <div class="card">
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
                            <!-- <div class="d-grid gap-2">
                                <a href="{{ route('customer.appointment.advertising.index') }}" class="add-cart btn" type="button">Pilih Jadwal</a>
                            </div> -->
                            <p class="h6 card-title mt-5 mb-3 fw-bold">Pilih Jadwal</p>
                            <form action="{{ route('customer.appointment.advertising.store') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputDate" min="<?php echo date("Y-m-d", strtotime("-1 day")); ?>" max="<?php echo date("Y-m-d", strtotime("+13 day")); ?>" value="<?php echo date("Y-m-d", strtotime("-1 day")); ?>" name="date">
                                        <div class="form-text">
                                            Anda hanya dapat membuat janji temu untuk 2 minggu kedepan.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputTime" class="col-sm-2 col-form-label">Jam</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime1" autocomplete="off" checked onclick="selectedTime('10:00:00', '11:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime1">10:00 - 11:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime2" autocomplete="off" onclick="selectedTime('11:00:00', '12:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime2">11:00 - 12:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime3" autocomplete="off" onclick="selectedTime('12:00:00', '13:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime3">12:00 - 13:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime4" autocomplete="off" onclick="selectedTime('13:00:00', '14:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime4">13:00 - 14:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime5" autocomplete="off" onclick="selectedTime('14:00:00', '15:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime5">14:00 - 15:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime6" autocomplete="off" onclick="selectedTime('15:00:00', '16:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime6">15:00 - 16:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime7" autocomplete="off" onclick="selectedTime('16:00:00', '17:00:00')">
                                            <label class="btn btn-outline-primary" for="rdoTime7">16:00 - 17:00</label>

                                            <input type="hidden" name="start" id="start" value="">
                                            <input type="hidden" name="end" id="end" value="">
                                        </div>
                                        <div class="form-text">
                                            Waktu yang ditampilkan dalam zona Waktu Indonesia Tengah (WITA) - UTC+08:00.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Pembayaran</label>
                                    <div class="col-sm-10">
                                        <div aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="payment" id="rdoCash" autocomplete="off" value="Cash" checked>
                                            <label class="btn btn-outline-primary" for="rdoCash">Tunai</label>

                                            <input type="radio" class="btn-check" name="payment" id="rdoCredit" autocomplete="off" value="Credit">
                                            <label class="btn btn-outline-primary" for="rdoCredit">Debit / Kredit</label>

                                            <input type="radio" class="btn-check" name="payment" id="rdoTrade" autocomplete="off" value="Trade">
                                            <label class="btn btn-outline-primary" for="rdoTrade">Tukar Tambah</label>
                                        </div>
                                        <div class="form-text">
                                            Tipe pembayaran dapat berubah sesuai kesepakatan setelah bertemu.
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                <div class="mt-5 form-actions">
                                    <div class="d-grid gap-2">
                                        <button class="add-cart btn">Buat Janji Temu</button>
                                    </div>
                                    <!-- <div class="text-end">
                                        <button class="add-cart">Buat Janji Temu</button>
                                    </div> -->
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

@section('jquery')
<script>
    function selectedTime(start, end) {
        document.getElementById('start').value = start;
        document.getElementById('end').value = end;
    }

    $(document).ready(function() {
        var total = $('.cardt').length;

        $('#txtTotal').html(total + " produk");
    });
</script>
@endsection