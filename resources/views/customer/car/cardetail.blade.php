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
                    <li>Detail Produk</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($photos as $photo)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $photo->url) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="d-grid gap-2 mb-3">
                        <button class="add-cart">+ Keranjang</button>
                    </div>
                    <div class="portfolio-info">
                        <h3>Rp. {{ $car -> price }}</h3>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Judul</small></span>
                            <span class="col-sm-7">{{ $car -> title }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Tahun</small></span>
                            <span class="col-sm-7 ">{{ $car -> year }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Merk</small></span>
                            <span class="col-sm-7">{{ $car -> car_brand -> brand }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Kategori</small></span>
                            <span class="col-sm-7 ">{{ $car -> car_category -> category }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Kilometer</small></span>
                            <span class="col-sm-7 ">{{ $car -> kilometre }} km</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Transmisi</small></span>
                            <span class="col-sm-7 ">{{ $car -> transmission }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Kapasitas Mesin</small></span>
                            <span class="col-sm-7 ">
                                @if($car->capacity == 1)
                                > 1000 cc
                                @elseif($car->capacity == 2)
                                1000 - 1500 cc
                                @elseif($car->capacity == 3)
                                1500 - 2000 cc
                                @elseif($car->capacity == 4)
                                2000 - 3000 cc
                                @else
                                > 3000 cc
                                @endif
                            </span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Bahan Bakar</small></span>
                            <span class="col-sm-7 ">
                                @if($car->fuel == 'Petrol')
                                Bensin
                                @elseif($car->fuel == 'Diesel')
                                Diesel
                                @elseif($car->fuel == 'Electricity')
                                Listrik
                                @else
                                Hybrid
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi</h2>
                        <p>{{ $car -> description }}</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
@endsection