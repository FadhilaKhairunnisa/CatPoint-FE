@extends('layouts.app')

@section('title', __('Cat Point - Bukti Pembayaran'))

@section('content')
    <section class="client_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    Konfirmasi Pembayaran
                </h3>
            </div>
            <div class="col-xl-12 text-center">
                <p class="blue-text">Periksa kembali pesanan anda terkait pesanan. Satu langkah lagi menyelesaikan pesanan
                    anda </p>
                <div class="card">
                    <div class="row">
                        <div class="col-sm-6 flex-column d-flex" id="invoiceDetails">
                            <!-- Data Invoice ID, Nominal Tagihan, dan Pembayaran Sebelum akan ditampilkan di sini -->
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <p class="text-left">invoice to:</span> </p>
                                <p class="text-left mt-0" id="customerName"></p>
                                <p class="text-left mt-0" id="customerAddress"></p>
                                <p class="text-left mt-0" id="customerPhone"></p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-8 flex-column d-flex" id="petDetails">
                            <!-- Data Nama Hewan, Ciri Hewan, Berat Hewan, dll. akan ditampilkan di sini -->
                        </div>
                        <div class="col-sm-4 d-flex my-auto">
                            <div>
                                <p class="text-left">Rencana CheckIn <span id="checkInDate"></span></p>
                                <p class="text-left">Rencana CheckOut <span id="checkOutDate"></span></p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <button type="button" class="btn-block btn-submit" onclick="goToHomePage()">Kembali
                                Ke Halaman Utama</button>
                        </div>
                    </div>
                    <p class="text-center">Jika dalam 1x24 jam belum ada konfirmasi melalui WhatsApps harap Hubungi
                        instagram kami di @catpoint_pwt</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        // Mengambil data dari sessionStorage
        var invoiceData = JSON.parse(sessionStorage.getItem('invoice_info'));

        console.log(invoiceData);

        // Mengisi data Invoice ID, Nominal Tagihan, dan Pembayaran Sebelum
        var cekDetail = document.getElementById('invoiceDetails').innerHTML = `
        <div>
            <p class="text-left">Invoice ID <span class="ml-10">${invoiceData.id}</span> </p>
        </div>
        <div>
            <p class="text-left">Nominal Tagihan<span class="ml-6 ">${formatCurrency(parseFloat(invoiceData.booking.service.harga) + parseFloat(invoiceData.booking.treatment.harga))}</span></p>
        </div>`;


        // Mengisi data invoice to
        document.getElementById('customerName').textContent = invoiceData.booking.nama_pemilik;
        document.getElementById('customerAddress').textContent = invoiceData.booking.alamat;
        document.getElementById('customerPhone').textContent = invoiceData.booking.no_telfon;

        // Mengisi data Nama Hewan, Ciri Hewan, Berat Hewan, dll.
        document.getElementById('petDetails').innerHTML = `
        <div>
            <p class="text-left">Nama Hewan <span class="ml-11">${invoiceData.booking.nama_hewan}</span> </p>
        </div>
        <div>
            <p class="text-left">Ciri Hewan<span class="ml-6 ">${invoiceData.booking.ciri_khusus_hewan}</span></p>
        </div>
        <div>
            <p class="text-left">Berat Hewan <span class="ml-12">${invoiceData.booking.berat} Kg</span></p>
        </div>
        <div>
            <p class="text-left">Perawatan Kucing <span class="ml-13">${invoiceData.booking.treatment.paket}</span></p>
        </div>
        <div>
            <p class="text-left">Jenis Kelamin<span class="ml-14">${invoiceData.booking.jenis_kelamin_kucing}</span></p>
        </div>
        <div>
            <p class="text-left">Service <span class="ml-15">${invoiceData.booking.service.paket_fluffy}</span></p>
        </div>
        <div>
            <p class="text-left">Usia <span class="ml-16">${invoiceData.booking.umur_kucing} Tahun</span></p>
        </div>
        <div>
            <p class="text-left">Jenis Kucing<span class="ml-17">${invoiceData.booking.jenis_kucing}</span></p>
        </div>`;

        // Mengisi data Rencana CheckIn dan Rencana CheckOut
        document.getElementById('checkInDate').textContent = formatDate(invoiceData.booking.check_in);
        document.getElementById('checkOutDate').textContent = formatDate(invoiceData.booking.check_out);

        // Fungsi untuk mengubah format nilai menjadi mata uang Rupiah
        function formatCurrency(value) {
            // Mengubah nilai menjadi angka
            var numericValue = parseFloat(value) || 0;

            // Mengembalikan nilai dengan format mata uang
            return 'Rp ' + numericValue.toLocaleString('id-ID');
        }



        // Fungsi untuk mengubah format waktu
        function formatDate(dateString) {
            var options = {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: 'numeric',
                minute: 'numeric'
            };

            // Periksa apakah dateString tidak null atau undefined sebelum menggantinya
            if (dateString) {
                return new Date(dateString.replace(' ', 'T')).toLocaleDateString('id-ID', options);
            } else {
                return ''; // Atau nilai default sesuai kebutuhan
            }
        }

        function goToHomePage() {
            // Clear sessionStorage
            sessionStorage.clear();

            // Redirect to the home page
            window.location.href = "{{ route('home.index') }}";
        }
    </script>
@endpush
