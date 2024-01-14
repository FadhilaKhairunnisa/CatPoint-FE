<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/cat-logo.png" type="">

    <title> @yield('title') </title>

    @include('layouts.additional.style')

    @stack('css')


</head>

<body>

    <div class="hero_area">
        <div class="bg-box">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            @include('layouts.navbar')
        </header>
        <!-- end header section -->
        <!-- slider section -->
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
        <!-- end slider section -->
    </div>

    @yield('content')

    <!-- footer section -->
    <footer class="footer_section">
        @include('layouts.footer')
    </footer>
    <!-- footer section -->

    @include('layouts.additional.script')

    @stack('js')


</body>

</html>
