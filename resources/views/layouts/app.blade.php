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
