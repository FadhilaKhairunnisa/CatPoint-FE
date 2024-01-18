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
                                    {{ $selectedTreatment['harga'] }}</span></p>
                        </div>
                        <div>
                            <p class="text-right" id="selectedBookingService">Cat Service <span class="ml-4 ">Rp
                                    {{ $selectedService['harga'] }}</span></p>
                        </div>
                        <!-- Total Pembayaran -->
                        <div>
                            <p class="text-right">Total Pembayaran <span class="ml-4 text-harga">Rp
                                    {{ $selectedTreatment['harga'] + $selectedService['harga'] }}</span></p>
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

                    <form id="generateQrForm" style="display: none;">
                        <input type="hidden" name="order_id" id="order_id">
                    </form>
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
            $(".btn-submit").prop("disabled", true);

            $("#agreeCheckbox").change(function() {
                var isChecked = $(this).prop("checked");
                $(".btn-submit").prop("disabled", !isChecked);
            });

            $("#paymentForm").submit(function(e) {
                e.preventDefault();
                if (!$("#agreeCheckbox").prop("checked")) {
                    alert("Please agree to the terms before proceeding.");
                } else {
                    var treatmentValue = parseFloat($("#selectedBookingTreatment span").text().replace("Rp",
                        "").replace(/,/g, ""));
                    var serviceValue = parseFloat($("#selectedBookingService span").text().replace("Rp", "")
                        .replace(/,/g, ""));

                    if (isNaN(treatmentValue) || isNaN(serviceValue)) {
                        alert("Invalid treatment or service value. Please check and try again.");
                        return;
                    }

                    var totalHarga = treatmentValue + serviceValue;
                    var bookingId = "{{ $selectedBooking['id'] }}";

                    var formData = {
                        total_harga: totalHarga,
                        booking_id: bookingId
                    };

                    $.ajax({
                        type: "POST",
                        url: "http://149.129.244.179/api/order",
                        contentType: 'application/json',
                        data: JSON.stringify(formData),
                        success: function(response) {
                            console.log('sukses', response);
                            var order_id = response.result.id;

                            console.log('orderid', order_id);
                            $("#order_id").val(order_id);

                            postInvoiceData(bookingId, order_id);

                            $("#generateQrForm").submit();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });

            // Second form submission for the second API endpoint
            $("#generateQrForm").submit(function(e) {
                e.preventDefault();

                var formData = {
                    order_id: $("#order_id").val()
                };

                console.log('isi form', formData);

                $.ajax({
                    type: "POST",
                    url: "http://149.129.244.179/api/generateqr",
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        console.log('sukses generateqr', response.result);

                        var trx_id = response.result.transaction_id;
                        var gross_amount = response.result.gross_amount;
                        var expiry_time = response.result.expiry_time;

                        sessionStorage.setItem('order_id', JSON.stringify(formData.order_id));
                        sessionStorage.setItem('gross_amount', JSON.stringify(gross_amount));
                        sessionStorage.setItem('expiry_time', JSON.stringify(expiry_time));


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
            });

            function postInvoiceData(bookingId, orderId) {
                var invoiceData = {
                    status_pembayaran: "PENDING",
                    booking_id: bookingId,
                    order_id: orderId
                };

                $.ajax({
                    type: "POST",
                    url: "http://149.129.244.179/api/invoice",
                    contentType: 'application/json',
                    data: JSON.stringify(invoiceData),
                    success: function(response) {
                        console.log('sukses invoice', response);
                        // Handle success, if needed

                        var invoice_id = response.result.id;

                        sessionStorage.setItem('invoice_id', JSON.stringify(invoice_id));
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle error, if needed
                    }
                });
            }

        });
    </script>
@endpush
