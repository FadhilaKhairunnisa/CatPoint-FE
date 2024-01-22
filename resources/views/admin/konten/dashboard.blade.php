@extends('layouts.admin.app')

@section('title', __('Cat Point - Dashboard Admin'))


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Service</div>
                                <div id="dataService" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Treatment</div>
                                <div id="dataTreatment" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Order
                                </div>
                                <div id="dataOrder" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Loading...</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <!-- Script JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Token Auth
            var token = localStorage.getItem('token');
            var headers = {
                Authorization: "Bearer " + token
            };

            // Function untuk mengambil dan mengisi data dari API
            function fetchData(endpoint, targetElement) {
                fetch(endpoint, {
                        method: 'GET',
                        headers: headers
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('data', data);
                        // Menampilkan data ke elemen HTML
                        var element = document.querySelector(targetElement);
                        element.innerHTML = ''; // Mengosongkan elemen sebelum menambahkan data baru

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(item => {
                                element.innerHTML += `<p>${item.name}: ${item.value}</p>`;
                            });
                        } else {
                            element.innerHTML = 'No data available';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Mengisi data service
            fetchData('http://149.129.244.179/api/service', '#dataService');

            // Mengisi data treatment
            fetchData('http://149.129.244.179/api/treatment', '#dataTreatment');

            // Mengisi data order
            fetchData('http://149.129.244.179/api/order', '#dataOrder');
        });
    </script>
@endpush
