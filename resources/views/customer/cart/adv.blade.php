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
                    <h2>Keranjang: Agusta Advertising</h2>
                </div>

            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-8">
                    @foreach ($user->advertising_cart as $cart)
                    <div class="card mb-3 cardt" style="max-width: 800px;">
                        <div class="row g-0">
                            <div class="col-md-4 preview">
                                @foreach ($photos as $photo)
                                @if ($cart->id == $photo->adv_product_id)
                                <img id="photoPreview" src="{{ asset('storage/' . $photo->url) }}" class="img-fluid mx-auto d-block rounded-start" alt="{{ $cart->name }}">
                                @break
                                @endif
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $cart -> name }}</h5>
                                    <p class="card-text"><small class="text-muted">Kategori :</small> {{ $cart->category == 'IO' ? 'Indoor & Outdoor' : $cart->category }}</p>
                                    <button class="btn float-end">
                                        <i class='bx bx-trash text-muted ' style="font-size: 24px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-7 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-bold">Buat Janji Temu</h5>
                            <p class="card-text d-flex justify-content-between mb-1">
                                <span class="text-muted"><small>Jenis Produk</small></span>
                                <span>Advertising</span>
                            </p>
                            <p class="card-text d-flex justify-content-between mb-4">
                                <span class="text-muted"><small>Jumlah Produk</small></span>
                                <span id="txtTotal"></span>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('customer.appointment.advertising.index') }}" class="add-cart btn" type="button">Pilih Jadwal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection

@section('jquery')
<script>
    // Cek validitas waktu
    function validTime(selectedDate) {
        // Ambil tanggal dan waktu sekarang
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth() + 1;
        var date = today.getDate();
        var hour = today.getHours();
        var min = today.getMinutes();
        // Ubah tanggal dan waktu sekarang dalam menit
        var nowMin = year * 525600 + month * 43800 + date * 1440 + hour * 60 + min;

        // Ambil tanggal dan waktu terpilih
        var selectedDateSplit = selectedDate.split('-');
        var selectedYear = parseInt(selectedDateSplit[0]);
        var selectedMonth = parseInt(selectedDateSplit[1]);
        var selectedDay = parseInt(selectedDateSplit[2]);
        // Ubah tanggal dan waktu terpilih dalam menit
        var selectedDateMin = selectedYear * 525600 + selectedMonth * 43800 + selectedDay * 1440;

        // Ambil radio button jam
        var rdoTime = document.getElementsByName('rdoTime');

        for (var i = 0; i < rdoTime.length; i++) {
            var start = rdoTime[i].getAttribute('data-start');

            var startMin = year * 525600 + month * 43800 + date * 1440 + parseInt(start.split(':')[0]) * 60 + parseInt(start.split(':')[1]);

            if (selectedDateMin < nowMin && startMin < nowMin) {
                rdoTime[i].disabled = true;
                rdoTime[i].classList.add('disabled');
            } else {
                rdoTime[i].disabled = false;
                rdoTime[i].classList.remove('disabled');
            }
        }
    }

    // Ubah value waktu mulai dan selesai
    function selectedTime(button) {
        document.getElementById('start').value = this.getAttribute('data-start');
        document.getElementById('end').value = this.getAttribute('data-end');
    }

    $(document).ready(function() {
        // Hitung total produk di keranjang
        var total = $('.cardt').length;
        $('#txtTotal').html(total + " produk");

        document.getElementById('start').value = '10:00:00';
        document.getElementById('end').value = '11:00:00';

        var selectedDate = document.getElementById('inputDate').value;
        validTime(selectedDate);

        $('#inputDate').on('change', function() {
            validTime();
        });
    });
</script>
@endsection
