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
                        No MR : <?=$biodata['NO_MR']?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead"><b><?=$biodata['NAMA_PASIEN']?></b></h2>
                                <p class="text-muted text-sm"><?php if ($biodata['JENIS_KELAMIN'] == 'P') {
                                                                    echo 'Perempuan';
                                                                } else {
                                                                    echo 'Laki-Laki';
                                                                } ?> / <?= date('d-m-Y', strtotime($biodata['TGL_LAHIR'])) ?> / NIK : <?=$biodata['HP2']?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>ALAMAT : <?=$biodata['ALAMAT']?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>NO.HP : <?=$biodata['HP1']?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-md"></i></span>DOKTER : <?=$biodata['NAMA_DOKTER']?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span>REKANAN : <?=$biodata['NAMAREKANAN']?></li>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Anamnesa (S) <code>*</code></label>
                            <textarea class="form-control" rows="3" name="FS_ANAMNESA" value="<?= set_value('FS_ANAMNESA'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Daftar Masalah</label>
                            <textarea class="form-control" rows="3" name="FS_DAFTAR_MASALAH" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemeriksaan Fisik (O)</label>
                            <textarea class="form-control" rows="3" name="FS_CATATAN_FISIK" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tindakan (P)</label>
                            <textarea class="form-control" rows="3" name="FS_TINDAKAN" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diagnosa (A)</label>
                            <textarea class="form-control" rows="3" name="FS_DIAGNOSA" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hasil USG</label>
                            <textarea class="form-control" rows="3" name="FS_USG" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diagnosa Sekunder</label>
                            <textarea class="form-control" rows="3" name="FS_DIAGNOSA_SEKUNDER" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
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
                                <input class="form-check-input" type="radio" name="FS_EKG" id="ekgradio2" value="0">
                                <label class="form-check-label" for="ekgradio2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Order Lab Untuk Kontrol Selanjutnya</label>
                            <div class="input-group mb-3">
                                <select name="tujuan[]" id="" class="form-control">
                                    <option value="">-- pilih --</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Order Rad Untuk Kontrol Selanjutnya</label>
                                <div class="input-group mb-3">
                                    <select name="tembusan[]" id="" class="form-control">
                                        <option value="">-- pilih --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>bagian</label>
                                <div class="input-group mb-3">
                                    <select name="FS_BAGIAN" id="" class="form-control">
                                        <option value="">- pilih -</option>
                                        <option value="Sinistra">Sinistra</option>
                                        <option value="Dextra">Dextra</option>
                                        <option value="Bilateral">Bilateral</option>
                                    </select>
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

                            <div class="col-md-6">
                                <label for="namaobat1">Nama Obat</label>
                                <select name="" class="namaobat1 select2 form-control" multiple id="namaobat1" style="width: 100%">
                                    <option></option>
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
                                <select name="" class="namaobatracikan select2 form-control" multiple id="namaobatracikan" style="width: 100%">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="numero">Numero</label>
                                <input type="text" class="numero form-control" name="numero" style="width: 100%" onkeypress="handleKeyPress(event)" />
                            </div>

                            <div class="col-md-2">
                                <label for="numero">m.f</label>
                                <input type="text" class="numero form-control" name="numero" style="width: 100%" onkeypress="handleKeyPress(event)" />
                            </div>

                            <div class="col-md-2">
                                <label for="dosis">Signa</label>
                                <textarea name="dosis" class="dosis form-control" style="width: 100%" onkeypress="handleKeyPress(event)" rows="1"></textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="FS_TERAPI">Resep Racikan</label>
                                <textarea rows="18" class="form-control resep_racik plainText" cols="70" name="FS_TERAPI"></textarea>
                            </div>

                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
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
                                <select name="" id="kondisi_pulang" class="form-control" onchange="click_kondisi_pulang(this)">>
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
                        <label>Rencana</label>
                        <div class="input-group mb-3">
                            <input type="text" name="" id="" class="form-control">
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
                                <select name="" id="" class="form-control">
                                    <option value="">-- pilih --</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</label>
                        <div class="input-group mb-3">
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Rencana Kontrol Berikutnya : </label>
                        <div class="input-group mb-3">
                        <select name="" id="" class="form-control">
                                    <option value="">-- pilih --</option>
                                    <option value="1 Minggu">1 Minggu</option>
                                    <option value="2 Minggu">2 Minggu</option>
                                    <option value="Sebulan Kedepan">Sebulan Kedepan</option>

                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Kontrol Berikutnya : </label>
                        <div class="input-group mb-3">
                            <input type="date" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal Expired Rujukan Faskes : </label>
                        <div class="input-group mb-3">
                            <input type="date" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Keterangan Atau Pesan : </label>
                        <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="FS_EDUKASI" value="<?= set_value('FS_EDUKASI'); ?>" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <!-- include form -->
        </div>

        <!-- form -->

        <!-- button -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-save"></i> Simpan</button>
        </div>
        <!-- button -->

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
function click_kondisi_pulang(selected){
    $("#form2").hide();
            var checkbox1 = selected.value
      
            if (checkbox1 == "2") {
            $("#form2").show();
            } else {
            $("#form2").hide();
            }
        }

function click_terapi_dr_toumi(selected){
    var resep = $(".resep").val();
            var pilihan_resep = selected.value
      
            if (pilihan_resep == "Dkd/ckd") {
                $(".resep").val(
                resep +
                "\n /R   Asam folat \n  S 1x1 mg   \n ---------------------------------------- \n \n /R   Bicnat \n  S 2x1  \n ---------------------------------------- \n \n /R   Erkade \n  S 1x1  \n ---------------------------------------- \n"
            );
            $("#namapaketdrtoumi").select2("data", null);
                
            } else {
            $("#form2").hide();
            }
        }

</script>