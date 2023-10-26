@extends('layouts.home')

@section("header")
<li><a class="nav-link scrollto " href="#hero">Home</a></li>
<li><a class="nav-link scrollto" href="#about">About</a></li>
<li><a class="nav-link scrollto" href="#services">Services</a></li>
<li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
<li><a class="nav-link scrollto" href="#team">Team</a></li>
<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
        </li>
        <li><a href="#">Drop Down 2</a></li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
    </ul>
</li>
<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
<li><a class="getstarted scrollto" href="#about">Get Started</a></li>
@endsection

@section('content')
<section class="portfolio">
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
                            <a href="" title="More Details" class="btn btn-outline-light">Lihat Detail&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
            </div>
            @endforeach

        </div>

        <!-- <div class="row">

            @foreach ($advs as $adv)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="box">
                    <h3>{{ $adv->name }}</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div> -->

    </div>
</section>
@endsection