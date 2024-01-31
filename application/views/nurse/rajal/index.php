<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Rawat Jalan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="form-group row" style="width: 60%;">
                    <label for="select-dokter" class="col-6 col-sm-2 col-form-label">Pilih Dokter</label>
                    <div class="col-10 col-sm-8 col-md-6">
                        <select name="dokter" id="select-dokter" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>No MR</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
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
                            <td><a href="<?= base_url('prwt/rajal/create') ?>" class="badge badge-info">Entry</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>