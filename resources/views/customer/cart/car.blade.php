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
                        <li><a href="{{ route('customer.car') }}">Agusta Motor</a></li>
                        <li>Keranjang</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="pricing" class="pricing portfolio section-bg inner-page">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Keranjang: Agusta Motor</h2>
                </div>

                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-8">
                        @foreach ($user->car_cart as $cart)
                            <div class="card mb-3 cardt" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4 preview">
                                        @foreach ($photos as $photo)
                                            @if ($cart->id == $photo->car_product_id)
                                                <img id="photoPreview" src="{{ asset('storage/' . $photo->url) }}"
                                                    class="img-fluid mx-auto d-block rounded-start"
                                                    alt="{{ $cart->title }}">
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $cart->title }}</h5>
                                        <p class="card-text"><small class="text-muted">Tahun : </small> {{$cart->year }}</p>
                                        <button class="btn float-end">
                                            <i class='bx bx-trash text-muted ' style="font-size: 24px"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-bold">Buat Janji Temu</h5>
                            <p class="card-text d-flex justify-content-between mb-1">
                                <span class="text-muted"><small>Jenis Produk</small></span>
                                <span>Mobil</span>
                            </p>
                            <p class="card-text d-flex justify-content-between mb-4">
                                <span class="text-muted"><small>Jumlah Produk</small></span>
                                <span id="txtTotal"></span>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('customer.appointment.car.index') }}" class="add-cart btn"
                                    type="button">Pilih Jadwal</a>
                            </div>
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
    $(document).ready(function() {
        var total = $('.cardt').length;

        $('#txtTotal').html(total + " produk");
    });
</script>
@endsection
