@extends('layouts.app')

@section('title', __('Cat Point'))

@section('content')

    <section id="hero">
        <div class="container-fluid " style="background-color: #F3D0B3;">
            <div class="container content-below-navbar h-100">
                <div class="row h-100">
                    <div class="col-5 hero-text offset-1 py-5 hiro-tagline my-auto" class="rounded float-start">
                        <h2 class="h2 fw-bold ">
                            Buy for your
                            Pet What ever its Need</h2>
                        <p>Booking sekarang Pet Hotel CatPoint, dengan fasilitas lengkap untuk
                            Anabul Kesayangan anda. Dilengkapi dengan pet groming dan fasilitas
                            jasa antar jemput hewan kesayangan anda.</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('CatPointTA/images/Cathall1.png') }}" class="img-fluid position-absolute end-0 bottom-0 img-hero">
        <!-- <img src="images/Group 64.png" alt="" class=" position-absolute paw-image"> -->
    </section>
    </div>
    <!-- end slider section -->

    <section class="offer_section layout_padding-bottom mt-5">
        <section id="service">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="font-weight-bold">We look after your pets
                                <br /> our best service
                            </h3>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 offset-md-2 text-center">
                            <div class="card-service">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ asset('CatPointTA/images/Serpet-shop_1.png') }}" alt=""
                                        class=" translate-middle">
                                </div>
                                <h4 class="mt-3 ">Pet Hotel</h4>
                                <p>“Nyaman dan penuh kasih sayang. Dalam
                                    Fitur Pet Hotel, kucing kesayangan Anda
                                    akan menikmati penginapan yang nyaman
                                    dan perawatan yang penuh kasih sayang
                                    selama Anda pergi.”</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="card-service">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ asset('CatPointTA/images/serpet-shampoo_2.png') }}" alt=""
                                        class="translate-middle">
                                </div>
                                <h4 class="mt-3">Pet Grooming</h4>
                                <p>"Pet Grooming yang komprehensif untuk
                                    menjaga penampilan dan kesehatan kucing
                                    Anda. Para ahli kami siap memberikan
                                    perawatan terbaik untuk bulu, kuku, dan
                                    kesejahteraan kucing kesayangan Anda."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- end offer section -->

    <!-- food section -->
    <section id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-4">Pet Hotel</h3>
                    <p>Pilih layanan nyaman, penuh kasih sayang dan sesuai kebutuhan untuk kucing tersayang anda</p>
                </div>
            </div>
            <div class="row">
                @foreach ($resService['result'] as $key => $treatment)
                    <div class="col-md-6">
                        <div class="row mt-4 text-center">
                            <div class="card-layanan">
                                <div class="circle-iconn position-relative mx-auto">
                                    @if (!empty($treatment['gambar']))
                                        <img src="{{ asset($treatment['gambar']) }}" alt="{{ $treatment['paket_fluffy'] }}">
                                    @else
                                        <!-- Default image if the treatment doesn't have a specific image -->
                                        <img src="{{ asset('default_image_path.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <h4 class="mt-3 font-weight-bold">{{ $treatment['paket_fluffy'] }}
                                    {{ $treatment['harga'] }}/hari</h4>
                                <p>{{ $treatment['deskripsi'] }}</p>
                            </div>
                        </div>
                    </div>
                    @if (($key + 1) % 2 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-4 mt-5">Pet Grooming</h3>
                    <p>Pilih untuk menjaga penampilan dan kesehatan kucing tersayang Anda </p>
                </div>
            </div>
            <div class="row row-treatment">
                @php
                    // Array of static image paths
                    $staticImages = ['CatPointTA/images/layanan1.png', 'CatPointTA/images/layanan2.png', 'CatPointTA/images/layanan3.png', 'CatPointTA/images/layanan4.png'];
                @endphp

                @foreach ($resTreatment['result'] as $key => $treatment)
                    <div class="col-md-6">
                        <div class="row mt-4 text-center">
                            <div class="card-layanan">
                                <div class="circle-iconn position-relative mx-auto">
                                    @if (isset($staticImages[$key]))
                                        <img src="{{ asset($staticImages[$key]) }}" alt="">
                                    @else
                                        <!-- Default image if the index is out of bounds -->
                                        <img src="{{ asset('default_image_path.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <h4 class="mt-3 font-weight-bold">{{ $treatment['paket'] }} {{ $treatment['harga'] }}/hari
                                </h4>
                                <p>{{ $treatment['deskripsi'] }}</p>
                            </div>
                        </div>
                    </div>
                    @if (($key + 1) % 2 == 0)
            </div>
            <div class="row row-treatment">
                @endif
                @endforeach
            </div>


        </div>
    </section>


    <section class="client_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    What our clients say about us
                </h3>
            </div>
            <div class="carousel-wrap row">
                <div class="owl-carousel client_owl-carousel">
                    <!-- Check if $resTestimoni is not null before looping through it -->
                    @if ($resTestimoni['result'])
                        @foreach ($resTestimoni['result'] as $testimonial)
                            <div class="item">
                                <div class="box">
                                    <div class="detail-box">
                                        <h6>{{ $testimonial['nama'] }}</h6>
                                        <p>{{ $testimonial['deskripsi'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No testimonials available.</p>
                    @endif

                </div>
            </div>
        </div>
    </section>



    <section class="client_section layout_padding-bottom mt-5" id="loggedInContent">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    Booking
                </h3>
            </div>
            <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Buat hewan peliharaan anda nyaman dan aman meski anda sedang berpergiaan atau hanya
                    keluar
                    sepanjang hari </p>
                <div class="card">
                    <form class="form-card">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nama<span class="text-danger"> *</span></label> <input
                                    type="text" id="nama_pemilik" name="nama_pemilik"
                                    placeholder="Enter your first name"> </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">No
                                    Handphone<span class="text-danger"> *</span></label> <input type="number"
                                    id="no_telfon" name="no_telfon" placeholder="Enter your last name"
                                    onblur="validate(2)">
                            </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nama
                                    Hewan<span class="text-danger"> *</span></label> <input type="text"
                                    id="nama_hewan" name="nama_hewan" placeholder="Enter your last name"
                                    onblur="validate(2)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-8 flex-column d-flex"> <label
                                    class="form-control-label px-3">Alamat<span class="text-danger"> *</span></label>
                                <input type="text" id="alamat" name="alamat" placeholder=""
                                    onblur="validate(3)">
                            </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Ciri Khusus Hewan<span class="text-danger">
                                        *</span></label> <input type="text" id="ciri_khusus_hewan"
                                    name="ciri_khusus_hewan" placeholder="" onblur="validate(4)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Rencana Waktu CheckIn<span class="text-danger">
                                        *</span></label> <input type="date" id="check_in" name="check_in"
                                    placeholder="Enter your first name" onblur="validate(1)"> </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Rencana Waktu CheckOut<span class="text-danger">
                                        *</span></label> <input type="date" id="check_out" name="check_out"
                                    placeholder="Enter your last name" onblur="validate(2)"> </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Jenis Kucing<span class="text-danger">
                                        *</span></label> <input type="text" id="jenis_kucing" name="jenis_kucing"
                                    placeholder="Enter your last name" onblur="validate(2)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Berat<span class="text-danger"> *</span></label>
                                <input type="number" id="berat" name="berat" placeholder="Enter your first name"
                                    min=0 onblur="validate(1)">
                            </div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Jenis Kelamin<span class="text-danger">
                                        *</span></label> <select type="text" id="jenis_kelamin_kucing"
                                    name="jenis_kelamin_kucing" placeholder="Enter your last name" onblur="validate(2)">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="jantan">Jantan</option>
                                    <option value="betina">Betina</option>
                                </select></div>
                            <div class="form-group col-sm-4 flex-column d-flex"> <label
                                    class="form-control-label px-3">Usia Kucing<span class="text-danger"> *</span></label>
                                <input type="number" id="umur_kucing" name="umur_kucing"
                                    placeholder="Enter your last name" min=0 onblur="validate(2)">
                            </div>
                        </div>
                        <div class="text-left mb-2">Cat Treatment</div>
                        <div class="row text-left">
                            <!-- Cat Treatment options -->
                            <div class="checkbox-wrapper-1 form-group col-sm-4 flex-column d-flex"
                                id="catTreatmentOptions">
                                <!-- Options will be dynamically added here -->
                            </div>


                        </div>
                        <div class="text-left mb-2">Cat Service</div>
                        <div class="row text-left">
                            <div class="checkbox-wrapper-1 form-group col-sm-4 flex-column d-flex" id="catServiceOptions">
                                <!-- Options will be dynamically added here -->
                            </div>
                        </div>
                        <hr>
                        <div>
                            <p class="text-right">Total Pembayaran <span id="totalAmount" class="ml-4 text-harga">Rp
                                    0</span></p>
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="form-group col-sm-6"><button type="submit"
                                    class="btn-block btn-submit">Next</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="client_section layout_padding-bottom mt-5" id="loggedOutContent" style="display: none">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    Booking Sekarang
                </h3>
            </div>
            <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <p class="blue-text">Silahkan Login terlebih dahulu untuk Booking</p>
                    <div class="pt-1 mb-4">
                        <a href="{{ route('auth.login') }}"><button class="btn-submit btn-lg btn-block"
                                style="width: 300px;" type="button">Booking</button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    <!-- book section -->
    <section class="book_section layout_padding" id="contact">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Any Questions?
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="">
                            <div>
                                <input type="text" name="nama_pemilik" class="form-control"
                                    placeholder="Your Name" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Your Email" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Your Question" />
                            </div>
                            <div class="btn_box">
                                <button>
                                    Ask Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- client section -->



    <!-- end client section -->
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F3D0B3" fill-opacity="1"
                d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

@endsection

@push('css')
    <style>
        .row-treatment {
            padding-left: 7rem !important;
            padding-right: 7rem !important;
        }

        .mt-5 {
            margin-top: 5rem !important;
        }

        @media (max-width: 768px) {
            .row-treatment {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }

            .mt-5 {
                margin-top: 2rem !important;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Inisialisasi variabel untuk treatment dan service yang dipilih
        var selectedTreatmentRadio;
        var selectedServiceRadio;

        // Fungsi untuk mengupdate total harga
        function updateTotal() {
            // Mendapatkan radio button treatment yang dipilih
            selectedTreatmentRadio = $('input[name=treatment_id]:checked');
            // Mendapatkan radio button service yang dipilih
            selectedServiceRadio = $('input[name=service_id]:checked');

            // Menghitung harga treatment yang dipilih, default 0 jika tidak ada yang dipilih
            var treatmentPrice = selectedTreatmentRadio.length ? parseFloat(selectedTreatmentRadio.attr('data-harga')) : 0;
            // Menghitung harga service yang dipilih, default 0 jika tidak ada yang dipilih
            var servicePrice = selectedServiceRadio.length ? parseFloat(selectedServiceRadio.attr('data-harga')) : 0;

            // Menampilkan harga treatment dan service di console
            console.log('treatmentPrice', treatmentPrice);
            console.log('servicePrice', servicePrice);

            // Menghitung total harga
            var totalAmount = treatmentPrice + servicePrice;
            // Menampilkan total harga di console
            console.log('cek', totalAmount);

            // Mengupdate tampilan total harga pada halaman
            $('#totalAmount').text('Rp ' + totalAmount.toFixed(2));
        }

        // Fungsi untuk mendapatkan harga treatment berdasarkan ID treatment
        function getTreatmentPrice(treatmentId) {
            var treatments = data.result;
            // Menampilkan data treatment yang dipilih di console
            console.log('treatment data ', treatment);
            // Mencari treatment berdasarkan ID
            var selectedTreatment = treatments.find(function(treatment) {
                return treatment.id == treatmentId;
            });

            // Mengembalikan harga treatment, default 0 jika tidak ditemukan
            return selectedTreatment ? parseFloat(selectedTreatment.harga) : 0;
        }

        // Fungsi untuk mendapatkan harga service berdasarkan ID service
        function getServicePrice(serviceId) {
            var services = data.result;
            // Menampilkan data service yang dipilih di console
            console.log('services data ', services);

            // Mencari service berdasarkan ID
            var selectedService = services.find(function(service) {
                return service.id == serviceId;
            });

            // Mengembalikan harga service, default 0 jika tidak ditemukan
            return selectedService ? parseFloat(selectedService.harga) : 0;
        }

        // Event handler untuk perubahan pada radio button treatment dan service
        $('input[name=treatment_id], input[name=service_id]').change(function() {
            console.log('hit');
            // Memanggil fungsi updateTotal() ketika terjadi perubahan
            updateTotal();
        });

        // Event handler ketika halaman telah selesai dimuat
        $(document).ready(function() {
            // Mengambil data treatment melalui AJAX
            $.ajax({
                url: 'http://149.129.244.179/api/treatment',
                method: 'GET',
                headers: {
                    Authorization: "Bearer " + localStorage.getItem('token')
                },
                success: function(data) {
                    var catTreatmentOptions = $('#catTreatmentOptions');
                    // Menambahkan radio button treatment berdasarkan data yang diterima
                    $.each(data.result, function(index, option) {
                        catTreatmentOptions.append('<input id="catTreatment-' + index +
                            '" class="substituted" type="radio" name="treatment_id" value="' +
                            option.id + '" data-harga="' + option.harga +
                            '" onchange="updateTotal()" />' +
                            '<label for="catTreatment-' + index + '">' + option.paket +
                            '</label>');
                    });
                },
                error: function(error) {
                    console.log('Error fetching Cat Treatment options:', error);
                }
            });

            // Mengambil data service melalui AJAX
            $.ajax({
                url: 'http://149.129.244.179/api/service',
                method: 'GET',
                headers: {
                    Authorization: "Bearer " + localStorage.getItem('token')
                },
                success: function(data) {
                    var catServiceOptions = $('#catServiceOptions');
                    // Menambahkan radio button service berdasarkan data yang diterima
                    $.each(data.result, function(index, option) {
                        console.log('data service', option);

                        catServiceOptions.append('<input id="catService-' + index +
                            '" class="substituted" type="radio" name="service_id" value="' +
                            option.id + '" data-harga="' + option.harga +
                            '" onchange="updateTotal()" />' +
                            '<label for="catService-' + index + '">' + option.paket_fluffy +
                            '</label>');
                    });
                },
                error: function(error) {
                    console.log('Error fetching Cat Service options:', error);
                }
            });

            // Event handler untuk submit form
            $('form.form-card').submit(function(event) {
                event.preventDefault();

                // Fungsi untuk memformat tanggal
                var formatDate = function(date) {
                    var d = new Date(date);
                    var month = ('0' + (d.getMonth() + 1)).slice(-2);
                    var day = ('0' + d.getDate()).slice(-2);
                    var year = d.getFullYear();
                    var hours = ('0' + d.getHours()).slice(-2);
                    var minutes = ('0' + d.getMinutes()).slice(-2);
                    var seconds = ('0' + d.getSeconds()).slice(-2);

                    return [year, month, day].join('-') + ' ' + [hours, minutes, seconds].join(':');
                };

                // Mengambil data form
                var formData = {
                    nama_pemilik: $('#nama_pemilik').val(),
                    no_telfon: $('#no_telfon').val(),
                    alamat: $('#nama_hewan').val(),
                    nama_hewan: $('#alamat').val(),
                    ciri_khusus_hewan: $('#ciri_khusus_hewan').val(),
                    check_in: formatDate($('#check_in').val()),
                    check_out: formatDate($('#check_out').val()),
                    jenis_kucing: $('#jenis_kucing').val(),
                    berat: $('#berat').val(),
                    jenis_kelamin_kucing: $('#jenis_kelamin_kucing').val(),
                    umur_kucing: $('#umur_kucing').val(),
                    treatment_id: selectedTreatmentRadio.val(),
                    service_id: selectedServiceRadio.val()
                };

                // Menampilkan data form di console
                console.log('isi', formData)

                // Melakukan pengiriman data form melalui AJAX
                $.ajax({
                    url: 'http://149.129.244.179/api/book',
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem('token')
                    },
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        console.log('Booking successful:', response);
                        var confirmationId = response.result.order_id;
                        var total = response.result.total_pembayaran;
                        var hargaService = response.result.service.harga;
                        var hargaTreatment = response.result.treatment.harga;
                        var orderId = response.result.order_id;

                        sessionStorage.setItem('order_id', orderId);
                        sessionStorage.setItem('harga_service', hargaService);
                        sessionStorage.setItem('harga_treatment', hargaTreatment);
                        sessionStorage.setItem('total_pembayaran', total);


                        // Generate URL menggunakan route name dan redirect
                        var confirmationUrl = '{{ route('home.confirmation', ':id') }}';
                        confirmationUrl = confirmationUrl.replace(':id', confirmationId);
                        window.location.href = confirmationUrl;
                    },
                    error: function(error) {
                        // Handle error response
                        console.log('Booking error:', error);
                    }
                });
            });
        });
    </script>
@endpush
