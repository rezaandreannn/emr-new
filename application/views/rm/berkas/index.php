<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Riwayat Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Berkas</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header card-success">
                <h3 class="card-title"><i class="fas fa-search"></i> Search</h3>
            </div>

            <!-- include form -->
            <div class="card-body">
                <div class="row">
                    <label>No Rekam Medis</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grip">
                            <button type="button" class="btn btn-sm btn-success me-md-2">
                                Tampilkan
                            </button>
                            <a href="#" class="btn btn-sm btn-danger">
                                Reset
                            </a>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="text-right mb-2">
            <a href="#" class="btn btn-sm btn-info">
                <i class="fas fa-download"></i> Profil Ringkas Medis Rawat Jalan
            </a>
        </div>
        <div class="card card-primary">
            <div class="card-header card-success">
                <h3 class="card-title">Data Pasien</h3>
            </div>

            <!-- include form -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>No RM :</label>
                    </div>
                    <div class="col-md-6">
                        <label>Nama :</label>

                    </div>
                    <div class="col-md-6">
                        <label>Jenis Kelamin :</label>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Lahir :</label>
                    </div>
                    <div class="col-md-6">
                        <label>Alamat :</label>
                    </div>

                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Kode Reg</th>
                            <th>Dokter</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="5%">1</td>
                            <td width="10%">000000</td>
                            <td width="20%">Alexander</td>
                            <td width="40%">Jl. imam bonjol</td>
                            <td width="10%">Perawat</td>
                            <td><a href="http://" class="badge badge-info">Entry</a></td>
                            <td><a href="http://" class="badge badge-info">Entry</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>