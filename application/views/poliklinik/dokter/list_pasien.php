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

        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No MR</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>Periksa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($pasiens as $pasien) { ?>
                    <tr>
                        <td width="5%"><?= $pasien['NOMOR'] ?></td>
                        <td width="10%"><?= $pasien['NO_MR'] ?></td>
                        <td width="20%"><?= $pasien['NAMA_PASIEN'] ?></td>
                        <td width="30%"><?= $pasien['NAMA_PASIEN'] ?></td>
                        <td width="10%">
                        <?php if ($pasien['FS_STATUS'] == '') { ?>
                                    <div class="badge badge-warning text-white">Perawat</div>
                                <?php } elseif ($pasien['FS_STATUS'] == '1') { ?>
                                    <div class="badge badge-danger">Dokter</div>
                                    <?php } elseif ($pasien['FS_STATUS'] == '2') {
                                    if ($pasien['FS_TERAPI'] == '' or $pasien['FS_TERAPI'] == '<p>-</p>') { ?>
                                        <div class="badge badge-success">Selesai</div>
                                    <?php } else { ?>
                                        <div class="badge badge-info">Farmasi</div>
                                <?php }
                                } ?>
                        </td>
                        <?php
                            $button_title = 'Masuk';
                            $button_url = 'poliklinik/periksa/' . $pasien['NO_REG'] . '/' . $pasien['KODE_DOKTER'];
                            if ($pasien['FS_STATUS'] == '2') {
                                $button_title = 'Edit';
                                $button_url = 'prwt/rajal/edit/' . $pasien['NO_REG']. '/' . $pasien['KODE_DOKTER'];
                            }
                            ?>
                            <td width="45%"><a href="<?= base_url($button_url) ?>" class="btn btn-sm btn-primary"><?= $button_title ?></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div><!-- /.container-fluid -->
</section>