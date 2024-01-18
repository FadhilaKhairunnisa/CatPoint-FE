@extends('layouts.app')

@section('title', __('Cat Point - QR Payment'))

@section('content')
    <section class="client_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    Konfirmasi Pembayaran
                </h3>
            </div>
            <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Periksa kembali pesanan anda terkait pesanan.
                    Satu langkah lagi menyelesaikan pesanan anda </p>
                <div class="card">
                    <div>
                        <p class="text-left">Invoice ID <span id="invoiceId" class="ml-10"></span></p>
                    </div>
                    <div>
                        <p class="text-left">Nominal Tagihan<span id="nominal" class="ml-6 "></span></p>
                    </div>
                    <div>
                        <p class="text-left">Lakukan Pembayaran Sebelum <span id="dueDate" class="ml-5"></span></p>
                    </div>
                    <div>
                        <p class="text-left">Kode QR</p>
                    </div>
                    <img src="{{ asset('CatPointTA/images/qris.png') }}" alt="" class="d-flex mx-auto"
                        width="200px">

                    <img src="data:image/png;base64,{{ base64_encode($qrCodeImage) }}" alt="QR Code" class="d-flex mx-auto"
                        width="500px">
                    <!-- Add any other necessary content or styling here -->
                    <p class="text-center mt-5">Untuk melakukan pembayaran, Silahkan Scan Barcode melalui Aplikasi
                        pembayaran Anda(OVO, GOPAY, Mobile Banking, dll).</p>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> <a href="stloginsucces.html"><button type="submit"
                                    class="btn-block btn-submit">Next</button></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('css')
@endpush


@push('js')
    <script>
        var invoiceId = sessionStorage.getItem('invoiceId');
        var grossAmount = sessionStorage.getItem('gross_amount');
        var expiryTime = sessionStorage.getItem('expiry_time');

        invoiceId = invoiceId ? invoiceId.replace(/"/g, '') : '';
        grossAmount = grossAmount ? grossAmount.replace(/"/g, '') : '';
        expiryTime = expiryTime ? expiryTime.replace(/"/g, '') : '';
        grossAmount = grossAmount ? formatCurrency(grossAmount) : '';
        expiryTime = expiryTime ? formatExpiryTime(expiryTime) : '';

        document.getElementById('invoiceId').textContent = invoiceId;
        document.getElementById('nominal').textContent = grossAmount;
        document.getElementById('dueDate').textContent = expiryTime;

        function formatCurrency(value) {
            return 'Rp ' + parseFloat(value).toLocaleString('id-ID');
        }

        function formatExpiryTime(dateString) {
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };
            var formattedDate = new Date(dateString.replace(' ', 'T')).toLocaleDateString('id-ID', options);
            return formattedDate;
        }
    </script>
@endpush
