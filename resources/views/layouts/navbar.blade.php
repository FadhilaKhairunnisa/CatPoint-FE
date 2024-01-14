<div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('CatPointTA/images/cat-logo.png') }}" alt=""
                style="width: 50px; margin-left: 20px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#booking">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <div class="user_option">
                <a href="{{ route('auth.login') }}" class="order_online">
                    Login
                </a>
            </div>
        </div>
    </nav>
</div>
