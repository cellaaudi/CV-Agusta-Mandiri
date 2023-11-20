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
                    <h2>Agusta Advertising</h2>
                    <p>Berikut berbagai jenis periklanan yang dapat Anda pesan dari kami</p>
                </div>

                @foreach ($carts as $cart)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @foreach ($photos as $photo)
                                    @if ($cart->adv_product_id == $photo->adv_product_id)
                                        <img src="{{ asset('storage/' . $photo->url) }}" class="img-fluid rounded-start"
                                            alt="{{ $cart->advertising->name }}">
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row row-cols-1 row-cols-md-3 g-4 card-container">
                    {{-- @foreach ($cart as $c)
                        <a class="col card-item filter-{{ $c->category }}">
                            <div class=" card h-100">
                                @foreach ($photos as $photo)
                                    @if ($c->adv_product_id == $photo->adv_product_id)
                                        <img src="{{ asset('storage/' . $photo->url) }}" class="card-img-top"
                                            alt="{{ $c->name }}">
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h5 class="card-title">{{ $c->name }}</h5>
                            </div>
                        </div>
                    </a>
                @endforeach --}}
            </div>

        </div>
    </section>
</main>
@endsection
