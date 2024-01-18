@extends('layouts.auth.app')

@section('title', __('Cat Point - Register'))

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

                                    <form id="registerForm">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('CatPointTA/images/cat-logo.png') }}" alt=""
                                                style="width: 50px;">
                                            <span class="h1 fw-bold mb-0">Cat Point</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register Akun</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <input type="email" id="name" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email address</label>
                                            <input type="email" id="email" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27"> Konfirmasi Password</label>
                                            <input type="password" id="confirm-password"
                                                class="form-control form-control-lg" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn-submit btn-lg btn-block" type="button"
                                                id="registerButton">Register</button>
                                        </div>


                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Do have an account? <a
                                                href="{{ route('auth.login') }}" style="color: #393f81;">Login here</a></p>
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
    <script>
        $(document).ready(function() {
            $("#registerButton").click(function() {
                var fullName = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirmPassword = $("#confirm-password").val();

                if (password !== confirmPassword) {
                    alert("Password and Confirm Password must match.");
                    return;
                }

                var formData = {
                    name: fullName,
                    email: email,
                    password: password,
                    role: 'user',
                    alamat: 'alamat',
                    no_hp: '0123456789'
                };

                $.ajax({
                    type: "POST",
                    url: "http://149.129.244.179/api/register",
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        console.log('Registrasi berhasil', response);

                        // Redirect ke halaman tertentu setelah berhasil registrasi
                        window.location.href = "{{ route('auth.login') }}";
                    },
                    error: function(error) {
                        console.log('Registrasi gagal', error);
                    }
                });
            });
        });
    </script>
@endpush
