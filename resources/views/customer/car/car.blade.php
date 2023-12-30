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
                                        <ul id="filter-year">
                                            <li data-filter="*" class="filter-active">Semua</li>
                                            <li data-filter=".filter-year">3 tahun terakhir</li>
                                            <li data-filter=".filter-year">5 tahun terakhir</li>
                                            <li data-filter=".filter-year">7 tahun terakhir</li>
                                            <li data-filter=".filter-year">10 tahun terakhir</li>
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
                                            <li data-filter=".filter-price-1">
                                                < Rp. 100 juta</li>
                                            <li data-filter=".filter-price-2">Rp. 100 - 200 juta</li>
                                            <li data-filter=".filter-price-3">Rp. 200 - 300 juta</li>
                                            <li data-filter=".filter-price-4">> Rp. 300 juta</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <p class="mb-1"><strong>Merk</strong></p>
                                @foreach ($brands as $brand)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="checkBrand{{ $brand->id }}">
                                        <label class="form-check-label" for="checkBrand{{ $brand->id }}">
                                            {{ $brand->brand }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <p class="mb-1"><strong>Kategori</strong></p>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input filter-category" type="checkbox"
                                            value="{{ $category->id }}" id="checkCat{{ $category->id }}">
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

                            @foreach ($cars as $car)
                                <a href="{{ route('customer.car.detail', $car) }}" class="col data-aos=" data-aos="fade-up"
                                    data-aos-delay="{{ $delay }}">
                                    <div class=" card h-100">
                                        @foreach ($photos as $photo)
                                            @if ($car->id == $photo->car_product_id)
                                                <img src="{{ asset('storage/' . $photo->url) }}" class="card-img-top"
                                                    alt="{{ $car->title }}">
                                            @break
                                        @endif
                                    @endforeach
                                    <div class="card-body">
                                        <h5 class="card-title">[{{ $car->year }}] {{ $car->title }}</h5>
                                        <p class="card-text text-primary h4"><strong>Rp. {{ $car->price }}</strong>
                                        </p>
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
        function filterCars() {
            var currentYear = new Date().getFullYear();
            var selectedYearText = $('#filter-year li.filter-active').text();
            var selectedYear = parseInt(selectedYearText);

            var selectedPriceFilter = $('#filter-price li.filter-active').attr('data-filter');
            var priceConditions = {
                '*': true,
                '.filter-price-1': function(carPrice) {
                    return carPrice < 100000000;
                },
                '.filter-price-2': function(carPrice) {
                    return carPrice >= 100000000 && carPrice <= 200000000;
                },
                '.filter-price-3': function(carPrice) {
                    return carPrice > 200000000 && carPrice <= 300000000;
                },
                '.filter-price-4': function(carPrice) {
                    return carPrice > 300000000;
                },
            };

            var selectedBrands = $('.filter-brand:checked').map(function() {
                return this.value;
            }).get();

            var selectedCategories = $('.filter-category:checked').map(function() {
                return this.value;
            }).get();

            $('.col').each(function() {
                var carYear = $(this).find('.card-title').text().match(/\[(\d{4})\]/);
                carYear = carYear ? parseInt(carYear[1]) : null;

                var carPrice = parseFloat($(this).find('.card-text strong').text().replace('Rp. ', '')
                    .replace(',', ''));

                var carPriceCategory = $(this).attr('class').match(/filter-price-(\d+)/);
                carPriceCategory = carPriceCategory ? carPriceCategory[1] : null;

                var carBrand = $(this).attr('class').match(/filter-brand(\d+)/);
                carBrand = carBrand ? carBrand[1] : null;

                var carCategory = $(this).attr('class').match(/filter-category(\d+)/);
                carCategory = carCategory ? carCategory[1] : null;

                var yearCondition = selectedYearText === 'Semua' || (currentYear - carYear) <=
                    selectedYear;
                var priceCondition = priceConditions[selectedPriceFilter] === true || (priceConditions[
                    selectedPriceFilter] && priceConditions[selectedPriceFilter](carPrice));
                var brandCondition = selectedBrands.length === 0 || selectedBrands.includes(carBrand);
                var categoryCondition = selectedCategories.length === 0 || selectedCategories.includes(
                    carCategory);

                if (yearCondition && priceCondition && brandCondition && categoryCondition) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#filter-year li').on('click', function() {
            $('#filter-year li').removeClass('filter-active');
            $(this).addClass('filter-active');
            filterCars();
        });

        $('#filter-price li').on('click', function() {
            $('#filter-price li').removeClass('filter-active');
            $(this).addClass('filter-active');
            filterCars();
        });

        $('.filter-brand').on('change', function() {
            filterCars();
        });

        $('.filter-category').on('change', function() {
            filterCars();
        });

        filterCars(); // Initial filter on page load
    });
</script>
@endsection
