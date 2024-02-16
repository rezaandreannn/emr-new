<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Rawat Jalan</li> -->
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form method="GET" name="myForm" id="myForm" action="<?= base_url('satu-sehat/encounter'); ?>" class="filter">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-4 col-sm-5">
                            <div class="form-group">
                                <!-- <label for="select-dokter" class="col-12 col-sm-2 col-form-label">Pilih Dokter</label> -->
                                <select name="dokter" id="dokter" class="form-control select2bs4">
                                    <option value="">-- pilih dokter --</option>
                                    <?php
                                    foreach ($dokters as $dokter) { ?>
                                        <option value="<?= $dokter['Kode_Dokter'] ?>" <?php if ($this->input->get('dokter') == $dokter['Kode_Dokter']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $dokter['Nama_Dokter'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-5">
                            <div class="form-group">
                                <!-- <label for="select-dokter" class="col-12 col-sm-2 col-form-label">Pilih Dokter</label> -->
                                <input type="date" value="<?php echo isset($_GET['tgl_kunjungan']) ? $_GET['tgl_kunjungan'] : ''; ?>" name="tgl_kunjungan" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-5">
                            <button type="submit" class="btn btn-sm btn-outline-success">Filter</button>
                        </div>
                    </div>

            </form>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No MR</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Prov</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pasiens as $pasien) { ?>
                        <tr>
                            <td width="5%"><?= $pasien['no_antrian'] ?></td>
                            <td width="10%"><?= $pasien['no_mr'] ?></td>
                            <td width="20%"><?= $pasien['nama_pasien'] ?></td>
                            <td width="30%"><?= $pasien['nik'] ?></td>
                            <td width="30%"><?= $pasien['no_hp'] ?></td>
                            <td width="30%"><?= $pasien['alamat'] ?></td>
                            <td width="30%"><?= $pasien['provinsi'] ?></td>
                            <?php if (!empty($pasien['nik'])) : ?>
                                <td width="45%"><a href="" class="btn btn-sm btn-outline-primary">sync</a></td>
                            <?php else : ?>
                                <td width="45%"><a href="" class="btn btn-sm btn-outline-primary"></a></td>
                            <?php endif; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="text/javascript">
    function getKodeDokter(selected) {
        var kodeDokter = selected.value
        document.myForm.submit();

    };
</script>