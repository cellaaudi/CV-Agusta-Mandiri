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
                            <p class="card-text">Merk : {{ $car -> car_brand -> brand }} <br> Kategori : {{ $car -> car_category -> category }}</p>
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
    </section>
</main>
@endsection