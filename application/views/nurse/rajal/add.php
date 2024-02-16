<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Assesmen Awal Rawat Inap</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!-- identitas pasien -->
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        No MR :189788
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead"><b>SITI NAFSIYAH BINTI SUNARTO</b></h2>
                                <p class="text-muted text-sm">Perempuan / 24 Juli 1969 / NIK : 12345</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>ALAMAT : Metro</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>NO.HP : 0822823813131</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-md"></i></span>DOKTER : Dr Toumi</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span>REKANAN :</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- identitas pasien -->
        <!-- button -->
        <div class="text-right mb-1">
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-histori">
                <i class="fas fa-history"></i> Histori
            </button>
            <a href="#" class="btn btn-sm btn-info">
                <i class="fas fa-download"></i> Resume Rawat Jalan
            </a>
        </div>
        <!-- button -->
        <!-- form -->
        <div class="card card-secondary">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('warning')) : ?>
                <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('warning'); ?>
                </div>
            <?php endif; ?>
            <div class="card-header card-success">
                <h3 class="card-title">Pemeriksaan Dokter</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- include form -->
            <form action="<?php echo base_url('poliklinik/store'); ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Anamnesa (S) <code>*Wajib diisi</code></label>
                                <textarea class="form-control" rows="3" name="FS_ANAMNESA" value="" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Daftar Masalah</label>
                                <textarea class="form-control" rows="3" name="FS_DAFTAR_MASALAH" value="<?= set_value('FS_DAFTAR_MASALAH'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemeriksaan Fisik (O)</label>
                                <textarea class="form-control" rows="3" name="FS_CATATAN_FISIK" value="<?= set_value('FS_CATATAN_FISIK'); ?>" placeholder="Masukan ...">Suhu : <?= $vital_sign['FS_SUHU'] ?> C, Nadi : <?= $vital_sign['FS_NADI'] ?> x/menit,  Respirasi : <?= $vital_sign['FS_R'] ?> x/menit, TD : <?= $vital_sign['FS_TD'] ?> mmHg, BB : <?= $vital_sign['FS_BB'] ?>, TB : <?= $vital_sign['FS_TB'] ?>, Alergi : <?= $alergi['FS_ALERGI'] ?>,  Skala Nyeri :<?= $nyeri['FS_NYERIS'] ?>,  Skrining Nutrisi : <?= $value_nutrisi; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diagnosa (A) <code>*Wajib diisi</code></label>
                                <textarea class="form-control" rows="3" name="FS_DIAGNOSA" value="<?= set_value('FS_DIAGNOSA'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hasil Pemeriksaan Penunjang</label>
                                <textarea class="form-control" rows="3" name="FS_USG" value="<?= set_value('FS_USG'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rencana Tindakan</label>
                                <textarea class="form-control" rows="3" name="FS_DIAGNOSA_SEKUNDER" value="<?= set_value('FS_DIAGNOSA_SEKUNDER'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rencana Pemeriksaan Penunjang Lab</label>
                                <textarea class="form-control" name="HASIL_ECHO" value="<?= set_value('HASIL_ECHO'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rencana Pemeriksaan Penunjang Radiologi</label>
                                <textarea class="form-control" name="HASIL_EKG" value="<?= set_value('HASIL_EKG'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- include form -->
        </div>
        <div class="row">
            <!-- terapi -->
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header card-success">
                        <h3 class="card-title">Resep</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- include form -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="namaobat">Nama Obat</label>
                                <select name="namaobat[]" class="namaobat1 select2bs4 form-control" multiple id="namaobat" style="width: 100%">
                                    <?php foreach ($obats as $obat) { ?>
                                        <option value="<?= $obat['Nama_Obat'] ?>"><?= $obat['Nama_Obat'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="numero">Numero</label>
                                <input type="text" class="numero form-control" name="numero" style="width: 100%" onkeypress="handleKeyPress(event)" />
                            </div>

                            <div class="col-md-3">
                                <label for="dosis">Signa</label>
                                <textarea name="dosis" class="dosis form-control" style="width: 100%" onkeypress="handleKeyPress(event)" rows="1"></textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="FS_TERAPI">Resep</label>
                                <textarea rows="18" class="form-control resep plainText" cols="70" name="FS_TERAPI"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php if ($this->session->userdata('user_name') == '138') { ?>

            <?php } else { ?>
                <!-- resep racikan -->
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header card-success">
                            <h3 class="card-title">Resep Racikan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- include form -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-5">
                                    <label for="namaobatracikan">Nama Obat</label>
                                    <select name="namaobatracikan[]" class="namaobatracikan select2bs4 form-control" multiple id="namaobatracikan" style="width: 100%">
                                        <?php foreach ($obats as $obat) { ?>
                                            <option value="<?= $obat['Nama_Obat'] ?>"><?= $obat['Nama_Obat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="numero">Numero</label>
                                    <input type="text" class="numeroracikan form-control" name="numeroracikan" style="width: 100%" onkeypress="handle2(event)" />
                                </div>

                                <div class="col-md-2">
                                    <label for="numero">m.f</label>
                                    <input type="text" class="mf1 form-control" name="mf1" style="width: 100%" onkeypress="handle2(event)" />
                                </div>

                                <div class="col-md-2">
                                    <label for="dosis">Signa</label>
                                    <textarea name="dosis1" class="dosis1 form-control" style="width: 100%" onkeypress="handle3(event)" rows="1"></textarea>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="FS_TERAPI2">Resep Racikan</label>
                                    <textarea rows="18" class="form-control resepracik plainText" cols="70" name="FS_TERAPI2"></textarea>
                                </div>

                            </div>
                        </div>
                        <!-- include form -->
                    </div>
                </div>
            <?php } ?>

        </div>
        </form>

    </div>
</section>