@extends('layouts.admin.app')

@section('title', __('Cat Point - Invoice'))

@section('content')
    <div class="container">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row pb-5">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Invoice</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/superadmin" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">invoice
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid ">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List Of Invoice</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pemilik</th>
                                                <th>Status Pembayaran</th>
                                                <th>No Telfon</th>
                                                <th>Alamat</th>
                                                <th>Nama Hewan</th>
                                                <th>Treatment Paket</th>
                                                <th>Treatment Harga</th>
                                                <th>Service Paket</th>
                                                <th>Service Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order table -->
                <!-- ============================================================== -->
            </div>
            <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-tambahLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="modal-tambahLabel">Form Tambah Produl
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Tambahkan Akun Cabang</h4>
                                        <form method="POST" enctype="multipart/form-data" class="mt-4">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" class="form-control border-primary"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="location_id">Lokasi Cabang</label>
                                                <select name="location_id" id="location_id">
                                                    <option disabled selected>Pilih Lokasi Cabang</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Email</label>
                                                <input type="email" name="email" class="form-control border-primary"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Password</label>
                                                <input type="password" name="password" class="form-control border-primary"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-light">Kosongkan</button>
                                                <button type="submiy" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-editLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="modal-editLabel">Form Tambah Produl
                            </h4>
                            <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Product</h4>
                                        <form method="POST" enctype="multipart/form-data" class="mt-4">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" class="form-control border-primary"
                                                    value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="location_id">Lokasi Cabang</label>
                                                <select name="location_id" id="location_id">
                                                    <option value="" selected></option>
                                                </select>
                                                <input type="text" name="name" class="form-control border-primary"
                                                    value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control border-primary"
                                                    value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control border-primary" placeholder="Type Password"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="outlet_detail_id">Posisi Outlet</label>
                                                <select name="outlet_detail_id" id="outlet_detail_id">
                                                    <option disabled selected>Pilih Posisi Outlet</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submiy" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Fetch data from the API endpoint
            $.ajax({
                url: 'http://149.129.244.179/api/invoice',
                type: 'GET',
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                },
                success: function(data) {
                    if (data.rc === 200 && data.success) {
                        // Populate the table with data
                        var table = $('#zero_config').DataTable({
                            data: data.result,
                            columns: [{
                                    data: null,
                                    render: function(data, type, row, meta) {
                                        return meta.row + 1;
                                    }
                                },
                                {
                                    data: 'booking.nama_pemilik'
                                },
                                {
                                    data: 'status_pembayaran',
                                    render: function(data) {
                                        if (data === 'settlement') {
                                            return '<span class="badge bg-success text-white">Sukses</span>';
                                        } else if (data === 'pending' || data === 'PENDING') {
                                            return '<span class="badge bg-warning text-white">Pending</span>';
                                        } else {
                                            return data;
                                        }
                                    }
                                },
                                {
                                    data: 'booking.no_telfon'
                                },
                                {
                                    data: 'booking.alamat'
                                },
                                {
                                    data: 'booking.nama_hewan'
                                },
                                {
                                    data: 'booking.treatment',
                                    render: function(data) {
                                        return data ? data.paket : '-';
                                    }
                                },
                                {
                                    data: 'booking.treatment',
                                    render: function(data) {
                                        return data ? 'Rp.' + data.harga : '-';
                                    }
                                },
                                {
                                    data: 'booking.service',
                                    render: function(data) {
                                        return data ? data.paket_fluffy : '-';
                                    }
                                },
                                {
                                    data: 'booking.service',
                                    render: function(data) {
                                        return data ? 'Rp.' + data.harga : '-';
                                    }
                                },
                            ]
                        });

                    } else {
                        console.error('Error fetching data from the API');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
@endpush
