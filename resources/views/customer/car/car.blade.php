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
                    <li>Agusta Motor</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing section-bg inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Agusta Motor</h2>
                <p>Berikut berbagai merk dan tipe mobil bekas yang tersedia untuk Anda pilih</p>
            </div>

            <!-- <div class="row mb-4">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-2 portfolio">
                    <div>
                        <p class="mb-3"><strong>Filter</strong></p>
                        <div>
                            <p class="mb-1"><strong>Tahun</strong></p>
                            <div class="row">
                                <div class="col-lg-12 d-flex">
                                    <ul id="filter">
                                        <li data-filter="*" class="filter-active">Semua</li>
                                        <li data-filter=".filter-Indoor">3 tahun terakhir</li>
                                        <li data-filter=".filter-Indoor">5 tahun terakhir</li>
                                        <li data-filter=".filter-Indoor">7 tahun terakhir</li>
                                        <li data-filter=".filter-Outdoor">10 tahun terakhir</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1"><strong>Harga</strong></p>
                            <div class="row">
                                <div class="col-lg-12 d-flex">
                                    <ul id="filter">
                                        <li data-filter="*" class="filter-active">Semua</li>
                                        <li data-filter=".filter-Indoor">
                                            < Rp. 100 juta</li>
                                        <li data-filter=".filter-Outdoor">Rp. 100 - 200 juta</li>
                                        <li data-filter=".filter-Outdoor">Rp. 200 - 300 juta</li>
                                        <li data-filter=".filter-Outdoor">> Rp. 300 juta</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1"><strong>Merk</strong></p>
                            @foreach($brands as $brand)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkBrand{{ $brand -> id }}">
                                <label class="form-check-label" for="checkBrand{{ $brand -> id }}">
                                    {{ $brand -> brand }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <p class="mb-1"><strong>Kategori</strong></p>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkCat{{ $category -> id }}">
                                <label class="form-check-label" for="checkCat{{ $category -> id }}">
                                    {{ $category -> category }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @php
                        $delay = 0;
                        @endphp

                        @foreach($cars as $car)
                        <a href="{{ route('customer.car.detail', $car) }}" class="col data-aos=" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            <div class=" card h-100">
                                @foreach($photos as $photo)
                                @if ($car -> id == $photo -> car_product_id)
                                <img src="{{ asset('storage/' . $photo -> url) }}" class="card-img-top" alt="{{ $car -> title }}">
                                @break
                                @endif
                                @endforeach
                                <div class="card-body">
                                    <h5 class="card-title">[{{ $car -> year }}] {{ $car -> title }}</h5>
                                    <p class="card-text text-primary h4"><strong>Rp. {{ $car -> price }}</strong></p>
                                </div>
                            </div>
                        </a>
                        @php
                        $delay += 100;
                        @endphp

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection