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
                            <input type="date" class="form-control" id="inputDate" min="<?php echo date('Y-m-d', strtotime('-1 day')); ?>"
                                max="<?php echo date('Y-m-d', strtotime('+13 day')); ?>" value="<?php echo date('Y-m-d', strtotime('-1 day')); ?>" name="date">
                            <div class="form-text">
                                Anda hanya dapat membuat janji temu untuk 2 minggu kedepan.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rdoTime1" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <div id="inputTime">
                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime1" autocomplete="off"
                                    checked onclick="selectedTime('10:00:00', '11:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime1">10:00 - 11:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime2" autocomplete="off"
                                    onclick="selectedTime('11:00:00', '12:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime2">11:00 - 12:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime3" autocomplete="off"
                                    onclick="selectedTime('12:00:00', '13:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime3">12:00 - 13:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime4" autocomplete="off"
                                    onclick="selectedTime('13:00:00', '14:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime4">13:00 - 14:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime5" autocomplete="off"
                                    onclick="selectedTime('14:00:00', '15:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime5">14:00 - 15:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime6" autocomplete="off"
                                    onclick="selectedTime('15:00:00', '16:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime6">15:00 - 16:00</label>

                                <input type="radio" class="btn-check" name="rdoTime" id="rdoTime7" autocomplete="off"
                                    onclick="selectedTime('16:00:00', '17:00:00')">
                                <label class="btn btn-outline-primary" for="rdoTime7">16:00 - 17:00</label>

                                <input type="hidden" name="start" id="start" value="">
                                <input type="hidden" name="end" id="end" value="">
                            </div>
                            <div class="form-text">
                                Waktu yang ditampilkan dalam zona Waktu Indonesia Tengah (WITA) - UTC+08:00.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rdoCash" class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col-sm-10">
                            <div aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="payment" id="rdoCash" autocomplete="off"
                                    value="Cash" checked>
                                <label class="btn btn-outline-primary" for="rdoCash">Tunai</label>

                                <input type="radio" class="btn-check" name="payment" id="rdoCredit"
                                    autocomplete="off" value="Credit">
                                <label class="btn btn-outline-primary" for="rdoCredit">Debit / Kredit</label>

                                <input type="radio" class="btn-check" name="payment" id="rdoTrade"
                                    autocomplete="off" value="Trade">
                                <label class="btn btn-outline-primary" for="rdoTrade">Tukar Tambah</label>
                            </div>
                            <div class="form-text">
                                Tipe pembayaran dapat berubah sesuai kesepakatan setelah bertemu.
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                    <div class="mt-5 form-actions">
                        <div class="text-end">
                            <button class="add-cart">Buat Janji Temu</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
@section('jquery')
    <script>
        function selectedTime(start, end) {
            document.getElementById('start').value = start;
            document.getElementById('end').value = end;
        }

        $(document).ready(function() {
            $('#inputDate').change(function() {
                // Ambil tanggal yang dipilih
                var selectedDate = $(this).val();
                console.log(selectedDate);
                alert('Tanggal yang dipilih: ' + selectedDate);

                // Lakukan permintaan AJAX untuk mendapatkan janji temu yang sudah ada pada tanggal tersebut
                $.ajax({
                    url: "{{ route('customer.appointment.advertising.getAppointmentsByDate') }}",
                    type: "GET",
                    data: {
                        date: selectedDate
                    },
                    success: function(response) {
                        // Tampilkan jam-jam yang tersedia
                        showAvailableTimes(response);
                    },
                    error: function(error) {
                        console.error('Error fetching appointments:', error);
                    }
                });
            });
        });

        function showAvailableTimes(appointments) {
            // Reset status jam-jam pada setiap pemilihan tanggal baru

            // Loop melalui jam-jam yang tersedia
            $('.btn-check').prop('disabled', false);

            // Loop melalui janji temu yang sudah ada
            $.each(appointments, function(index, appointment) {
                var startTime = appointment.start;
                var endTime = appointment.end;

                // Nonaktifkan tombol radio untuk jam yang sudah dibooking
                $('[data-start="' + startTime + '"][data-end="' + endTime + '"]').prop('disabled', true);
            });
        }
    </script>
@endsection
