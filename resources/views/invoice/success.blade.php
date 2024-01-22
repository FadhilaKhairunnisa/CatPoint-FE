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
            <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Periksa kembali pesanan anda terkait pesanan.
                    Satu langkah lagi menyelesaikan pesanan anda </p>
                <div class="card">
                    <div>
                        <p class="text-left">Invoice ID <span class="ml-10" id="invoiceId"></span></p>
                    </div>
                    <div>
                        <p class="text-left">Nominal Tagihan<span class="ml-6 " id="nominalTagihan"></span></p>
                    </div>
                    <div>
                        <p class="text-left">Status Pembayaran <span class="ml-5" id="statusPembayaran"></span></p>
                    </div>
                    <div>
                        <p class="text-left">Kode QR</p>
                    </div>
                    <img src="{{ asset('CatPointTA/images/qris.png') }}" alt="" class="d-flex mx-auto" width="200px">
                    <img src="{{ asset('CatPointTA/images/ceklis.png') }}" alt="" class="d-flex mx-auto" width="400px">
                    <h2 class="text-succes mt-0 text-base" id="statusText"></h2>
                    <p class="mt-2 text-succes">Transaksi Diterima</p>
                    <p class="text-center mt-5">Untuk melakukan pembayaran, Silahkan Scan Barcode melalui Aplikasi
                        pembayaran Anda(OVO, GOPAY, Mobile Banking, dll).</p>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> <a href="{{ route('home.invoice', $invoice_id) }}"><button
                                    type="button" class="btn-block btn-submit">Next</button></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('css')
<style>
    .ml-5 {
        margin-left: 133px !important;
    }
</style>
@endpush

@push('js')
    <script>
        // Mengambil data dari sessionStorage
        var invoiceData = JSON.parse(sessionStorage.getItem('invoice_info'));

        // Mengisi data Invoice ID, Nominal Tagihan, Status Pembayaran, dan Kode QR
        document.getElementById('invoiceId').textContent = invoiceData.id;
        document.getElementById('nominalTagihan').textContent = formatCurrency(invoiceData.booking.service.harga +
            invoiceData.booking.treatment.harga);
        document.getElementById('statusPembayaran').textContent = invoiceData.status_pembayaran === 'settlement' ?
            'BERHASIL' : 'PENDING';
        document.getElementById('statusText').textContent = invoiceData.status_pembayaran === 'settlement' ?
            'PEMBAYARAN BERHASIL' : 'PEMBAYARAN PENDING';

        // Fungsi untuk mengubah format nilai menjadi mata uang Rupiah
        function formatCurrency(value) {
            return 'Rp ' + parseFloat(value).toLocaleString('id-ID');
        }
    </script>
@endpush
