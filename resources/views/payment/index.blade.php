@extends('layouts.app')

@section('title', __('Cat Point - Payment'))

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
                    anda
                </p>
                <div class="card">
                    <form id="paymentForm">
                        <div>
                            <p class="text-right" id="selectedBookingTreatment">Cat Treatment <span class="ml-4">Rp
                                </span></p>
                        </div>
                        <div>
                            <p class="text-right" id="selectedBookingService">Cat Service <span class="ml-4 ">Rp
                                </span></p>
                        </div>
                        <!-- Total Pembayaran -->
                        <div>
                            <p class="text-right" id="totalHarga">Total Pembayaran <span class="ml-4 text-harga">Rp
                                </span></p>
                        </div>
                        <hr>
                        <div>
                            <div class="checkbox-wrapper-1 col-sm-12 ">
                                <input id="agreeCheckbox" class="substituted" type="checkbox" />
                                <label for="agreeCheckbox" class="text-left">
                                    <span class="checkbox"></span>
                                    Saya menyatakan informasi yang diisi sudah sesuai dan dapat dipertanggung jawabkan. Jika
                                    dikemudian hari ada ketidak sesuaian data dan uang sudah ditransfer tidak dapat diambil
                                    kembali
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-4">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block btn-submit">Next</button>
                            </div>
                        </div>
                    </form>

                    {{-- <form id="generateQrForm" style="display: none;">
                        <input type="hidden" name="order_id" id="order_id">
                    </form> --}}
                </div>
            </div>
        </div>
    </section>

@endsection


@push('css')
    <style>
        .checkbox-wrapper-1 {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper-1 input {
            margin-right: 10px;
        }

        .checkbox-wrapper-1 label {
            display: flex;
            align-items: center;
        }
    </style>
@endpush


@push('js')
    <script>
        $(document).ready(function() {
            // Mengatur tombol "Next" menjadi nonaktif saat halaman dimuat
            $(".btn-submit").prop("disabled", true);

            // Mengaktifkan/menonaktifkan tombol "Next" berdasarkan status checkbox "agreeCheckbox"
            $("#agreeCheckbox").change(function() {
                var isChecked = $(this).prop("checked");
                $(".btn-submit").prop("disabled", !isChecked);
            });

            var hargaService = parseFloat(sessionStorage.getItem('harga_service')) || 0;
            $("#selectedBookingService span").text(formatCurrency(hargaService));

            // Menampilkan harga treatment saat pertama kali memuat halaman
            var hargaTreatment = parseFloat(sessionStorage.getItem('harga_treatment')) || 0;
            $("#selectedBookingTreatment span").text(formatCurrency(hargaTreatment));

            // Menampilkan total pembayaran saat pertama kali memuat halaman
            var totalPembayaran = parseFloat(sessionStorage.getItem('total_pembayaran')) || 0;
            $("#totalHarga span").text(formatCurrency(totalPembayaran));


            // Fungsi untuk memformat angka ke format mata uang
            function formatCurrency(value) {
                return "Rp " + value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }

            // Menangani pengiriman data pembayaran saat form "paymentForm" disubmit
            $("#paymentForm").submit(function(e) {
                e.preventDefault();
                if (!$("#agreeCheckbox").prop("checked")) {
                    alert("Please agree to the terms before proceeding.");
                } else {
                    // var hargaService = parseFloat(sessionStorage.getItem('harga_service'));
                    // var hargaTreatment = parseFloat(sessionStorage.getItem('harga_treatment'));
                    // var totalPembayaran = parseFloat(sessionStorage.getItem('total_pembayaran'));
                    var orderId = parseInt(sessionStorage.getItem('order_id'));


                    // Menyiapkan data untuk dikirim melalui AJAX
                    var formData = {
                        order_id: orderId
                    };

                    console.log('isi form', formData);

                    // Mengirim data untuk menghasilkan QR code ke server melalui AJAX
                    $.ajax({
                        type: "POST",
                        url: "http://149.129.244.179/api/generateqr",
                        headers: {
                            Authorization: "Bearer " + localStorage.getItem('token')
                        },
                        contentType: 'application/json',
                        data: JSON.stringify(formData),
                        success: function(response) {
                            sessionStorage.removeItem('harga_service');
                            sessionStorage.removeItem('harga_treatment');
                            sessionStorage.removeItem('total_pembayaran');
                            sessionStorage.removeItem('order_id');
                            console.log('sukses generateqr', response.result);

                            var trx_id = response.result.transaction_id;
                            var order_id = response.result.order_id;
                            var invoice_id = response.result.invoice_id;
                            var gross_amount = response.result.gross_amount;
                            var expiry_time = response.result.expiry_time;

                            // Menyimpan data penting ke sessionStorage
                            sessionStorage.setItem('invoice_id', JSON.stringify(invoice_id));
                            sessionStorage.setItem('order_id', JSON.stringify(order_id));
                            sessionStorage.setItem('gross_amount', JSON.stringify(
                            gross_amount));
                            sessionStorage.setItem('expiry_time', JSON.stringify(expiry_time));

                            // Mengarahkan pengguna ke halaman untuk menampilkan QR code
                            if (trx_id) {
                                var generateUrl = '{{ route('home.generate', ':id') }}';
                                generateUrl = generateUrl.replace(':id', trx_id);
                                window.location.href = generateUrl;
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    // Memeriksa apakah nilai service, treatment, atau total tidak valid
                    // if (isNaN(hargaService) || isNaN(hargaTreatment) || isNaN(totalPembayaran)) {
                    //     alert("Invalid service, treatment, or total value. Please check and try again.");
                    //     return;
                    // }

                    // var bookingId = parseInt("{{ $id }}", 10);

                    // console.log(bookingId);

                    // // Menyiapkan data untuk dikirim melalui AJAX
                    // var formData = {
                    //     total_harga: totalPembayaran,
                    //     booking_id: orderId
                    // };

                    // // Mengirim data pembayaran ke server melalui AJAX
                    // $.ajax({
                    //     type: "POST",
                    //     url: "http://149.129.244.179/api/order",
                    //     headers: {
                    //         Authorization: "Bearer " + localStorage.getItem('token')
                    //     },
                    //     contentType: 'application/json',
                    //     data: JSON.stringify(formData),
                    //     success: function(response) {
                    //         console.log('sukses', response);

                    //         sessionStorage.removeItem('harga_service');
                    //         sessionStorage.removeItem('harga_treatment');
                    //         sessionStorage.removeItem('total_pembayaran');

                    //         var order_id = response.result.id;

                    //         console.log('orderid', order_id);
                    //         $("#order_id").val(order_id);

                    //         var totalHarga = response.result.total_harga;

                    //         sessionStorage.setItem('total_harga', totalHarga);
                    // console.log('hit order');


                    //         // Mengirim data invoice setelah mendapatkan order_id
                    //         // postInvoiceData(bookingId, order_id);

                    //         // Mengirim form generateQrForm untuk menampilkan QR code
                    //         $("#generateQrForm").submit();
                    //     },
                    //     error: function(error) {
                    //         console.log(error);
                    //     }
                    // });
                }
            });

            // Menangani pengiriman data untuk menghasilkan QR code saat form "generateQrForm" disubmit



        });
    </script>
@endpush
