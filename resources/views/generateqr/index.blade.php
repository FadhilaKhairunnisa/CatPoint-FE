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
        // Mengambil nilai invoiceId dari sessionStorage
        var invoiceId = sessionStorage.getItem('invoiceId');
        // Mengambil nilai grossAmount dari sessionStorage
        var grossAmount = sessionStorage.getItem('gross_amount');
        // Mengambil nilai expiryTime dari sessionStorage
        var expiryTime = sessionStorage.getItem('expiry_time');

        // Menghilangkan tanda kutip ganda dari invoiceId jika ada
        invoiceId = invoiceId ? invoiceId.replace(/"/g, '') : '';
        // Menghilangkan tanda kutip ganda dari grossAmount jika ada
        grossAmount = grossAmount ? grossAmount.replace(/"/g, '') : '';
        // Menghilangkan tanda kutip ganda dari expiryTime jika ada
        expiryTime = expiryTime ? expiryTime.replace(/"/g, '') : '';
        // Mengubah format grossAmount menjadi mata uang Rupiah jika ada
        grossAmount = grossAmount ? formatCurrency(grossAmount) : '';
        // Mengubah format expiryTime menjadi format waktu yang sesuai jika ada
        expiryTime = expiryTime ? formatExpiryTime(expiryTime) : '';

        // Menetapkan nilai invoiceId ke dalam elemen dengan id 'invoiceId'
        document.getElementById('invoiceId').textContent = invoiceId;
        // Menetapkan nilai grossAmount ke dalam elemen dengan id 'nominal'
        document.getElementById('nominal').textContent = grossAmount;
        // Menetapkan nilai expiryTime ke dalam elemen dengan id 'dueDate'
        document.getElementById('dueDate').textContent = expiryTime;

        // Fungsi untuk mengubah format nilai menjadi mata uang Rupiah
        function formatCurrency(value) {
            return 'Rp ' + parseFloat(value).toLocaleString('id-ID');
        }

        // Fungsi untuk mengubah format waktu menjadi format yang sesuai
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

        function getInvoiceData() {
            $.ajax({
                url: 'http://149.129.244.179/api/invoice',
                headers: {
                    Authorization: "Bearer " + localStorage.getItem('token')
                },
                method: 'GET',
                success: function(response) {
                    // Cek apakah invoice_id sesuai dengan invoiceId dari session storage
                    var matchingInvoice = response.result.find(function(invoice) {
                        return invoice.invoice_id == invoiceId;
                    });

                    if (matchingInvoice) {
                        // Jika sesuai, perbarui status pembayaran menjadi SUKSES
                        updatePaymentStatus(matchingInvoice.booking_id, matchingInvoice.order_id);
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        // Fungsi untuk mengupdate status pembayaran menjadi SUKSES
        function updatePaymentStatus(bookingId, orderId) {
            $.ajax({
                url: 'http://149.129.244.179/api/invoice',
                headers: {
                    Authorization: "Bearer " + localStorage.getItem('token')
                },
                method: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify({
                    booking_id: bookingId,
                    order_id: orderId,
                    status_pembayaran: 'SUKSES'
                }),
                success: function(response) {
                    console.log('Status pembayaran berhasil diperbarui:', response);

                    // Jika status masih PENDING, lakukan pengecekan ulang setelah 30 detik
                    if (response.result.status_pembayaran === 'PENDING') {
                        setTimeout(function() {
                            getInvoiceData();
                        }, 30000); // 30 detik
                    } else if (response.result.status_pembayaran === 'SUKSES') {
                        // Jika status_pembayaran sudah SUKSES, arahkan ke halaman invoice
                        redirectToInvoicePage(response.result.invoice_id);

                        // Bersihkan session storage
                        sessionStorage.clear();
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        // Panggil fungsi getInvoiceData untuk memulai proses
        getInvoiceData();




        function redirectToInvoicePage(invoiceId) {
            var invoiceUrl = '{{ route('home.invoice', ':id') }}';
            invoiceUrl = invoiceUrl.replace(':id', invoiceId);
            window.location.href = invoiceUrl;
        }
    </script>
@endpush
