@extends('layouts.auth.app')

@section('title', __('Cat Point - Login'))

@section('content')
    <!-- client section -->
    <section class="vh-100" style="background-color: #F3D0B3;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('CatPointTA/images/login2.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('CatPointTA/images/cat-logo.png') }}" alt=""
                                                style="width: 50px;">
                                            <span class="h1 fw-bold mb-0">Cat Point</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Masukan Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn-submit btn-lg btn-block" type="button"
                                                onclick="handleLogin()">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Lupa Password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{ route('auth.register') }}" style="color: #393f81;">Register
                                                here</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end client section -->
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F3D0B3" fill-opacity="1"
                d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script>
        function handleLogin() {
            var email = $("#email").val();
            var password = $("#password").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var formData = {
                email: email,
                password: password,
            };

            $.ajax({
                type: "POST",
                
                // url: "{{ route('auth.login.process') }}",
                url: "http://149.129.244.179/api/login",
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function(response) {
                    console.log('Login berhasil', response);

                    Cookies.set('token', response.token, { expires: 1 }); // Expires in 7 days

                    // Menyimpan token di localStorage
                    localStorage.setItem('token', response.token);

                    // Redirect ke halaman tertentu setelah berhasil login
                    window.location.href = "{{ route('home.index') }}";
                },
                error: function(error) {
                    console.log('Login gagal', error);
                }
            });
        }
    </script>
@endpush
