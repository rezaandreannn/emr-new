<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Bidan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button name=" dokter" id="select-dokter" class="btn btn-success btn-xs"><i class="fas fa-edit"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>No MR</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Tindakan</th>
                            <th>Dokter</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td width="5%">1</td>
                            <td width="10%">000000</td>
                            <td width="20%">Alexander</td>
                            <td width="40%">Jl. imam bonjol</td>
                            <td width="40%">Jl. imam bonjol</td>
                            <td width="40%">Jl. imam bonjol</td>
                            <td width="10%">Perawat</td>
                            <td><a href="http://" class="badge badge-info">Entry</a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>