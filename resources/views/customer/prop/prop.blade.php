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
                    <li>Agusta Properti</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing section-bg inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Agusta Properti</h2>
                <p>Berikut berbagai pilihan properti yang tersedia untuk Anda</p>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @php
                $delay = 0;
                @endphp

                @foreach($props as $prop)
                <a href="{{ route('customer.property.detail', $prop) }}" class="col data-aos=" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class=" card h-100">
                        @foreach($photos as $photo)
                        @if ($prop -> id == $photo -> prop_product_id)
                        <img src="{{ asset('storage/' . $photo -> url) }}" class="card-img-top" alt="{{ $prop -> title }}">
                        @break
                        @endif
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $prop -> title }}</h5>
                            <p class="card-text text-primary h4"><strong>Rp. {{ $prop -> price }}</strong></p>
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