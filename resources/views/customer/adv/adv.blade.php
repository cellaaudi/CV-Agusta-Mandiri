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
                    <li>Agusta Advertising</li>
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

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-Indoor">Indoor</li>
                        <li data-filter=".filter-Outdoor">Outdoor</li>
                        <li data-filter=".filter-IO">Indoor & Outdoor</li>
                    </ul>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 card-container">
                @foreach($advs as $adv)
                <a href="{{ route('customer.advertising.detail', $adv) }}" class="col card-item filter-{{ $adv -> category }}">
                    <div class=" card h-100">
                        @foreach($photos as $photo)
                        @if ($adv -> id == $photo -> adv_product_id)
                        <img src="{{ asset('storage/' . $photo -> url) }}" class="card-img-top" alt="{{ $adv -> name }}">
                        @break
                        @endif
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $adv -> name }}</h5>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </section>

    <!-- <section class="portfolio inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Agusta Advertising</h2>
                <p>Berikut berbagai jenis periklanan yang dapat Anda pesan dari kami</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-Indoor">Indoor</li>
                        <li data-filter=".filter-Outdoor">Outdoor</li>
                        <li data-filter=".filter-IO">Indoor & Outdoor</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">
                @foreach($advs as $adv)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $adv -> category }}">
                    <div class="portfolio-wrap">
                        @foreach($photos as $photo)
                        @if ($adv -> id == $photo -> adv_product_id)
                        <img src="{{ asset('storage/' . $photo -> url) }}" class="img-fluid" alt="">
                        @break
                        @endif
                        @endforeach
                        <div class="portfolio-info">
                            <h4>{{ $adv -> name }}</h4>
                            <p>{{ $adv -> category }}</p>
                        </div>
                        <div class="portfolio-links">
                            <form action="{{ route('customer.advertising.detail', $adv) }}" method="post">
                                @csrf
                                <button type="submit" title="More Details" class="btn btn-outline-light">Lihat Detail&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section> -->
</main>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        const on = (type, el, listener, all = false) => {
            let selectEl = select(el, all)
            if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
            }
        }

        window.addEventListener('load', () => {
            let cardContainer = select('.card-container');
            if (cardContainer) {
                let cardIsotope = new Isotope(cardContainer, {
                    itemSelector: '.card-item'
                });

                let cardFilters = select('#portfolio-flters li', true);

                on('click', '#portfolio-flters li', function(e) {
                    e.preventDefault();
                    cardFilters.forEach(function(el) {
                        el.classList.remove('filter-active');
                    });
                    this.classList.add('filter-active');

                    cardIsotope.arrange({
                        filter: this.getAttribute('data-filter')
                    });
                    cardIsotope.on('arrangeComplete', function() {
                        AOS.refresh()
                    });
                }, true);
            }

        });
    });
</script>
@endsection