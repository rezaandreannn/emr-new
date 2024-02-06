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
                <h3 class="card-title">Allowanamnesa dan Pemeriksaan Fisik</h3>
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
            <form action="<?php echo base_url('prwt/rajal/update');?>" method="post">
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
                            <label>Anamnesa / Allow Anamnesa <code>*</code></label>
                            <input type="hidden" name="FS_AGAMA_0" value="<?= $asesmen_perawat['FS_ANAMNESA'] ?>">
                            <textarea class="form-control" rows="3" name="FS_ANAMNESA" value="" placeholder="Masukan ..."><?= $asesmen_perawat['FS_ANAMNESA'] ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemeriksaan Fisik</label>
                            <input type="hidden" name="FS_EDUKASI_0" value="<?= $asesmen_perawat['FS_EDUKASI'] ?>">
                            <textarea class="form-control" rows="3" name="FS_EDUKASI" value="" placeholder="Masukan ..."><?= $asesmen_perawat['FS_EDUKASI'] ?></textarea>
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
                            <input type="hidden" name="FS_SUHU_0" class="form-control" value="<?= $vs['FS_SUHU'] ?>">
                            <input type="text" name="FS_SUHU" class="form-control" name="FS_SUHU" value="<?= $vs['FS_SUHU'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nadi</label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="FS_NADI_0" class="form-control" value="<?= $vs['FS_NADI'] ?>">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_NADI" value="<?= $vs['FS_NADI'] ?>">
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
                            <input type="hidden" name="FS_R_0" class="form-control" value="<?= $vs['FS_R'] ?>">
                                <input type="text" class="form-control" name="FS_R" value="<?= $vs['FS_R']; ?>">
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
                            <input type="hidden" name="FS_TD_0" class="form-control" value="<?= $vs['FS_TD'] ?>">
                                <input type="text" class="form-control" name="FS_TD" value="<?= $vs['FS_TD']; ?>">
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
                            <input type="hidden" name="FS_TB_0" class="form-control" value="<?= $vs['FS_TB'] ?>">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_TB" value="<?= $vs['FS_TB']; ?>">
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
                            <input type="hidden" name="FS_BB_0" class="form-control" value="<?= $vs['FS_BB'] ?>">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FS_BB" value="<?= $vs['FS_BB']; ?>">
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
                            <input type="hidden" name="FS_NYERI_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERI'] ?>">
                                <input class="form-check-input" type="radio" name="FS_NYERI" id="exampleRadios1" value="1" <?= $asesmen_nyeri['FS_NYERI']=='1' ? 'checked' : ''?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NYERI" id="exampleRadios2" value="0" <?= $asesmen_nyeri['FS_NYERI']=='0' ? 'checked' : ''?>>
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
                            <input type="hidden" name="FS_NYERIQ_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERIQ'] ?>">
                                <select name="FS_NYERIQ" id="" class="form-control">
                                   
                                    <option value="0" <?= $asesmen_nyeri['FS_NYERIQ']=='0' ? 'selected' : ''?>>Tidak Ada</option>
                                    <option value="1" <?= $asesmen_nyeri['FS_NYERIQ']=='1' ? 'selected' : ''?>>Seperti Di Tusuk-Tusuk</option>
                                    <option value="2" <?= $asesmen_nyeri['FS_NYERIQ']=='2' ? 'selected' : ''?>>Seperti Terbakar</option>
                                    <option value="3" <?= $asesmen_nyeri['FS_NYERIQ']=='3' ? 'selected' : ''?>>Seperti Tertimpa Beban</option>
                                    <option value="4" <?= $asesmen_nyeri['FS_NYERIQ']=='4' ? 'selected' : ''?>>Ngilu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provokatif</label>
                            <div class="input-group mb-3">
                            <input type="hidden" name="FS_NYERIP_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERIP'] ?>">
                                <select name="FS_NYERIP" id="" class="form-control">
                                   
                                    <option value="0" <?= $asesmen_nyeri['FS_NYERIQ']=='0' ? 'selected' : ''?>>Tidak Ada Nyeri</option>
                                    <option value="2" <?= $asesmen_nyeri['FS_NYERIQ']=='2' ? 'selected' : ''?>>Biologik</option>
                                    <option value="3" <?= $asesmen_nyeri['FS_NYERIQ']=='3' ? 'selected' : ''?>>Kimiawi</option>
                                    <option value="4" <?= $asesmen_nyeri['FS_NYERIQ']=='4' ? 'selected' : ''?>>Mekanik / Rudapaksa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Severity</label>
                            <div class="input-group mb-3">
                            <input type="hidden" name="FS_NYERIS_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERIS'] ?>">
                                <select name="FS_NYERIS" id="" class="form-control">
                               
                                    <option value="0" <?= $asesmen_nyeri['FS_NYERIS']=='0' ? 'selected' : ''?>>0</option>
                                    <option value="1" <?= $asesmen_nyeri['FS_NYERIS']=='1' ? 'selected' : ''?>>1</option>
                                    <option value="2" <?= $asesmen_nyeri['FS_NYERIS']=='2' ? 'selected' : ''?>>2</option>
                                    <option value="3" <?= $asesmen_nyeri['FS_NYERIS']=='3' ? 'selected' : ''?>>3</option>
                                    <option value="4" <?= $asesmen_nyeri['FS_NYERIS']=='4' ? 'selected' : ''?>>4</option>
                                    <option value="5" <?= $asesmen_nyeri['FS_NYERIS']=='5' ? 'selected' : ''?>>5</option>
                                    <option value="6" <?= $asesmen_nyeri['FS_NYERIS']=='6' ? 'selected' : ''?>>6</option>
                                    <option value="7" <?= $asesmen_nyeri['FS_NYERIS']=='7' ? 'selected' : ''?>>7</option>
                                    <option value="8" <?= $asesmen_nyeri['FS_NYERIS']=='8' ? 'selected' : ''?>>8</option>
                                    <option value="9" <?= $asesmen_nyeri['FS_NYERIS']=='9' ? 'selected' : ''?>>9</option>
                                    <option value="10" <?= $asesmen_nyeri['FS_NYERIS']=='10' ? 'selected' : ''?>>10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Regio</label>
                            <div class="input-group mb-3">
                            <input type="hidden" name="FS_NYERIR_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERIR'] ?>">
                                <input type="text" class="form-control" name="FS_NYERIR" value="<?= $asesmen_nyeri['FS_NYERIR']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="input-group mb-3">
                            <input type="hidden" name="FS_NYERIT_0" class="form-control" value="<?= $asesmen_nyeri['FS_NYERIT'] ?>">
                                <select name="FS_NYERIT" id="" class="form-control">
                    
                                    <option value="0" <?= $asesmen_nyeri['FS_NYERIT']=='0' ? 'selected' : ''?>>Tidak Ada</option>
                                    <option value="1" <?= $asesmen_nyeri['FS_NYERIT']=='1' ? 'selected' : ''?>>Kadang-Kadang</option>
                                    <option value="2" <?= $asesmen_nyeri['FS_NYERIT']=='2' ? 'selected' : ''?>>Sering</option>
                                    <option value="3" <?= $asesmen_nyeri['FS_NYERIT']=='3' ? 'selected' : ''?>>Menetap</option>
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
                        <input type="hidden" name="FS_CARA_BERJALAN1_0" class="form-control" value="<?= $asesmen_jatuh['FS_CARA_BERJALAN1'] ?>">
                            <select name="FS_CARA_BERJALAN1" class="form-control" onchange="click1(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0" <?= $asesmen_jatuh['FS_CARA_BERJALAN1']=='0' ? 'selected' : ''?>>TIDAK</option>
                                <option value="1" <?= $asesmen_jatuh['FS_CARA_BERJALAN1']=='1' ? 'selected' : ''?>>YA</option>
                            </select>
                        </div>
                        <div class="form-group clearfix">
                            <label>
                                Pasien berjalan menggunakan alat bantu
                            </label>
                            <input type="hidden" name="FS_CARA_BERJALAN2_0" class="form-control" value="<?= $asesmen_jatuh['FS_CARA_BERJALAN2'] ?>">
                            <select name="FS_CARA_BERJALAN2" class="form-control" onchange="click2(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0" <?= $asesmen_jatuh['FS_CARA_BERJALAN2']=='0' ? 'selected' : ''?>>TIDAK</option>
                                <option value="1" <?= $asesmen_jatuh['FS_CARA_BERJALAN2']=='1' ? 'selected' : ''?>>YA</option>
                            </select>
                       
                        </div>
                        <div class="form-group clearfix">
                            <label for="check3">
                                Pada saat akan duduk pasien memegang benda untuk menopang
                            </label>
                            <input type="hidden" name="FS_CARA_DUDUK_0" class="form-control" value="<?= $asesmen_jatuh['FS_CARA_DUDUK'] ?>">
                            <select name="FS_CARA_DUDUK" class="form-control" onchange="click3(this)">
                                <option value="">--Pilih Data--</option>
                                <option value="0" <?= $asesmen_jatuh['FS_CARA_DUDUK']=='0' ? 'selected' : ''?>>TIDAK</option>
                                <option value="1" <?= $asesmen_jatuh['FS_CARA_DUDUK']=='1' ? 'selected' : ''?>>YA</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="hasil_check1">
                    <input type="hidden" id="hasil_check2">
                    <input type="hidden" id="hasil_check3">

                    <div class="col-md-6 pt-4 pl-4">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary4" name="intervensi1" <?= $asesmen_jatuh['intervensi1']=='Ya' ? 'checked' : ''?> value="Ya">
                                <label for="checkboxPrimary4">
                                    Edukasi
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary5" name="intervensi2" <?= $asesmen_jatuh['intervensi2']=='Ya' ? 'checked' : ''?> value="Ya">
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
                            <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU_0" class="form-control" value="<?= $riw_kesehatan['FS_RIW_PENYAKIT_DAHULU'] ?>">
                            <input type="text" class="form-control" name="FS_RIW_PENYAKIT_DAHULU" value="<?= $riw_kesehatan['FS_RIW_PENYAKIT_DAHULU'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Penyakit keluarga</label>
                            <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU2_0" class="form-control" value="<?= $riw_kesehatan['FS_RIW_PENYAKIT_DAHULU2'] ?>">
                            <input type="text" class="form-control" name="FS_RIW_PENYAKIT_DAHULU2" value="<?= $riw_kesehatan['FS_RIW_PENYAKIT_DAHULU2']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Alergi<code>*</code></label>
                            <input type="hidden" name="FS_ALERGI_0" class="form-control" value="<?= $riw_kesehatan['FS_ALERGI'] ?>">
                            <input type="text" class="form-control" name="FS_ALERGI" value="<?= $riw_kesehatan['FS_ALERGI']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Reaksi Alergi<code>*</code></label>
                            <input type="hidden" name="FS_REAK_ALERGI_0" class="form-control" value="<?= $riw_kesehatan['FS_REAK_ALERGI'] ?>">
                            <input type="text" class="form-control" name="FS_REAK_ALERGI" value="<?= $riw_kesehatan['FS_REAK_ALERGI']; ?>">
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
                            <input type="hidden" name="FS_STATUS_PSIK_0" class="form-control" value="<?= $asesmen_perawat['FS_STATUS_PSIK'] ?>">
                            <select name="FS_STATUS_PSIK" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?= $asesmen_perawat['FS_STATUS_PSIK']=='1' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                                <option value="2" <?= $asesmen_perawat['FS_STATUS_PSIK']=='2' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                                <option value="3" <?= $asesmen_perawat['FS_STATUS_PSIK']=='3' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                                <option value="4" <?= $asesmen_perawat['FS_STATUS_PSIK']=='4' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                                <option value="5" <?= $asesmen_perawat['FS_STATUS_PSIK']=='5' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                                <option VALUE="6" <?= $asesmen_perawat['FS_STATUS_PSIK']=='6' ? 'selected' : '' ?> onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                            </select>
                            <input type="hidden" name="FS_STATUS_PSIK2" value="<?= $asesmen_perawat['FS_STATUS_PSIK2']?>" id="civstaton3" size="32">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hubungan Dengan Anggota Keluarga</label>
                            <input type="hidden" name="FS_HUB_KELUARGA_0" class="form-control" value="<?= $asesmen_perawat['FS_HUB_KELUARGA'] ?>">
                            <select name="FS_HUB_KELUARGA" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?=$asesmen_perawat['FS_HUB_KELUARGA']=='1' ? 'selected' : '' ?>>Baik</option>
                                <option value="2" <?=$asesmen_perawat['FS_HUB_KELUARGA']=='2' ? 'selected' : '' ?>>Tidak Baik</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status fungsional</label>
                            <input type="hidden" name="FS_ST_FUNGSIONAL_0" class="form-control" value="<?= $asesmen_perawat['FS_ST_FUNGSIONAL'] ?>">
                            <select name="FS_ST_FUNGSIONAL" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?=$asesmen_perawat['FS_ST_FUNGSIONAL']=='1' ? 'selected' : '' ?>>Mandiri</option>
                                <option value="2" <?=$asesmen_perawat['FS_ST_FUNGSIONAL']=='2' ? 'selected' : '' ?>>Perlu Bantuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penglihatan</label>
                            <input type="hidden" name="FS_PENGELIHATAN_0" class="form-control" value="<?= $asesmen_perawat['FS_PENGELIHATAN'] ?>">
                            <select name="FS_PENGELIHATAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?=$asesmen_perawat['FS_PENGELIHATAN']=='1' ? 'selected' : '' ?>>Normal</option>
                                <option value="2" <?=$asesmen_perawat['FS_PENGELIHATAN']=='2' ? 'selected' : '' ?>>Kabur</option>
                                <option value="3" <?=$asesmen_perawat['FS_PENGELIHATAN']=='3' ? 'selected' : '' ?>>Kaca Mata</option>
                                <option value="4" <?=$asesmen_perawat['FS_PENGELIHATAN']=='4' ? 'selected' : '' ?>>Lensa Kontak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penciuman</label>
                            <input type="hidden" name="FS_PENCIUMAN_0" class="form-control" value="<?= $asesmen_perawat['FS_PENCIUMAN'] ?>">
                            <select name="FS_PENCIUMAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?=$asesmen_perawat['FS_PENCIUMAN']=='1' ? 'selected' : '' ?>>Normal</option>
                                <option value="2" <?=$asesmen_perawat['FS_PENCIUMAN']=='2' ? 'selected' : '' ?>>Tidak Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendengaran</label>
                            <input type="hidden" name="FS_PENDENGARAN_0" class="form-control" value="<?= $asesmen_perawat['FS_PENDENGARAN'] ?>">
                            <select name="FS_PENDENGARAN" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value="1" <?=$asesmen_perawat['FS_PENDENGARAN']=='1' ? 'selected' : '' ?>>Normal</option>
                                <option value="2" <?=$asesmen_perawat['FS_PENDENGARAN']=='2' ? 'selected' : '' ?>>Tidak Normal (Kanan)</option>
                                <option value="3" <?=$asesmen_perawat['FS_PENDENGARAN']=='3' ? 'selected' : '' ?>>Tidak Normal (Kiri)</option>
                                <option value="4" <?=$asesmen_perawat['FS_PENDENGARAN']=='4' ? 'selected' : '' ?>>Tidak Normal (Kanan & Kiri)</option>
                                <option value="5" <?=$asesmen_perawat['FS_PENDENGARAN']=='5' ? 'selected' : '' ?>>Alat Bantu Dengar (Kanan)</option>
                                <option value="6" <?=$asesmen_perawat['FS_PENDENGARAN']=='6' ? 'selected' : '' ?>>Alat Bantu Dengar (Kiri)</option>
                                <option value="7" <?=$asesmen_perawat['FS_PENDENGARAN']=='7' ? 'selected' : '' ?>>Alat Bantu Dengar (Kanan & Kiri)</option>
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
                            <input type="hidden" name="FS_NUTRISI1_0" class="form-control" value="<?= $nutrisi['FS_NUTRISI1'] ?>">
                            <select name="FS_NUTRISI1" class="form-control" onchange="sn1(this)">
                                <option value="">-- pilih --</option>
                                <option value="0" <?= $nutrisi['FS_NUTRISI1']=='0' ? 'selected' : ''?>>Tidak</option>
                                <option value="1" <?= $nutrisi['FS_NUTRISI1']=='1' ? 'selected' : ''?>>Tidak Yakin</option>
                                <option value="2" <?= $nutrisi['FS_NUTRISI1']=='2' ? 'selected' : ''?>>Ya (1-5 Kg)</option>
                                <option value="3" <?= $nutrisi['FS_NUTRISI1']=='3' ? 'selected' : ''?>>Ya (6-10 Kg)</option>
                                <option value="4" <?= $nutrisi['FS_NUTRISI1']=='4' ? 'selected' : ''?>>Ya (11-15 Kg)</option>
                                <option value="5" <?= $nutrisi['FS_NUTRISI1']=='5' ? 'selected' : ''?>>Ya (>15 Kg)</option>
                            </select>
                            <input type="hidden" id="hasil_sn1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</label>
                            <input type="hidden" name="FS_NUTRISI2_0" class="form-control" value="<?= $nutrisi['FS_NUTRISI2'] ?>">
                            <select name="FS_NUTRISI2" class="form-control" onchange="sn2(this)">
                                <option value="">-- pilih --</option>
                                <option value="0" <?= $nutrisi['FS_NUTRISI2']=='0' ? 'selected' : ''?>>Tidak</option>
                                <option value="1" <?= $nutrisi['FS_NUTRISI2']=='1' ? 'selected' : ''?>>Ya</option>
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
                            <input type="hidden" name="FS_AGAMA_0" class="form-control" value="<?= $asesmen_perawat['FS_AGAMA'] ?>">
                            <select name="FS_AGAMA" id="" class="form-control">
                        
                                <option value="1" <?=$asesmen_perawat['FS_AGAMA']=='1' ? 'selected' : '' ?>>Islam</option>
                                <option value="2" <?=$asesmen_perawat['FS_AGAMA']=='2' ? 'selected' : '' ?>>Kristen</option>
                                <option value="3" <?=$asesmen_perawat['FS_AGAMA']=='3' ? 'selected' : '' ?>>Katholik</option>
                                <option value="4" <?=$asesmen_perawat['FS_AGAMA']=='4' ? 'selected' : '' ?>>Hindu</option>
                                <option value="5" <?=$asesmen_perawat['FS_AGAMA']=='5' ? 'selected' : '' ?>>Buda</option>
                                <option value="6" <?=$asesmen_perawat['FS_AGAMA']=='6' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nilai/Kepercayaan khusus</label>
                            <input type="hidden" name="FS_NILAI_KHUSUS_0" class="form-control" value="<?= $asesmen_perawat['FS_NILAI_KHUSUS'] ?>">
                            <!-- <input type="text" class="form-control" name="FS_NILAI_KHUSUS" value="<?= set_value('FS_NILAI_KHUSUS'); ?>"> -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NILAI_KHUSUS" id="exampleRadios1" <?=$asesmen_perawat['FS_NILAI_KHUSUS']=='2' ? 'checked' : '' ?> value="2"  onclick='document.getElementById("civstaton4").disabled = true'>
                                <label class="form-check-label" for="exampleRadios1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FS_NILAI_KHUSUS" id="exampleRadios2" <?=$asesmen_perawat['FS_NILAI_KHUSUS']=='1' ? 'checked' : '' ?> value="1"  onclick='document.getElementById("civstaton4").disabled = true'>
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
                <h3 class="card-title">Keperawatan </h3>
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
                            <label>Masalah Keperawatan</label>
                            <!-- <?php 
                            $selected = false;
                            foreach ($list_masalah_keperawatan as $masalah_perawat) {
                                foreach ($masalah_keperawatan as $mk) {
                                    if ($mk['FS_KD_MASALAH_KEP'] == $masalah_perawat['FS_KD_DAFTAR_DIAGNOSA']) {
                                        $selected = true;
                                    }
                                }
                              
                            }
                            ?>
                            -->
                            <select multiple=""  name="tujuan[]" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <?php foreach ($list_masalah_keperawatan as $masalah_perawat) { ?>
                                <?php foreach ($masalah_keperawatan as $mk) { ?>
                                    <option value="<?= $masalah_perawat['FS_KD_DAFTAR_DIAGNOSA'] ?>" <?= $mk['FS_KD_MASALAH_KEP'] ==  $masalah_perawat['FS_KD_DAFTAR_DIAGNOSA'] ? 'selected' : '' ?>><?= $masalah_perawat['FS_NM_DIAGNOSA'] ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rencana Keperawatan</label>
                            <select multiple name="tembusan[]" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <?php foreach ($list_rencana_keperawatan as $rencana_perawat) { ?>
                                <?php foreach ($rencana_keperawatan as $rk) { ?>
                                    <option value="<?= $rencana_perawat['FS_KD_TRS'] ?>"<?= $rk['FS_KD_REN_KEP'] ==  $rencana_perawat['FS_KD_TRS'] ? 'selected' : '' ?> ><?= $rencana_perawat['FS_NM_REN_KEP'] ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pasien terduga TB (Kode ICD 10 bila terdiagnosa TBC)</label>
                            <select name="kode_icd_x" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <?php foreach ($list_icd as $icd) { ?>
                                    <option value="<?= $icd['KODE'] ?>"><?= $icd['KET'] ?> | <?= $icd['KODE'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Expired Rujukan (jika pasien BPJS)</label>
                            <input type="date" name="FS_SKDP_FASKES" id="" class="form-control" value="<?= $asesmen_perawat['FS_SKDP_FASKES']; ?>">
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
                <table class="table table-striped" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 10px">Tgl Kunjungan</th>
                            <th style="width: 30px">Dokter</th>
                            <th style="width: 20px">Layanan</th>
                            <th style="width: 20px">Catatan</th>
                            <th style="width: 10px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($histories as $history) { ?>
                            <tr>
                                <td><?= date('d-m-Y', strtotime($history['TANGGAL'])) ?></td>
                                <td><?= $history['NAMA_DOKTER'] ?></td>
                                <td>
                                    <?= $history['SPESIALIS'] ?>
                                </td>
                                <td> -</td>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // asesmen jatuh
        function click1(selected){
            var checkbox1 = selected.value
            $("#hasil_check1").html(checkbox1);
            score_skrining_asasmen_jatuh();
        
        }
        function click2(selected){
            var checkbox2 = selected.value
            $("#hasil_check2").html(checkbox2);
            score_skrining_asasmen_jatuh();
        
        }
        function click3(selected){
            var checkbox3 = selected.value
            $("#hasil_check3").html(checkbox3);
            score_skrining_asasmen_jatuh();
        
        }
         // asesmen jatuh

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
