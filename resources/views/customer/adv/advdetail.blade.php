@extends('layout.home')
@section('content')
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
                    <div class="portfolio-info">
                        <h3>{{ $adv -> name }}</h3>
                        <h5>{{ $adv -> category }}</h5>
                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia
                            quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim.
                            Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla
                            at esse enim cum deserunt eius.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
