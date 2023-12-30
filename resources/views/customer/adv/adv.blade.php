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

            <div class="row">
                <div class="col-md-2 portfolio">
                    <div>
                        <p class="mb-3"><strong>Filter</strong></p>
                        <div>
                            <p class="mb-1"><strong>Tahun</strong></p>
                            <div class="row">
                                <div class="col-lg-12 d-flex">
                                    <ul id="filter-year">
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
                                    <ul id="filter-price">
                                        <li data-filter="*" class="filter-active">Semua</li>
                                        <li data-filter=".filter-Indoor">< Rp. 100 juta</li>
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
                                <input class="form-check-input" type="checkbox" value="{{ $brand->id }}" id="checkBrand{{ $brand->id }}">
                                <label class="form-check-label" for="checkBrand{{ $brand->id }}">
                                    {{ $brand->brand }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <p class="mb-1"><strong>Kategori</strong></p>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="checkCat{{ $category->id }}">
                                <label class="form-check-label" for="checkCat{{ $category->id }}">
                                    {{ $category->category }}
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
                        <a href="{{ route('customer.car.detail', $car) }}" class="col" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            <div class=" card h-100" data-year="{{ $car->year }}" data-price="{{ $car->price }}" data-brand="{{ $car->brand }}" data-category="{{ $car->category }}">
                                @foreach($photos as $photo)
                                @if ($car->id == $photo->car_product_id)
                                <img src="{{ asset('storage/' . $photo->url) }}" class="card-img-top" alt="{{ $car->title }}">
                                @break
                                @endif
                                @endforeach
                                <div class="card-body">
                                    <h5 class="card-title">[{{ $car->year }}] {{ $car->title }}</h5>
                                    <p class="card-text text-primary h4"><strong>Rp. {{ $car->price }}</strong></p>
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