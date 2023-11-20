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
                    <li><a href="{{ route('customer.cart.advertising.show', auth()->user()->id) }}">Keranjang</a></li>
                    <li>Buat Janji Temu</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <form action="{{ route('customer.appointment.advertising.store') }}" method="post">
                <div class="mb-3 row">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDate" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" max="<?php echo date("Y-m-d", strtotime("+15 day")); ?>" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTime" class="col-sm-2 col-form-label">Jam (WITA)</label>
                    <div class="col-sm-10">
                        <div>
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck1">10:00 - 11:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck2">11:00 - 12:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck3">12:00 - 13:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck4">13:00 - 14:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck5">14:00 - 15:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck6">15:00 - 16:00</label>

                            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2" for="btncheck7">16:00 - 17:00</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection