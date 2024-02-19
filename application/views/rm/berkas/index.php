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
                    <!-- include form -->
                    <div class="col-md-12">
                        <form method="GET" name="myForm" id="myForm" action="<?= base_url('rm/berkas'); ?>" class="filter">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="select-dokter" class="col-form-label">No Rekam Medis</label>
                                    <input type="text" class="form-control" name="No_MR">
                                </div>
                                <!-- <label for="select-dokter" class="col-form-label">aksi</label> -->
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary mt-3"> Tampilkan</button>
                                        <button type="button" class="btn btn-danger mt-3" onclick="resetForm()">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                        <label>No RM :<?= $result['NO_MR'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Nama :<?= $result['NAMA_PASIEN'] ?></label>

                    </div>
                    <div class="col-md-6">
                        <label>Jenis Kelamin :<?php if ($result['JENIS_KELAMIN'] == 'P') {
                                                    echo 'Perempuan';
                                                } else {
                                                    echo 'Laki-Laki';
                                                } ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Lahir :<?= date('d-m-Y', strtotime($result['TGL_LAHIR'])) ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Alamat : </i></span><?= $result['ALAMAT'] ?></label>
                    </div>

                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Reg</th>
                            <th>Dokter</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pasiens as $pasien) { ?>
                            <tr>
                                <td width="15%"><?= date('d-m-Y', strtotime($pasien['TANGGAL'])) ?></td>
                                <td width="20%"><?= $pasien['NO_REG'] ?></td>
                                <td width="30%"><?= $pasien['NAMA_DOKTER'] ?></td>
                                <td width="10%"><?= $pasien['NAMA_RUANG'] ?></td>
                                <td width="10%"> <?php if ($pasien['MEDIS'] == 'RAWAT JALAN') { ?>
                                        <div style="color: blue;">Rawat Jalan</div>
                                    <?php } else { ?>
                                        <div style="color: green;">Rawat Inap</div>
                                    <?php } ?>

                                </td>
                                <td width="30%"><?php if ($pasien['KODEREKANAN'] == '032') { ?>
                                        <a href="" class="btn btn-sm btn-primary"> Verif</a>
                                    <?php } ?>
                                    <?php if ($pasien['MEDIS'] == 'RAWAT JALAN') { ?>
                                        <a href="" class="btn btn-sm btn-success"> Scan</a>
                                        <a href="" onclick="" class="btn btn-sm btn-success">RM</a>
                                    <?php } else { ?>
                                        <a href="" class="btn btn-sm btn-info">Detail</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>