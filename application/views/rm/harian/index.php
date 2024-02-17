<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Riwayat Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Berkas Rekam Medis Harian</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="GET" name="myForm" id="myForm" action="<?= base_url('rm/berkas_harian'); ?>" class="filter">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <label for="select-dokter" class="col-form-label">Pilih Dokter</label>
                                            <select name="dokter" id="dokter" class="form-control select2bs4" onchange="getKodeDokter(this)">
                                                <option value="">-- pilih dokter --</option>
                                                <?php
                                                foreach ($dokters as $dokter) { ?>
                                                    <option value="<?= $dokter['KODE_DOKTER'] ?>" <?= $this->input->get('dokter') == $dokter['KODE_DOKTER'] ? 'selected' : '' ?>><?= $dokter['NAMA_DOKTER'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="select-dokter" class="col-form-label">Periode</label>
                                            <input type="date" class="form-control" name="tanggal">
                                        </div>
                                        <!-- <label for="select-dokter" class="col-form-label">aksi</label> -->
                                        <div class="col-md-4">
                                            <div class="card-body">

                                                <button type="submit" class="btn btn-primary mt-3"> Tampilkan</button>
                                                <a href="" class="btn btn-danger mt-3"> Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <?php
                                foreach ($pasiens as $pasien) { ?>
                                    <tr>
                                        <td width="5%"><?= $pasien['NOMOR'] ?></td>
                                        <td width="10%"><?= $pasien['NO_MR'] ?></td>
                                        <td width="20%"><?= $pasien['NAMA_PASIEN'] ?></td>
                                        <td width="30%"><?= $pasien['ALAMAT'] ?></td>
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
                                        $button_url = 'prwt/rajal/create/' . $pasien['NO_REG'] . '/' . $this->input->get('dokter');
                                        if ($pasien['FS_STATUS'] != '') {
                                            $button_title = 'Edit';
                                            $button_url = 'prwt/rajal/edit/' . $pasien['NO_REG'] . '/' . $this->input->get('dokter');
                                        }
                                        ?>
                                        <td width="45%"><a href="<?= base_url($button_url) ?>" class="btn btn-sm btn-primary"><?= $button_title ?></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>