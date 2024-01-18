@extends('layouts.admin.app')

@section('title', __('Cat Point - Order'))

@section('content')
    <div class="container">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row pb-5">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Pesanan</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/superadmin" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Pesanan
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
                                <h4 class="card-title">List Of Pesanan</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pemilik</th>
                                                <th>No Telfon</th>
                                                <th>Alamat</th>
                                                <th>Nama Hewan</th>
                                                <th>Ciri Khusus Hewan</th>
                                                <th>Umur Kucing</th>
                                                <th>Jenis Kucing</th>
                                                <th>CheckIn</th>
                                                <th>CheckOut</th>
                                                <th>Berat</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Treatment Id</th>
                                                <th>Hotel Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dila</td>
                                                <td>08123456789</td>
                                                <td>Jl. Jalan</td>
                                                <td>Moly</td>
                                                <td>Normal</td>
                                                <td>2</td>
                                                <td>Anggora</td>
                                                <td>2022-01-01</td>
                                                <td>2022-01-02</td>
                                                <td>10</td>
                                                <td>Perempuan</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>
                                                    {{-- <a href="" data-toggle="modal"
                                                        data-target="#modal-edit" style="width: 50px"
                                                        class="btn btn-warning"><i class="bi bi-pencil"><span
                                                              class="fas fa-edit"></span></i></a> --}}
                                                    <form action="" method="post">
                                                        <button type="submit" style="width: 50px" class="btn btn-danger"><i
                                                                class="bi bi-trash3">
                                                                <span class="fas fa-trash-alt"></span></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dila</td>
                                                <td>08123456789</td>
                                                <td>Jl. Jalan</td>
                                                <td>Moly</td>
                                                <td>Normal</td>
                                                <td>2</td>
                                                <td>Anggora</td>
                                                <td>2022-01-01</td>
                                                <td>2022-01-02</td>
                                                <td>10</td>
                                                <td>Perempuan</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>
                                                    {{-- <a href="" data-toggle="modal"
                                                        data-target="#modal-edit" style="width: 50px"
                                                        class="btn btn-warning"><i class="bi bi-pencil"><span
                                                              class="fas fa-edit"></span></i></a> --}}
                                                    <form action="" method="post">
                                                        <button type="submit" style="width: 50px" class="btn btn-danger"><i
                                                                class="bi bi-trash3">
                                                                <span class="fas fa-trash-alt"></span></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Dila</td>
                                                <td>08123456789</td>
                                                <td>Jl. Jalan</td>
                                                <td>Moly</td>
                                                <td>Normal</td>
                                                <td>2</td>
                                                <td>Anggora</td>
                                                <td>2022-01-01</td>
                                                <td>2022-01-02</td>
                                                <td>10</td>
                                                <td>Perempuan</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>
                                                    {{-- <a href="" data-toggle="modal"
                                                        data-target="#modal-edit" style="width: 50px"
                                                        class="btn btn-warning"><i class="bi bi-pencil"><span
                                                              class="fas fa-edit"></span></i></a> --}}
                                                    <form action="" method="post">
                                                        <button type="submit" style="width: 50px" class="btn btn-danger"><i
                                                                class="bi bi-trash3">
                                                                <span class="fas fa-trash-alt"></span></i></button>
                                                    </form>
                                                </td>
                                            </tr>

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
