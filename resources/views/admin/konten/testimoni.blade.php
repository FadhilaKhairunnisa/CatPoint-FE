@extends('layouts.admin.app')

@section('title', __('Cat Point - Testimoni'))

@section('content')
    <div class="container">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row pb-5">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Testimoni</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/superadmin" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Testimoni
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
                                <h4 class="card-title">List Of Accounts</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
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
                            <h4 class="modal-title" id="modal-tambahLabel">Form Tambah Testimoni
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Tambahkan Testimoni</h4>
                                        <form method="POST" enctype="multipart/form-data" class="mt-4">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" class="form-control border-primary"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="location_id">Deskripsi</label>
                                                <input type="text" name="name" class="form-control border-primary"
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
                            <h4 class="modal-title" id="modal-editLabel">Form Edit Testimoni
                            </h4>
                            <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Testimoni</h4>
                                        <form method="POST" enctype="multipart/form-data" class="mt-4">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" value= "Dila"
                                                    class="form-control border-primary" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="location_id">Deskripsi</label>
                                                <input type="text" name="name" value="Perawatan Baik"
                                                    class="form-control border-primary" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submiy" class="btn btn-primary">Edit</button>
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
            // Fetch data from the testimonial API endpoint
            $.ajax({
                url: 'http://149.129.244.179/api/testimoni',
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
                                    data: 'nama'
                                },
                                {
                                    data: 'deskripsi'
                                },
                            ]
                        });
                    } else {
                        console.error('Error fetching data from the testimonial API');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
@endpush
