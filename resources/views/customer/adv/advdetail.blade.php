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
                        <li>Detail Produk</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row">
                    <div id="notifSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil menambah produk -</strong> Produk berhasil ditambahkan ke keranjangmu
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div id="notifFailed" class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
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
                            <button id="btnAddCart" class="add-cart" data-adv="{{ $adv }}"
                                onclick="addToCart(this)">+ Keranjang</button>
                        </div>
                        <div class="portfolio-info">
                            <h3>{{ $adv->name }}</h3>
                            <div class="row mb-2">
                                <span class="col-sm-5 text-muted"><small>Kategori</small></span>
                                <span
                                    class="col-sm-7">{{ $adv->category == 'IO' ? 'Indoor & Outdoor' : $adv->category }}</span>
                            </div>
                        </div>
                        <div class="portfolio-description">
                            <h2>Deskripsi</h2>
                            <p>
                                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore
                                quia
                                quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim.
                                Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi
                                nulla
                                at esse enim cum deserunt eius.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection

@section('jquery')
    <script>
        function addToCart(button) {
            var adv = $(button).data("adv");
            var user = {{ auth()->user()->id }};
            $.ajax({
                type: "POST",
                url: "{{ route('customer.adv.cart.add') }}",
                data: {
                    "_token": "<?php echo csrf_token(); ?>",
                    "user_id": user,
                    "adv_product_id": adv.id,
                },
                success: function(data) {
                    if (data.status == "Success") {
                        $('#notifSuccess').show();
                        $('#notifFailed').hide();
                    }
                },
                error: function(xhr, status, error) {
                    $('#notifSuccess').hide();
                    $('#notifFailed').prepend("<strong>Produk gagal ditambahkan - </strong>" + xhr.responseJSON.message);
                    $('#notifFailed').show();
                }
            })
        }

        $(document).ready(function() {
            $('#notifSuccess').hide();
            $('#notifFailed').hide();
        });
    </script>
@endsection
