@extends('admin.layout')
@section('content')
<div class="container">
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row pb-5">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Paket Treatment</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/superadmin" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Paket Treatment
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-5 align-self-center">
                    <div class="customize-input float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-tambah">Tambah Data Paket Treatment</button>
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
                            <h4 class="card-title">List Of Paket Treatment</h4>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Paket</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Paket 1</td>
                                                <td>Rp.20000</td>
                                                <td>perawatan sehari-hari</td>
                                                <td><img src="asset/img/undraw_profile_1.svg" alt=""></td>
                                                <td>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal-edit" style="width: 50px" 
                                                        class="btn btn-warning"><i class="bi bi-pencil"><span
                                                              class="fas fa-edit"></span></i></a>
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
                        <h4 class="modal-title" id="modal-tambahLabel">Form Tambah Paket 
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
    
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambahkan Paket</h4>
                                    <form method="POST"
                                        enctype="multipart/form-data" class="mt-4">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Paket</label>
                                            <input type="text" name="name" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Harga</label>
                                            <input type="text" name="name" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Deskripsi</label>
                                            <input type="text" name="name" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Gambar</label>
                                            <input type="file" name="name" class="form-control border-primary"
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
    
        <div id="modal-edit" class="modal fade" tabindex="-1"
            role="dialog" aria-labelledby="modal-editLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="modal-editLabel">Form Edit Jenis Paket
                        </h4>
                        <button type="reset" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
    
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Jenis Paket</h4>
                                    <form method="POST"
                                        enctype="multipart/form-data" class="mt-4">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Paket</label>
                                            <input type="text" name="name" value= "Paket 1" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Harga</label>
                                            <input type="text" name="name" value= "Rp. 20.000" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Deskripsi</label>
                                            <input type="text" name="name" value= "Perawatan Sehari hari" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_id">Gambar</label>
                                            <input type="file" name="name" class="form-control border-primary"
                                                required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submiy"
                                                class="btn btn-primary">Tambahkan</button>
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
