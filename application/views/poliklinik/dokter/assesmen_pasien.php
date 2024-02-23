<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Rawat Jalan</li>
                    <li class="breadcrumb-item active">Form Tambah</li>
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
                        No MR : <?= $biodata['NO_MR'] ?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead"><b><?= $biodata['NAMA_PASIEN'] ?></b></h2>
                                <p class="text-muted text-sm"><?php if ($biodata['JENIS_KELAMIN'] == 'P') {
                                                                    echo 'Perempuan';
                                                                } else {
                                                                    echo 'Laki-Laki';
                                                                } ?> / <?= date('d-m-Y', strtotime($biodata['TGL_LAHIR'])) ?> / NIK : <?= $biodata['HP2'] ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>ALAMAT : <?= $biodata['ALAMAT'] ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>NO.HP : <?= $biodata['HP1'] ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-md"></i></span>DOKTER : <?= $biodata['NAMA_DOKTER'] ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span>REKANAN : <?= $biodata['NAMAREKANAN'] ?></li>
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
            <button type="button" class="btn btn-sm btn-warning" onclick="click_lab(this)">
                <i class="fas fa-history"></i> Hasil Lab
            </button>
            <a href="#" class="btn btn-sm btn-info">
                <i class="fas fa-download"></i> Resume Rawat Jalan
            </a>
        </div>
        <!-- button -->
        <!-- form -->
     
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

        
        <section id="form_lab" style="display: none">
            <div class="card card-secondary" >
                <div class="card-header card-success">
                    <h3 class="card-title">Pemeriksaan Laboratorium Hari Ini</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                    <thead>


                            <tr>
                                <th>NO</th>
                                <th>Jenis Pemeriksaan</th>
                                <th>Hasil Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
                        foreach($hasil_labs as $hasil_lab){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$hasil_lab['Pemeriksaan']?></td>
                                <td><?=$hasil_lab['Hasil']?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>

        <div class="card card-secondary">            
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
                        <input type="hidden" name="FS_KD_LAYANAN" value="<?= $biodata['SPESIALIS'] ?>" />
                        <input type="hidden" name="FS_KD_REG" value="<?= $no_reg ?>" />
                        <input type="hidden" name="FS_MR" value="<?= $biodata['NO_MR'] ?>" />
                        <input type="hidden" name="FS_KD_PETUGAS_MEDIS" value="<?= $biodata['KODE_DOKTER'] ?>" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Anamnesa (S) <code>*Wajib diisi</code></label>
                                <textarea class="form-control" rows="3" name="FS_ANAMNESA" value="" placeholder="Masukan ..."><?= $asesmen_perawat['FS_ANAMNESA'] ?></textarea>
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

                                <?php if (($nutrisi['FS_NUTRISI1'] + $nutrisi['FS_NUTRISI2']) < 2) {
                                    $value_nutrisi = 'Normal';
                                } else {
                                    $value_nutrisi = 'Terjadi Penurunan Badan Tidak Diinginkan';
                                } ?>

                                <label>Pemeriksaan Fisik (O)</label>
                                <textarea class="form-control" rows="3" name="FS_CATATAN_FISIK" value="<?= set_value('FS_CATATAN_FISIK'); ?>" placeholder="Masukan ...">Suhu : <?= $vital_sign['FS_SUHU'] ?> C, Nadi : <?= $vital_sign['FS_NADI'] ?> x/menit,  Respirasi : <?= $vital_sign['FS_R'] ?> x/menit, TD : <?= $vital_sign['FS_TD'] ?> mmHg, BB : <?= $vital_sign['FS_BB'] ?>, TB : <?= $vital_sign['FS_TB'] ?>, Alergi : <?= $alergi['FS_ALERGI'] ?>,  Skala Nyeri :<?= $nyeri['FS_NYERIS'] ?>,  Skrining Nutrisi : <?= $value_nutrisi; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tindakan (P)</label>
                                <textarea class="form-control" rows="3" name="FS_TINDAKAN" value="<?= set_value('FS_TINDAKAN'); ?>" placeholder="Masukan ..."></textarea>
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
                                <label>Hasil USG</label>
                                <textarea class="form-control" rows="3" name="FS_USG" value="<?= set_value('FS_USG'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diagnosa Sekunder</label>
                                <textarea class="form-control" rows="3" name="FS_DIAGNOSA_SEKUNDER" value="<?= set_value('FS_DIAGNOSA_SEKUNDER'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>EKG</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="FS_EKG" id="ekgradio1" value="1">
                                    <label class="form-check-label" for="ekgradio1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="FS_EKG" id="ekgradio2" value="0" checked>
                                    <label class="form-check-label" for="ekgradio2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('user_name') == '158') { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hasil Echocardiografi</label>
                                    <textarea class="form-control" rows="3" name="HASIL_ECHO" value="<?= set_value('HASIL_ECHO'); ?>" placeholder="Masukan ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hasil EKG</label>
                                    <textarea class="form-control" rows="3" name="HASIL_EKG" value="<?= set_value('HASIL_EKG'); ?>" placeholder="Masukan ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hasil Treadmill</label>
                                    <textarea class="form-control" rows="3" name="HASIL_TREADMILL" value="<?= set_value('HASIL_TREADMILL'); ?>" placeholder="Masukan ..."></textarea>
                                </div>
                            </div>
                        <?php } ?>


                        <input type="hidden" name="FS_HIGH_RISK" value="<?= $biodata['FS_HIGH_RISK'] ?>" />
                        <input type="hidden" name="FS_OBAT_PROLANIS" value="1" />



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Lab Untuk Kontrol Selanjutnya</label>
                                <div class="input-group mb-3">
                                    <select name="tujuan[]" multiple id="" class="form-control select2bs4">
                                        <?php foreach ($labs as $lab) { ?>
                                            <option value="<?= $lab['No_Jenis']; ?>"><?= $lab['JENIS']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 sm-6">
                                <div class="form-group">
                                    <label>Order Rad Kontrol Selanjutnya</label>
                                    <div class="input-group mb-3">
                                        <select name="tembusan[]" id="" class="form-control select2bs4">
                                            <option value="" selected disabled>--Pilih--</option>
                                            <?php foreach ($radiologis as $radiologi) { ?>
                                                <option value="<?= $radiologi['NO_RINCI']; ?>"><?= $radiologi['KET_TINDAKAN']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 sm-6">
                                <div class="form-group">
                                    <label>bagian</label>
                                    <div class="input-group mb-3">
                                        <select name="FS_BAGIAN" id="" class="form-control">
                                            <option value="">- pilih -</option>
                                            <option value="Sinistra">Sinistra</option>
                                            <option value="Dextra">Dextra</option>
                                            <option value="Bilateral">Bilateral</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah</i></button>
                                        </div>
                                    </div>

                                </div>
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
                        <h3 class="card-title">Terapi</h3>
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

                            <?php if ($this->session->userdata('user_name') == '140') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketdrtoumi" id="namapaketdrtoumi" class="form-control" onchange="click_terapi_dr_toumi(this)">
                                                <option value="">-- pilih --</option>
                                                <option value="Dkd/ckd">Dkd/ckd</option>
                                                <option value="Neuropati">Neuropati</option>
                                                <option value="ISPA">ISPA</option>
                                                <option value="Kapsul batuk">Kapsul batuk</option>
                                                <option value="Dispepsia">Dispepsia</option>
                                                <option value="Kapsul cemas">Kapsul cemas</option>
                                                <option value="Dermatitis alergi">Dermatitis alergi</option>
                                                <option value="Tinea">Tinea</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>

                            <?php if ($this->session->userdata('user_name') == '133') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketuya" class="namapaketuya form-control" id="namapaketuya" onchange="click_terapi_dr_surya(this)">
                                                <option></option>
                                                <option value="Uya 01">Uya 01</option>
                                                <option value="Uya 02">Uya 02</option>
                                                <option value="Uya 03">Uya 03</option>
                                                <option value="Uya 04">Uya 04</option>
                                                <option value="Uya 05">Uya 05</option>
                                                <option value="Uya 06">Uya 06</option>
                                                <option value="Uya 07">Uya 07</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '141') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketazz" class="namapaketazz form-control" id="namapaketazz" onchange="click_terapi_dr_azizah(this)">
                                                <option></option>
                                                <option value="Azh resep 1">Azh resep 1</option>
                                                <option value="Azh resep 2">Azh resep 2</option>
                                                <option value="Azh resep 3">Azh resep 3</option>
                                                <option value="Azh resep 4">Azh resep 4</option>
                                                <option value="Azh resep 5">Azh resep 5</option>
                                                <option value="Azh resep 6">Azh resep 6</option>
                                                <option value="Azh resep 7">Azh resep 7</option>
                                                <option value="Azh resep 8">Azh resep 8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '121') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapakettris" class="namapakettris form-control" id="namapakettris" onchange="click_terapi_dr_tres(this)">
                                                <option></option>
                                                <option value="Tres 01">Tres 01</option>
                                                <option value="Tres 02">Tres 02</option>
                                                <option value="Tres 03">Tres 03</option>
                                                <option value="Tres 04">Tres 04</option>
                                                <option value="Tres 05">Tres 05</option>
                                                <option value="Tres 06">Tres 06</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '146') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketmul" class="namapaketmul form-control" id="namapaketmul" onchange="click_terapi_dr_mully(this)">
                                                <option></option>
                                                <option value="Mul 01">Mully 01</option>
                                                <option value="Mul 02">Mully 02</option>
                                                <option value="Mul 03">Mully 03</option>
                                                <option value="Mul 04">Mully 04</option>
                                                <option value="Mul 05">Mully 05</option>
                                                <option value="Mul 06">Mully 06</option>
                                                <option value="Mul 07">Mully 07</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '135') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketirs" class="namapaketirs form-control" id="namapaketirs" onchange="click_terapi_dr_irsan(this)">
                                                <option></option>
                                                <option value="irs 01">irs 01</option>
                                                <option value="irs 02">irs 02</option>
                                                <option value="irs 03">irs 03</option>
                                                <option value="irs 04">irs 04</option>
                                                <option value="irs 05">irs 05</option>
                                                <option value="irs 06">irs 06</option>
                                                <option value="irs 07">irs 07</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '128') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketgg" class="namapaketgg form-control" id="namapaketgg" onchange="click_terapi_dr_gigi(this)">
                                                <option></option>
                                                <option value="gg 1">gg 1</option>
                                                <option value="gg 2">gg 2</option>
                                                <option value="gg 3">gg 3</option>
                                                <option value="gg 4">gg 4</option>
                                                <option value="gg 5">gg 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '152') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapakettw" class="namapakettw form-control" id="namapakettw" onchange="click_terapi_dr_tiwi(this)">
                                                <option></option>
                                                <option value="TW1">TW1</option>
                                                <option value="TW2">TW2</option>
                                                <option value="TW3">TW3</option>
                                                <option value="TW4">TW4</option>
                                                <option value="TW5">TW5</option>
                                                <option value="TW6">TW6</option>
                                                <option value="TW7">TW7</option>
                                                <option value="TW8">TW8</option>
                                                <option value="TW9">TW9</option>
                                                <option value="TW10">TW10</option>
                                                <option value="TW11">TW11</option>
                                                <option value="TW12">TW12</option>
                                                <option value="TW13">TW13</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '137') { ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapakettht" class="namapakettht form-control" id="namapakettht" onchange="click_terapi_dr_swd(this)">
                                                <option></option>
                                                <option value="SWD 1">SWD 1</option>
                                                <option value="SWD 2">SWD 2</option>
                                                <option value="SWD 3">SWD 3</option>
                                                <option value="SWD 4">SWD 4</option>
                                                <option value="SWD 5">SWD 5</option>
                                                <option value="SWD racik 1">SWD racik 1</option>
                                                <option value="SWD racik 2">SWD racik 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->userdata('user_name') == '138') { ?>
                                <input type="hidden" name="FS_TERAPI2" value=" " />
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Pilih Paket Obat</label>
                                        <div class="input-group mb-3">
                                            <select name="namapaketorto" class="namapaketorto form-control" id="namapaketorto" onchange="click_terapi_dr_orto(this)">
                                                <option></option>
                                                <option value="Ortho A">Ortho A</option>
                                                <option value="Ortho B">Ortho B</option>
                                                <option value="Ortho C">Ortho C</option>
                                                <option value="Ortho D">Ortho D</option>
                                                <option value="Ortho E">Ortho E</option>
                                                <option value="Ortho F">Ortho F</option>
                                                <option value="Ortho G">Ortho G</option>
                                                <option value="Ortho H">Ortho H</option>
                                                <option value="Ortho I">Ortho I</option>
                                                <option value="Ortho J">Ortho J</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

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
                                <label for="FS_TERAPI">Terapi</label>
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

        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Kondisi Pasien Pulang</h3>
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
                        <div class="form-group">
                            <label>Cara Pulang</label>
                            <div class="input-group mb-3">
                                <select name="FS_CARA_PULANG" id="kondisi_pulang" class="form-control" onchange="click_kondisi_pulang(this)">
                                    <option value="">--Pilih Cara Pulang--</option>
                                    <option value="0">Tidak Kontrol</option>
                                    <option value="2">Kontrol</option>
                                    <option value="3">Rawat Inap</option>
                                    <option value="4">Rujuk Luar RS</option>
                                    <!--<option value="5">PRB / Prolanis</option>-->
                                    <option value="6">Rujuk Internal</option>
                                    <option value="7">Kembali Ke Faskes Primer</option>
                                    <option value="8">PRB</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Planning</label>
                        <div class="input-group mb-3">
                            <input type="text" name="FS_PLANNING" id="FS_PLANNING" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <!-- include form -->
        </div>

        <div class="card card-secondary" id="form2" style="display: none">
            <div class="card-header card-success">
                <h3 class="card-title">SURAT KETERANGAN DALAM PERAWATAN</h3>
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
                <!-- <div class="row"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan</label>
                        <div class="input-group mb-3">
                            <select name="FS_SKDP_1" id="FS_SKDP_1" class="form-control" onchange="click_alasan_skdp(this)">
                                <option value="">-- pilih --</option>
                                <?php foreach ($alasan_skdp as $skdp) { ?>
                                    <option value="<?= $skdp['FS_KD_TRS'] ?>"><?= $skdp['FS_NM_SKDP_ALASAN']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</label>
                    <div class="input-group mb-3">
                        <select name="FS_SKDP_2" id="rencana_skdp" class="form-control">
                            <option value="1">--Pilih Rencana Tindakan--</option>
                        </select>
                        <input type="text" name="FS_SKDP_KET" placeholder="keterangan.." />
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Rencana Kontrol Berikutnya : </label>
                    <div class="input-group mb-3">
                        <select name="FS_RENCANA_KONTROL" id="FS_RENCANA_KONTROL" class="form-control" onchange="click_rencana_kontrol(this)">
                            <option value="">-- pilih --</option>
                            <option value="1 Minggu">1 Minggu</option>
                            <option value="2 Minggu">2 Minggu</option>
                            <option value="Sebulan Kedepan">Sebulan Kedepan</option>

                        </select>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                        <label>contoh </label>
                        <div class="input-group mb-3">
                            <input type="text" name="kontrol"  class="form-control" id="kontrol_rencana">
                        </div>
                    </div> -->
                <div class="col-md-6">
                    <label>Tanggal Kontrol Berikutnya : </label>
                    <div class="input-group mb-3">
                        <input type="date" name="FS_SKDP_KONTROL" class="form-control" id="tgl_kontrol_berikutnya">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Expired Rujukan Faskes : </label>
                    <div class="input-group mb-3">
                        <input type="date" name="FS_SKDP_FASKES" id="FS_SKDP_FASKES" class="form-control" value="<?= $asesmen_perawat['FS_SKDP_FASKES'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Keterangan Atau Pesan : </label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="FS_PESAN" value="<?= set_value('FS_PESAN'); ?>" placeholder="Masukan ..."></textarea>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- include form -->
        </div>

        <div class="card card-secondary" id="form3" style="display: none">
            <div class="card-header card-success">
                <h3 class="card-title">SURAT RUJUKAN LUAR RS</h3>
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
                <!-- <div class="row"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FS_TUJUAN_RUJUKAN_LUAR_RS">Kepada : <code>* Wajib Diisi</code></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="FS_TUJUAN_RUJUKAN_LUAR_RS" id="FS_TUJUAN_RUJUKAN_LUAR_RS">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="FS_TUJUAN_RUJUKAN_LUAR_RS2">Rumah Sakit Tujuan : <code>* Wajib Diisi</code></label>
                    <div class="input-group mb-3">
                        <input type="text" name="FS_TUJUAN_RUJUKAN_LUAR_RS2" id="FS_TUJUAN_RUJUKAN_LUAR_RS2" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="FS_ALASAN_RUJUK_LUAR_RS">Alasan Dirujuk : <code>* Wajib Diisi</code></label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="FS_ALASAN_RUJUK_LUAR_RS" id="FS_ALASAN_RUJUK_LUAR_RS" value="" placeholder="Masukan ..."></textarea>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- include form -->
        </div>

        <div class="card card-secondary" id="form4" style="display: none">
            <div class="card-header card-success">
                <h3 class="card-title">SURAT RUJUKAN INTERNAL</h3>
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
                <!-- <div class="row"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FS_TUJUAN_RUJUKAN">Kepada : <code>* Wajib Diisi</code></label>
                        <div class="input-group mb-3">
                            <select name="FS_TUJUAN_RUJUKAN" id="FS_TUJUAN_RUJUKAN" class="form-control select2bs4">
                                <option value="">-- pilih dokter --</option>
                                <?php
                                foreach ($dokters as $dokter) { ?>
                                    <option value="<?= $dokter['KODE_DOKTER'] ?>"><?= $dokter['NAMA_DOKTER'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="FS_TUJUAN_RUJUKAN2" size="55" value="RSU Muhammadiyah Metro" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="FS_ALASAN_RUJUK">Alasan Dirujuk : <code>* Wajib Diisi</code></label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="FS_ALASAN_RUJUK" id="FS_ALASAN_RUJUK" value="" placeholder="Masukan ..."></textarea>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- include form -->
        </div>

        <div class="card card-secondary" id="form5" style="display: none">
            <div class="card-header card-success">
                <h3 class="card-title">SURAT DIKEMBALIKAN KE FASKER PRIMER</h3>
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
                <!-- <div class="row"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FS_TGL_PRB">Kontrol setelah dari FKTP ke RS tanggal : <code>* Wajib Diisi</code></label>
                        <div class="input-group mb-3">
                            <input type="hidden" name="FS_KD_TRS" value="<?= $biodata['FS_KD_TRS'] ?>" />
                            <input type="date" name="FS_TGL_PRB" class="form-control" id="FS_TGL_PRB">
                            <input type="hidden" name="FS_TUJUAN" value="-" />
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- include form -->
        </div>

        <!-- form -->

        <!-- button -->
        <div class="card card-secondary">
            <div class="card-body">
                <label>*Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar </label>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
        <!-- button -->
        </form>

    </div>
</section>


<!-- modal histori -->
<div class="modal fade" id="modal-histori">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Histori (<?= $biodata['NAMA_PASIEN'] ?>) - (<?= $biodata['NO_MR'] ?>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Tgl Kunjungan</th>
                                    <th style="width: 20%">Dokter</th>
                                    <th style="width: 20%">Layanan</th>
                                    <th style="width: 15%">Catatan</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($histori_pasiens as $history) {

                                $cek_lab = $this->Rawat_jalan_model->get_data_laboratorium(array($history['NO_REG']));
                                 $cek_berkas = $this->Rawat_jalan_model->get_berkas_by_noreg(array($history['NO_REG']));
                                 $cek_resep = $this->Rawat_jalan_model->get_data_resep_pasien(array($history['NO_REG']));
                                 $cek_konsulan = $this->Rawat_jalan_model->get_data_konsulan_dokter(array($history['NO_REG']));
                                 $cek_visite = $this->Rawat_jalan_model->get_data_visite_dokter(array($history['NO_REG'])); 
                                 $cek_pemeriksaan_dokter = $this->Rawat_jalan_model->get_data_pemeriksaan_dokter(array($history['NO_REG'])); 
                                 
                                 ?>

                                    <tr>
                                        <td><?= date('Y-m-d', strtotime($history['TANGGAL'])) ?></td>
                                        <td><?= $history['NAMA_DOKTER'] ?> <br> <?php

                                                                                if ($history['KODE_RUANG'] != '') {

                                                                                    foreach ($cek_visite as $visite_dokter) {
                                                                                        echo $visite_dokter['NAMA_DOKTER'];
                                                                                    }
                                                                                } ?>
                                            <br>
                                            <?php
                                            if ($cek_konsulan != '') {
                                                foreach ($cek_konsulan as $konsul) {
                                                    echo $konsul['NAMA_DOKTER'];
                                                }
                                            }

                                            ?>

                                        </td>
                                        <td>
                                            <?= $history['SPESIALIS'] ?>
                                        </td>
                                        <td>
                                            <?php if ($cek_lab>='1'){?>
                                                <a href="" >- Hasil Laboratorium</a>
                                                <?php } else {
                                                    
                                                }?>
                                                <br>
                                                <?php if($cek_resep>='1'){ ?>
                                                    <a href="" >- Resep</a>
                                                    <?php } else {
                                                        
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if ($history['KODE_RUANG'] == '') { ?>
                                                        <div class="badge badge-primary">
                                                            Rawat Jalan
                                                        </div>
                                                        <?php } elseif ($history['KODE_RUANG'] !== '') { ?>
                                                            <div class="badge badge-success">
                                                                Rawat Inap
                                                            </div>
                                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($history['KODE_RUANG']==''){?>
                                                <a href="" class="btn btn-warning btn-xs"><i class="fa fa-download"> RM</i></a>
                                                <?php if ($cek_pemeriksaan_dokter>='1'){?>
                                                    <a href="<?php echo base_url('poliklinik/copy_pemeriksaan/'.$no_reg.'/'.$history['NO_REG'].'/'.$biodata['KODE_DOKTER']);?>" class="btn btn-info btn-xs">Copy Pemeriksaan</a>

                                                <?php }?>
                                                <?php } else {?>
                                                <a href="" class="btn btn-info btn-xs">Detail</a>
                                                <a href="" class="btn btn-secondary btn-xs"><i class="fa fa-edit"> Cppt</i></a>
                                                <a href="" class="btn btn-secondary btn-xs"><i class="fa fa-download"> Resume Pasien Pulang</i></a>
                                                
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function click_kondisi_pulang(selected) {
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        var checkbox1 = selected.value

        if (checkbox1 == "2") {
            $("#form2").show();
        } else if (checkbox1 == "4") {
            $("#form3").show();
        } else if (checkbox1 == "6") {
            $("#form4").show();
        } else if (checkbox1 == "7") {
            $("#form5").show();

        } else {
            $("#form2").hide();
            $("#form3").hide();
            $("#form4").hide();
            $("#form5").hide();
        }
    }

    
    $("#form_lab").hide();
    function click_lab(){
        var x = document.getElementById("form_lab");

            if (x.style.display === "none") {
            x.style.display = "block";
            } else {
            x.style.display = "none";
            }
    }

    //paket obat dr toumi
    function click_terapi_dr_toumi(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

 
        if (pilihan_resep == "Dkd/ckd") {
      $(".resep").val(
        resep +
          "\n /R   Asam folat 1 mg No XXX \n  S 1dd1   \n ---------------------------------------- \n \n /R   Bicnat No LX \n  S 2dd1  \n ---------------------------------------- \n \n /R   Erkade XXX \n  S 1dd1  \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Neuropati") {
      $(".resep").val(
        resep +
          "\n /R   Gabapentin 300mg X \n  S 0-0-1 (K/P Kesemutan)  \n ---------------------------------------- \n \n /R   Mecobalamin XXX \n  S 1-0-0   \n ---------------------------------------- \n \n /R   Eperison XXX \n   S 0-0-1    \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "ISPA") {
      $(".resep").val(
        resep +
          "\n /R   Azitromicin 500mg V \n  S 1dd1  \n ---------------------------------------- \n \n /R   Acetylsistein 200mg XV  \n  S 3dd1  \n ---------------------------------------- \n \n /R   Ceterizin 10mg V \n  S 0-0-1  \n ---------------------------------------- \n \n /R   Boost D 1000 V \n  S 1dd1  \n ---------------------------------------- \n \n /R   Erlamol XV \n  S 3dd1  \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Kapsul batuk") {
      $(".resep").val(
        resep +
          "\n /R   Salbutamol 1 mg \n  S   \n ---------------------------------------- \n \n /R   Ceterizin 5 mg \n  S   \n ---------------------------------------- \n \n /R   Ambroxol 15mg \n  S   \n ---------------------------------------- \n \n /R   Mfla da in cap No XXX \n S 3dd1  \n---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Dispepsia") {
      $(".resep").val(
        resep +
          "\n /R   Lansoprazol 30mg XXX \n  S 1-0-0  \n ---------------------------------------- \n \n /R   Sucralfat syrup No III \n S 3ddC1 ac  \n ---------------------------------------- \n \n /R   Antasid syrup No I \n S 4ddCII kp mual kembung perih \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Kapsul cemas") {
      $(".resep").val(
        resep +
          "\n /R   Alprazolam 0,5mg 1/2tab \n  S  \n ---------------------------------------- \n \n /R   Ranitidin 150g 1/2 tab \n S  \n ---------------------------------------- \n \n /R   Domperidon 1/2 tab \n S  \n ---------------------------------------- \n \n R   Mfla da in cap No X \n S 0-0-1 Kp Cemas \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Dermatitis alergi") {
      $(".resep").val(
        resep +
          "\n /R   Clobetazol zalf No I \n S 22ddue  \n ---------------------------------------- \n \n /R   Ceterizin 10mg X \n S 0-0-1 \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    } else if (pilihan_resep == "Tinea") {
      $(".resep").val(
        resep +
          "\n /R   Ketokenazol zalf No I \n S 2ddue  \n ---------------------------------------- \n \n /R   Ceterizin 10 mg X \n S 0-0-1  \n ---------------------------------------- \n"
      );
      $("#namapaketdrtoumi").select2("data", null);
    }
    }


    //paket obat dr kumbang
    function click_terapi_dr_orto(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "Ortho A") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XXX \n  S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Eperison 50mg no XX \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Mecobalamin no XXX \n S 1 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho B") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XXX \n S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XXX \n S 1 dd 1 tab \n ---------------------------------------- \n \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho C") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XV \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no X \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XV \n S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV  \n S 2 dd 1 cap  \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho D") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XXX \n  S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX  \n S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no XXX  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap  \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho E") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XV  \n S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no X  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n  S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 dd 1 cap  \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho F") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho G") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho H") {
            $(".resep").val(
                resep +
                "\n /R meloxicam 15mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho I") {
            $(".resep").val(
                resep +
                "\n /R Calcium no X \n  S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho J") {
            $(".resep").val(
                resep +
                "\n /R Calcium no XXX  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV  \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XXX \n  S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        } else if (pilihan_resep == "Ortho L") {
            $(".resep").val(
                resep +
                "\n /R Cefadroxil sirup no I \n  S 2 dd 1 cth \n ---------------------------------------- \n \n /R Ibuprofen sirup no I  \n S 2 dd 1 cth \n ---------------------------------------- \n"
            );
            $("#namapaket").select2("data", null);
        }
    }

    //paket obat dr suwardi
    function click_terapi_dr_swd(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "SWD 1") {
            $(".resep").val(
                resep +
                "\n /R   levofloksasin 500mg no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   tremenza no VII \n  S 1 x 1tab  \n ---------------------------------------- \n \n /R   parasetamol 500mg no XXI \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R akilen no 1 \n  S 2 x 4 tetes \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD 2") {
            $(".resep").val(
                resep +
                "\n /R   Ciprofloksasin 500mg no XV \n  S 2 x 1tab  \n ---------------------------------------- \n \n /R   tremenza no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   parasetamol 500mg no XXI \n   S 3 x 1 tab    \n ---------------------------------------- \n \n /R   akilen no I S 2 x 4 tetes \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD 3") {
            $(".resep").val(
                resep +
                "\n /R   tremenza no XV \n  S 2 x 1tab  \n ---------------------------------------- \n \n /R   metilprednisolon 4mg no XV \n  S 2 x 1 tab  \n ---------------------------------------- \n \n /R   cefadroksil 500mg no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R   neurodek no VII \n  S 1 x 1tab  \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD 4") {
            $(".resep").val(
                resep +
                "\n /R   tremenza no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   citikolin 500mg no VII \n  S 1 x 1 tab  \n ---------------------------------------- \n \n /R   neurodek no XV \n  S 2 x 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD 5") {
            $(".resep").val(
                resep +
                "\n /R   Lansoprazol 30mg no VII \n  S 1 x 1 cap  \n ---------------------------------------- \n \n /R   sucralfat syp no 1 \n S 3 x 1 C  \n ---------------------------------------- \n \n /R   n asetil sistein no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R cetirizin tab 10mg no XV \n  S 2 x 1tab   \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD racik 1") {
            $(".resep").val(
                resep +
                " \n /R   parasetamol 650mg \n       diazepam 2mg \n        Mf caps no XV \n  S    2 kali 1 cap  \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        } else if (pilihan_resep == "SWD racik 2") {
            $(".resep").val(
                resep +
                " \n /R  metilprednisolon 2 mg  \n      cetirizin 2 mg \n      parasetamol 75 mg \n       mf pulv dtd no XV \n  S  2 dd 1 pulv  \n ---------------------------------------- \n"
            );
            $("#namapakettht").select2("data", null);
        }
    }

    //paket obat dr irsan
    function click_terapi_dr_irsan(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "irs 01") {
            $(".resep").val(
                resep +
                "\n /R Cefadroxyl 500mg no VI \n S 2 dd 1 cap \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg ni VI \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 02") {
            $(".resep").val(
                resep +
                "\n /R Eperisone 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n\n /R Natrium diklofenak 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 03") {
            $(".resep").val(
                resep +
                "\n /R Clindamycin 300mg no X \n S 3 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no III \n S 1 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 04") {
            $(".resep").val(
                resep +
                "\n /R Eperisone 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 05") {
            $(".resep").val(
                resep +
                "\n /R Mecobalamin 500mcg no X \n S 3 dd 1 cap \n ---------------------------------------- \n\n /R Vit B comp tab no III \n S 1 dd 1tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Omeprazole 20mg no III \n S 1 dd 1 cap \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 06") {
            $(".resep").val(
                resep +
                "\n /R Cefixime 200mg no VI \n S 2 dd 1 cap \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        } else if (pilihan_resep == "irs 07") {
            $(".resep").val(
                resep +
                "\n /R Amoxicillin clavulanat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mgno VI \n S 2 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketirs").select2("data", null);
        }
    }

    //paket obat dr surya
    function click_terapi_dr_surya(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "Uya 04") {
            $(".resep").val(
                resep +
                "\n /R   Anbacim no I \n  S 1 dd 1 gr  \n ---------------------------------------- \n \n /R   Metronidazole inf no III \n  S 3 dd 1 flas  \n ---------------------------------------- \n \n /R   Ketorolak inj no III \n  S 3 dd 1 amp  \n ---------------------------------------- \n \n /R   Asam tranexamat inj no III \n  S 3 dd 1 amp  \n ---------------------------------------- \n \n /R   Asam mefenamat tab no III \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Pronalges supp no III \n  S 3 dd 1 supp  \n ---------------------------------------- \n \n /R   Parasetamol inf no I \n  S 1 dd 1 fls   \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 05") {
            $(".resep").val(
                resep +
                "\n /R   Nifedipin tab no IV \n  S 4 dd 1 tab  \n ---------------------------------------- \n  \n /R   Hystolan no 1 \n  S 2 dd ½ tab  \n ---------------------------------------- \n \n /R   Dexametason inj no IV \n  S 2 dd 2 amp  \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 06") {
            $(".resep").val(
                resep +
                "\n /R   Infus RL kolf no II \n  S 2 dd 1 kolf  \n ---------------------------------------- \n \n /R   Infuse D5% kolf no II \n  S 2 dd 1 kolf  \n ---------------------------------------- \n \n /R   Valamin kolf no I \n  S 1 dd 1 kolf  \n ---------------------------------------- \n \n /R   Folamil cap no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 01") {
            $(".resep").val(
                resep +
                "\n /R Cefadroxil 500mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Pronalges suppo \n S 3 dd 1 suppo \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vibumin no V \n S 1 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 02") {
            $(".resep").val(
                resep +
                "\n /R Amoxicilin 500mg no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 03") {
            $(".resep").val(
                resep +
                "\n /R Ciproflosasin 500mg no XX \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        } else if (pilihan_resep == "Uya 07") {
            $(".resep").val(
                resep +
                "\n /R Calfemil No X \n S 1 dd 1  Cap \n ---------------------------------------- \n \n /R Vitamin D No X \n S 1 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketuya").select2("data", null);
        }
    }

    //paket obat dr azizah
    function click_terapi_dr_azizah(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "Azh resep 1") {
            $(".resep").val(
                resep +
                "\n /R  ceterizin syr fl\n  S no.I \n  S 1dd 1 cth \n ---------------------------------------- \n \n /R  prednison 5mg \n Mf pulv dtd no. VII \n  S 1dd 1 pulv \n ---------------------------------------- \n "
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 2") {
            $(".resep").val(
                resep +
                "\n /R  clobetasol 10gr no. 2 \n Cr. Afucid 5gr no.2 \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n \n /R  desolex sol 30l no.1 \n Calamin 70ml \n Mf da in pot \n S 2 dd ue \n ---------------------------------------- \n "
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 3") {
            $(".resep").val(
                resep +
                "\n /R  cefixime 200mg no.III \n  S 1dd 2 tab malam \n ---------------------------------------- \n  \n /R azitromycin 500mg no.III \n  S 1dd 2 tab pagi \n ---------------------------------------- \n "
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 4") {
            $(".resep").val(
                resep +
                "\n /R  clobetasol 10gr no. I \n Cr afucid 5gr no. II  \n  S 2 dd ue \n ---------------------------------------- \n \n /R  medscab 30gr no.½ \n Cr. Clobetasok 10gr no. I \n As. Salisilat 2% \n Mf da in pot \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  loratadine 10mg no. XIV \n  S 1 dd 1tab \n ---------------------------------------- \n "
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 5") {
            $(".resep").val(
                resep +
                "\n /R  medscab 30gr no.1 \n Sue (malam, leher-kaki, 8-10 jam tdk kena air) \n ---------------------------------------- \n  \n /R  medscab 15gr no. I \n Cr. Afucid 5gr no. III \n As. Salisilat 2%  \n  S 2 dd ue \n ---------------------------------------- \n \n /R  loratadin 10mg tab no. XIV \n  S 1 dd 1 tab \n ---------------------------------------- \n  \n /R  co. Amoxiclav no. XXI \n  S 3 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 6") {
            $(".resep").val(
                resep +
                "\n /R  clobetasol 10gr. No.V \n Vaselin 20gr \n Lanolin 10% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  carmed 10% 40gr no. ½ \n Clobetasol 10gr no. I \n As. Salisilat 2%  \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  metilprednisolon 8mg no. X \n  S 1 dd 1 tab \n ---------------------------------------- \n  \n /R  loratadin 10mg no. X \n  S 1 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 7") {
            $(".resep").val(
                resep +
                "\n /R  ketoconazol 10gr no. IV \n Momrtason 10gr no. I \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  afucid cr 5gr no.II \n As. Salisilat 30% \n  S 2 dd ue \n ---------------------------------------- \n \n /R  loratadin 10mg no. XIV \n  S 1 dd 1 tab \n ---------------------------------------- \n "
            );
            $("#namapaketazz").select2("data", null);
        } else if (pilihan_resep == "Azh resep 8") {
            $(".resep").val(
                resep +
                "\n /R  desoximethasone 10gr no. II \n Carmed 10% 40gr no. ½ \n Lcd 2% \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  ketoconazole 10gr no. II \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  albendazole 1000mg \n As. Fucidat 5gr no. 2 \n Mf da in pot \n  S 2 dd ue \n ---------------------------------------- \n"
            );
            $("#namapaketazz").select2("data", null);
        }
    }

    //paket obat dr gigi
    function click_terapi_dr_gigi(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "gg 1") {
            $(".resep").val(
                resep +
                "\n /R   Amoxilin 250mg no X  \n  S 3 dd 1 tab \n ---------------------------------------- \n \n /R   Paracetamol 250mg no X \n  S 3 dd 1 tab \n ---------------------------------------- \n"
            );
            $("#namapaketgg").select2("data", null);
        } else if (pilihan_resep == "gg 2") {
            $(".resep").val(
                resep +
                "\n /R   Amoxilin 500mg no X   \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Paracetamol 500mg no X   \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketgg").select2("data", null);
        } else if (pilihan_resep == "gg 3") {
            $(".resep").val(
                resep +
                "\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketgg").select2("data", null);
        } else if (pilihan_resep == "gg 4") {
            $(".resep").val(
                resep +
                "\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Methylprednisolon 4 mg no X \n  S 2 dd 1 tab  \n ---------------------------------------- \n"
            );
            $("#namapaketgg").select2("data", null);
        } else if (pilihan_resep == "gg 5") {
            $(".resep").val(
                resep +
                "\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n  \n /R   Betadyne kumur fe 1 \n  S Kumur-kumur 2 dd 1  \n ---------------------------------------- \n"
            );
            $("#namapaketgg").select2("data", null);
        }
    }

    //paket obat dr tres
    function click_terapi_dr_tres(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "Tres 01") {
            $(".resep").val(
                resep +
                "\n /R   Anbacim 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n  \n /R   Asam tranexamat inj no III \n  S 3 dd 1 Ampl  \n ---------------------------------------- \n  \n /R   Parasetmalo inf no II \n  S 2 dd 1 inf  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 dd 1 suppo  \n ---------------------------------------- \n \n /R   Ondancentron tab no III \n S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Na diklofenak 25mg no II \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Metromidazole inf no III \n  S 1 flas per 8 jam   \n ---------------------------------------- \n "
            );
            $("#namapakettris").select2("data", null);
        } else if (pilihan_resep == "Tres 02") {
            $(".resep").val(
                resep +
                "\n /R   cefotaxime 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n \n /R   Dexametason inj no II \n  S 2 dd 1 Ampl  \n ---------------------------------------- \n  \n /R   Nifedipin 10mg no IV \n  S 4 dd 1 tab  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 dd 1 suppo  \n ---------------------------------------- \n"
            );
            $("#namapakettris").select2("data", null);
        } else if (pilihan_resep == "Tres 03") {
            $(".resep").val(
                resep +
                "\n /R   cefotaxime 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n \n /R   Neurosanbe amp no I \n  S 1 dd 1 Ampl drip  \n ---------------------------------------- \n  \n /R   Omeprazole vial no I \n  S 1 dd 1 vial  \n ---------------------------------------- \n \n /R   Ondancetron amp no III \n  S 3 dd 1 Amp  \n ---------------------------------------- \n"
            );
            $("#namapakettris").select2("data", null);
        } else if (pilihan_resep == "Tres 04") {
            $(".resep").val(
                resep +
                "\n /R   Cefixime 200mg tab No XV \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Na diklofenak 25mg No X  \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Antasida tab No XX \n  S 3 dd 1 tab AC \n ---------------------------------------- \n"
            );
            $("#namapakettris").select2("data", null);
        } else if (pilihan_resep == "Tres 05") {
            $(".resep").val(
                resep +
                "\n /R   Cefixime 200mg tab no XV \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 dd 1 tab \n ---------------------------------------- \n \n /R   Antasida tab no XX \n  S 3 dd 1 tab AC \n ---------------------------------------- \n"
            );
            $("#namapakettris").select2("data", null);
        } else if (pilihan_resep == "Tres 06") {
            $(".resep").val(
                resep +
                "\n /R   Cefixime 200mg cap no X \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 dd 1 tab \n ---------------------------------------- \n "
            );
            $("#namapakettris").select2("data", null);
        }
    }

    //paket obat dr mully
    function click_terapi_dr_mully(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "Mul 01") {
            $(".resep").val(
                resep +
                "\n /R   Amoxicilin 500mg no.X  \n  S 3 dd 1 Cap \n /R   Pct 500mg no.X  \n  S  3 dd 1 Tab  \n ---------------------------------------- \n "
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 02") {
            $(".resep").val(
                resep +
                "\n /R   Amoxicilin 500mg no.X   \n  S  3 dd 1 Cap \n /R   Asmef 500mg no.X   \n  S  3 dd 1 Tab  \n ---------------------------------------- \n"
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 03") {
            $(".resep").val(
                resep +
                "\n /R   Clindamycin 150mg no.X   \n  S  2 dd 1 Cap \n /R   Pct 500mg no.X   \n  S  3 dd 1 Tab  \n ---------------------------------------- \n"
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 04") {
            $(".resep").val(
                resep +
                "\n /R   Clindamycin 150mg no.X   \n  S   2 dd 1 Cap \n /R   Pct 500mg no.X   \n  S  3 dd 1 Tab \n /R   Lansoprazole 30mg no.X   \n  S  2 dd 1 Cap   \n ---------------------------------------- \n"
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 05") {
            $(".resep").val(
                resep +
                "\n /R   Clindamycin 150mg no.X   \n  S   2 dd 1 Cap \n /R   Asmef 500mg no.X   \n  S  3 dd 1 Tab \n /R   Lansoprazole 30mg no.X   \n  S  2 dd 1 Cap  \n ---------------------------------------- \n"
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 06") {
            $(".resep").val(
                resep +
                "\n /R Cefadroxil 500mg no VI \n S   2 dd 1 \n /R  Ibuprofen 400mg no X \n S 3 dd 1 \n ----------------------------------------- \n"
            );
            $("#namapaketmul").select2("data", null);
        } else if (pilihan_resep == "Mul 07") {
            $(".resep").val(
                resep +
                "\n /R Cefadroxil 500mg no VI \n S   2 dd 1 \n /R  Asam Mefenamat 500mg no X \n     S 3 dd 1 \n ------------------------------------------ \n"
            );
            $("#namapaketmul").select2("data", null);
        }
    }

    //paket obat dr tiwi
    function click_terapi_dr_tiwi(selected) {
        var resep = $(".resep").val();
        var pilihan_resep = selected.value

        if (pilihan_resep == "TW1") {
            $(".resep").val(
                resep +
                "\n /R  aspilet 80 mg \n S 1 dd 1 pc pagi  \n ---------------------------------------- \n \n /R  citicoline tab 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 1 dd 1 pc sore  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n "
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW2") {
            $(".resep").val(
                resep +
                "\n /R  citicoline tab 500 mg \n S 2 dd 1 pc \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Mecobalamin 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 2 dd 1 pc sore  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW3") {
            $(".resep").val(
                resep +
                "\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ergotamine caffein 1 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  depakote 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW4") {
            $(".resep").val(
                resep +
                "\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  analsik \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg, 2 dd 1 ac  \n ---------------------------------------- \n "
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW5") {
            $(".resep").val(
                resep +
                "\n /R  meloxicam 15 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  dexamethasone 0,5 mg \n S 3 dd 1 pc \n ---------------------------------------- \n \n /R  diazepam 2 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Glucosamine 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  neurodex \n S 2 dd 1 pc \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW6") {
            $(".resep").val(
                resep +
                "\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amitriptilin 12,5 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  Gabapentine 100 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  Neurodex \n S 2 dd 1 pc  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW7") {
            $(".resep").val(
                resep +
                "\n /R  clobazam 5 mg \n S 1 dd 1 malam  \n ---------------------------------------- \n \n /R  haloperidol 0,5 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW8") {
            $(".resep").val(
                resep +
                "\n /R  MP 4 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Meloxicam 15 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  gabapentine 100 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  vit B Komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW9") {
            $(".resep").val(
                resep +
                "\n /R  Maprotline HCL / Sandepril 50 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  clobazam 10 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  Eperison HCL 50 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 dd 1 pc \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW10") {
            $(".resep").val(
                resep +
                "\n /R  Levodopa 100 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Arkin 2 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 3 dd 1 pc  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW11") {
            $(".resep").val(
                resep +
                "\n /R  donepezil 10 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  tebokan 40 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  sukralfat syrup \n S 3 dd 1 CTH ac  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 dd 1 pc"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW12") {
            $(".resep").val(
                resep +
                "\n /R  mestinon 60 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  MP 16 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  Vitamin B komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        } else if (pilihan_resep == "TW13") {
            $(".resep").val(
                resep +
                "\n /R  betahistine 6 mg \n S 3 dd 2 tab pc  \n ---------------------------------------- \n \n /R  flunarizine 10 mg, 1 dd 1 pc malam \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  vit B komplek \n S 2 dd 2 pc \n ---------------------------------------- \n"
            );
            $("#namapakettw").select2("data", null);
        }
    }
</script>


<!-- terapi -->
<script>
    function handleKeyPress(e) {
        var yhr = new XMLHttpRequest();
        var key = e.keyCode || e.which;
        if (key == 13) {
            var namaobat = $("#namaobat").val();
            var numero = $(".numero").val();
            var dosis = $(".dosis").val();
            var kolomresep = document.getElementById("kolomresep");
            var resep = $(".resep").val();

            $(".resep").val(
                resep +
                "\n /R   " +
                namaobat +
                "   no. " +
                numero +
                "\n S    " +
                dosis +
                "\n ----------------------------------------------- \n "
            );
            //    alert(namaobat+numero+dosis);
            $("#namaobat").select2("data", null);
            $(".numero").val(null);
            $(".dosis").val(null);

            //    $("#namaobat").select2({}).focus();
            $("#namaobat").select2("open");
        }
    }
</script>


<!-- terapi racikan -->
<script>
    function handle2(e) {
        var key = e.keyCode || e.which;
        if (key == 13) {
            var namaobat1 = $("#namaobatracikan").val();
            var numero1 = $(".numeroracikan").val();
            //    var dosis1 = $(".dosis1").val();
            var resepracik = $(".resepracik").val();

            $(".resepracik").val(
                resepracik + "    " + namaobat1 + "   no. " + numero1 + "\n     "
            );
            //    alert(namaobat+numero+dosis);
            $("#namaobatracikan").select2("data", null);
            $(".numeroracikan").val(null);
            $(".dosis1").val(null);

            //    $("#namaobat").select2({}).focus();
            $("#namaobatracikan").select2("open");
        }
    }

    function handle3(e) {
        var key = e.keyCode || e.which;
        if (key == 13) {
            var namaobat1 = $("#namaobatracikan").val();
            var numero1 = $(".numeroracikan").val();
            var dosis1 = $(".dosis1").val();
            var mf1 = $(".mf1").val();
            var resepracik = $(".resepracik").val();
            if (namaobat1 == null) {
                $(".resepracik").val(
                    resepracik +
                    "          " +
                    mf1 +
                    "\n   S  " +
                    dosis1 +
                    "\n ------------------------------------------------- \n \n   /R"
                );
            } else {
                $(".resepracik").val(
                    resepracik +
                    "    " +
                    namaobat1 +
                    "   no. " +
                    numero1 +
                    "\n" +
                    "           " +
                    mf1 +
                    "\n    S      " +
                    dosis1 +
                    "\n ------------------------------------------ \n \n  /R"
                );
            } //    alert(namaobat+numero+dosis);
            $("#namaobatracikan").select2("data", null);
            $(".numeroracikan").val(null);
            $(".dosis1").val(null);
            $(".mf1").val(null);

            //    $("#namaobat").select2({}).focus();
            $("#namaobatracikan").select2("open");
        }
    }
</script>

<script type="text/javascript">
    function click_rencana_kontrol(selected) {

        var date = new Date();
        var current_date = (date.getDate() + 7) + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
        var rencana_kontrol = selected.value


        if (rencana_kontrol == "1 Minggu") {

            // document.getElementById("#tgl_kontrol_berikutnya").value = current_date;
            // $("#tgl_kontrol_berikutnya").value(current_date);
            // $("#FS_RENCANA_KONTROL").select2("data", null);
        } else if (rencana_kontrol == "4") {
            // $("#form3").show();
        }
    }
</script>

<script type="text/javascript">
    function click_alasan_skdp(selected) {

        var skdp_alasan = $("#FS_SKDP_1").val();
        // alert(skdp_alasan);
        // die;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Poliklinik/Dokter/Assesmen_controller/skdp_rencana_kontrol'); ?>",
            data: "FS_SKDP_1=" + skdp_alasan,
            cache: false,

            success: function(msg) {
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota
                $("#rencana_skdp").html(msg);
            }
        });
    }
</script>