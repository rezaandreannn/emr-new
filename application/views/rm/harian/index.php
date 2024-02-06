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
                <div class="row">
                    <label for="select-dokter" class="col-form-label">Pilih Dokter</label>
                    <form method="GET" name="myForm" id="myForm" action="<?= base_url('prwt/rajal'); ?>" class="filter">
                        <div class="col-10 col-sm-8 col-md-8">
                            <select name="dokter" id="dokter" class="form-control select2bs4" onchange="getKodeDokter(this)">
                                <option value="">-- pilih dokter --</option>
                                <?php
                                foreach ($dokters as $dokter) { ?>
                                    <option value="<?= $dokter['KODE_DOKTER'] ?>" <?php if ($this->input->get('dokter') == $dokter['KODE_DOKTER']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $dokter['NAMA_DOKTER'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                    <label for="select-dokter" class="col-form-label">Periode</label>
                    <form method="GET" name="myForm" id="myForm" action="#" class="filter">
                        <div class="col-10 col-sm-8 col-md-12">
                            <input type="date" class="form-control" name="" id="">
                        </div>
                    </form>
                    <div class="text-right mb-1">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-histori">
                            Tampilkan
                        </button>
                        <a href="#" class="btn btn-sm btn-danger">
                            Reset
                        </a>
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
                            <td><a href="http://" class="badge badge-info">Entry</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>