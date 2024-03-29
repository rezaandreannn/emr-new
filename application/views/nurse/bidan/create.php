<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Kebidanan</li>
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
                        <?= $biodata['NO_MR'] ?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead"><b><?= $biodata['NAMA_PASIEN'] ?></b></h2>
                                <p class="text-muted text-sm"><?php if ($biodata['JENIS_KELAMIN'] == 'P') {
                                                                    echo 'Perempuan';
                                                                } else {
                                                                    echo 'Laki-Laki';
                                                                } ?> / <?= date('d-m-Y', strtotime($biodata['TGL_LAHIR'])) ?> / <?= $biodata['HP2'] ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?= $biodata['ALAMAT'] ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?= $biodata['HP1'] ?></li>
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
                <i class="fas fa-download"></i> Profil Ringkas Medis Rawat Jalan
            </a>
        </div>
        <!-- button -->
        <!-- form -->
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Identitas Suami</h3>
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
                            <label>Nama</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Anamnesa dan High Risk</h3>
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
            <form action="<?php echo base_url('prwt/rajal/store'); ?>" method="post">
                <input type="hidden" name="FS_KD_REG" value="<?= $no_reg ?>" />
                <input type="hidden" name="FS_MR" value="<?= $biodata['NO_MR'] ?>" />
                <input type="hidden" name="FS_KD_MEDIS" value="<?= $kode_dokter ?>" />
                <div class="card-body">
                    <?php if ($this->session->flashdata('warning')) : ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('warning'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Anamnesa <code>*</code></label>
                                <textarea class="form-control" rows="3" name="FS_ANAMNESA" value="<?= set_value('FS_ANAMNESA'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>High Risk</label>
                                <textarea class="form-control" rows="3" name="FS_EDUKASI" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- include form -->
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Vital Sign</h3>
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
                            <label>Suhu</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nadi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_NADI" value="<?= set_value('FS_NADI'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Respirasi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="FS_R" value="<?= set_value('FS_R'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tekanan Darah</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="FS_TD" value="<?= set_value('FS_TD'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tinggi Badan</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_TB" value="<?= set_value('FS_TB'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Berat Badan</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_BB" value="<?= set_value('FS_BB'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Riwayat Kehamilan,Persalinan dan Nifas Yang Lalu</h3>
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
                            <label>G</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>P</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>A</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>HPHT</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>HPL</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>UK</label>
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= set_value('FS_SUHU'); ?>">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Asasmen Nyeri</h3>
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
                            <label>Ada Nyeri?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NYERI" id="exampleRadios1" value="1">
                                <label class="form-check-label" for="exampleRadios1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NYERI" id="exampleRadios2" value="0" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quality</label>
                            <div class="input-group mb-3">
                                <select name="FS_NYERIQ" id="" class="form-control">

                                    <option value="0">Tidak Ada</option>
                                    <option value="1">Seperti Di Tusuk-Tusuk</option>
                                    <option value="2">Seperti Terbakar</option>
                                    <option value="3">Seperti Tertimpa Beban</option>
                                    <option value="4">Ngilu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provokatif</label>
                            <div class="input-group mb-3">
                                <select name="FS_NYERIP" id="" class="form-control">

                                    <option value="0">Tidak Ada Nyeri</option>
                                    <option value="2">Biologik</option>
                                    <option value="3">Kimiawi</option>
                                    <option value="4">Mekanik / Rudapaksa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Severity</label>
                            <div class="input-group mb-3">
                                <select name="FS_NYERIS" id="" class="form-control">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Regio</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="FS_NYERIR" value="-">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="input-group mb-3">
                                <select name="FS_NYERIT" id="" class="form-control">

                                    <option value="0">Tidak Ada</option>
                                    <option value="1">Kadang-Kadang</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Menetap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Asesmen Jatuh</h3>
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
                        <div class="form-group clearfix">
                            <label>Pasien berjalan tidak seimbang / sempoyongan</label>
                            <select name="FS_CARA_BERJALAN1" class="form-control" onchange="click1(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0">TIDAK</option>
                                <option value="1">YA</option>
                            </select>
                        </div>
                        <div class="form-group clearfix">
                            <label>
                                Pasien berjalan menggunakan alat bantu
                            </label>
                            <select name="FS_CARA_BERJALAN2" class="form-control" onchange="click2(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0">TIDAK</option>
                                <option value="1">YA</option>
                            </select>

                        </div>
                        <div class="form-group clearfix">
                            <label for="check3">
                                Pada saat akan duduk pasien memegang benda untuk menopang
                            </label>
                            <select name="FS_CARA_DUDUK" class="form-control" onchange="click3(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0">TIDAK</option>
                                <option value="1">YA</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="hasil_check1">
                    <input type="hidden" id="hasil_check2">
                    <input type="hidden" id="hasil_check3">

                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary4" name="intervensi1" value="Ya">
                                <label for="checkboxPrimary4">
                                    Edukasi
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary5" name="intervensi2" value="Ya">
                                <label for="checkboxPrimary5">
                                    Pasang Stiker Resiko Jatuh (*resiko tinggi)
                                </label>
                            </div>
                        </div>
                    </div>
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="kesimpulan_asesmen_jatuh" readonly>
                    </div>

                </div>
            </div>
            <!-- include form -->
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Riwayat Kesehatan & Alergi</h3>
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
                            <label>Riwayat Penyakit Dahulu</label>
                            <input type="text" class="form-control" name="FS_RIW_PENYAKIT_DAHULU" value="<?= set_value('FIS_RIW_PENYAKIT_DAHULU'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Penyakit keluarga</label>
                            <input type="text" class="form-control" name="FS_RIW_PENYAKIT_DAHULU2" value="<?= set_value('FS_RIW_PENYAKIT_DAHULU2'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Alergi<code>*</code></label>
                            <input type="text" class="form-control" name="FS_ALERGI" value="<?= set_value('FS_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Reaksi Alergi<code>*</code></label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Status Psikologis, Sosial dan Fungsional </h3>
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
                            <label>Status Psikologis</label>
                            <select name="FS_STATUS_PSIK" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                                <option value="2" onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                                <option value="3" onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                                <option value="4" onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                                <option value="5" onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                                <option VALUE="6" onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                            </select>
                            <input type="hidden" name="FS_STATUS_PSIK2" id="civstaton3" size="32">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hubungan Dengan Anggota Keluarga</label>
                            <select name="FS_HUB_KELUARGA" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Baik</option>
                                <option value="2">Tidak Baik</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status fungssional</label>
                            <select name="FS_ST_FUNGSIONAL" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Mandiri</option>
                                <option value="2">Perlu Bantuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penglihatan</label>
                            <select name="FS_PENGELIHATAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Normal</option>
                                <option value="2">Kabur</option>
                                <option value="3">Kaca Mata</option>
                                <option value="4">Lensa Kontak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penciuman</label>
                            <select name="FS_PENCIUMAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Normal</option>
                                <option value="2">Tidak Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendengaran</label>
                            <select name="FS_PENDENGARAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Normal</option>
                                <option value="2">Tidak Normal (Kanan)</option>
                                <option value="3">Tidak Normal (Kiri)</option>
                                <option value="4">Tidak Normal (Kanan & Kiri)</option>
                                <option value="5">Alat Bantu Dengar (Kanan)</option>
                                <option value="6">Alat Bantu Dengar (Kiri)</option>
                                <option value="7">Alat Bantu Dengar (Kanan & Kiri)</option>
                            </select>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Skrining Nutrisi </h3>
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
                            <label>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</label>
                            <select name="FS_NUTRISI1" class="form-control" onchange="sn1(this)">
                                <option value="">-- pilih --</option>
                                <option value="0">Tidak</option>
                                <option value="1">Tidak Yakin</option>
                                <option value="2">Ya (1-5 Kg)</option>
                                <option value="3">Ya (6-10 Kg)</option>
                                <option value="4">Ya (11-15 Kg)</option>
                                <option value="5">Ya (>15 Kg)</option>
                            </select>
                            <input type="hidden" id="hasil_sn1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</label>
                            <select name="FS_NUTRISI2" class="form-control" onchange="sn2(this)">
                                <option value="">-- pilih --</option>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                            <input type="hidden" id="hasil_sn2">
                        </div>
                    </div>
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="kesimpulan_skrining_nutrisi" readonly>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Spiritual dan Kultural pasien </h3>
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
                            <label>Agama</label>
                            <select name="FS_AGAMA" id="" class="form-control">

                                <option value="1">Islam</option>
                                <option value="2">Kristen</option>
                                <option value="3">Katholik</option>
                                <option value="4">Hindu</option>
                                <option value="5">Buda</option>
                                <option value="6">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nilai/Kepercayaan khusus</label>
                            <!-- <input type="text" class="form-control" name="FS_NILAI_KHUSUS" value="<?= set_value('FS_NILAI_KHUSUS'); ?>"> -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NILAI_KHUSUS" id="exampleRadios1" value="2" onclick='document.getElementById("civstaton4").disabled = true'>


                                <label class="form-check-label" for="exampleRadios1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NILAI_KHUSUS" id="exampleRadios2" value="1" onclick='document.getElementById("civstaton4").disabled = true'>
                                <label class="form-check-label" for="exampleRadios2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <!-- <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" disabled size="32"> -->
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Riwayat Gynekologi dan Riwayat Menstruasi </h3>
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
                            <label>Riwayat Gynekologi</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Tidak Ada</option>
                                <option value="2">Ada</option>
                            </select>
                            <input type="hidden" name="FS_STATUS_PSIK2" id="civstaton3" size="32">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Umur Menarche</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Pembalut</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lama Haid</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_BB" value="<?= set_value('FS_BB'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>HPM</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keluhan</label>
                            <select name="FS_PENDENGARAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Tidak Ada</option>
                                <option value="2">Disminorhe</option>
                                <option value="3">Spotting</option>
                                <option value="4">Menorrhagia</option>
                                <option value="5">Lain-lain</option>
                            </select>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Riwayat KB</h3>
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
                            <label>Metode KB yang pernah dipakai</label>
                            <div class="row">

                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Lama">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Tahun">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Komplikasi dari KB</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" selected>Tidak Ada</option>
                                <option value="2">Pendarahan</option>
                                <option value="2">PID/Radang Panggul</option>
                                <option value="2">Lain-lain</option>
                            </select>
                            <input type="hidden" name="FS_STATUS_PSIK2" id="civstaton3" size="32">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Kebidanan</h3>
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
                            <label>Masalah Kebidanan</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Komplikasi</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>K1</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status TT</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rencana Kebidanan</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>HB</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>K4</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Buku KIA</label>
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= set_value('FS_REAK_ALERGI'); ?>">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <!-- form -->
        <!-- button -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-save"></i> Simpan</button>
        </div>
        <!-- button -->
        </form>

    </div>
</section>


<script type="text/javascript">
    function click1(selected) {
        var checkbox1 = selected.value
        $("#hasil_check1").html(checkbox1);
        score_skrining_asasmen_jatuh();

    }

    function click2(selected) {
        var checkbox2 = selected.value
        $("#hasil_check2").html(checkbox2);
        score_skrining_asasmen_jatuh();

    }

    function click3(selected) {
        var checkbox3 = selected.value
        $("#hasil_check3").html(checkbox3);
        score_skrining_asasmen_jatuh();

    }

    function sn1(selected) {
        var value1 = selected.value
        $("#hasil_sn1").html(value1);
        score_skrining_nutrisi();
    };

    function sn2(selected) {
        var value2 = selected.value
        $("#hasil_sn2").html(value2);
        score_skrining_nutrisi();
    };
</script>

<script type="text/javascript">
    // score skrining nutrisi
    function score_skrining_nutrisi() {
        var sn = parseInt($("#hasil_sn1").text()) + parseInt($("#hasil_sn2").text());
        $("#totalsn").html(sn);
        if (sn >= 2) {
            $("#kesimpulan_skrining_nutrisi").val("LAPORKAN KE DOKTER");
        } else if (sn < 2) {
            $("#kesimpulan_skrining_nutrisi").val("NORMAL");
        }
    }

    // score skrining asesmen jatuh
    function score_skrining_asasmen_jatuh() {
        var score_jatuh = parseInt($("#hasil_check1").text()) + parseInt($("#hasil_check2").text()) + parseInt($("#hasil_check3").text());
        $("#totalscore_jatuh").html(score_jatuh);

        if (score_jatuh >= 3) {
            $("#kesimpulan_asesmen_jatuh").val("RISIKO TINGGI");
        } else if (score_jatuh == 2) {
            $("#kesimpulan_asesmen_jatuh").val("RISIKO SEDANG");
        } else if (score_jatuh <= 1) {
            $("#kesimpulan_asesmen_jatuh").val("RISIKO RENDAH");
        }
    }
</script>