<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Fisioterapi</a></li>
                    <li class="breadcrumb-item active">Rawat Jalan</li>
                    <li class="breadcrumb-item active">Form CPPT</li>
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
                        <a href="<?php echo base_url('fisioterapi/cppt/'.$biodata['NO_MR'].'/'.$kode_transaksi)?>"class="btn btn-sm btn-info"><i class="fas fa-arrow-left"> Kembali</i></a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Tambah Data CPPT Fisioterapi</h3>
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
            <form action="<?php echo base_url('fisioterapi/update_cppt'); ?>" method="POST">
            <input type="hidden" name="NO_MR" class="form-control" value="<?= $biodata['NO_MR'] ?>">  
            <div class="row">
            <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Transaksi </label>
                            <input type="hidden" name="ID_CPPT_FISIO" class="form-control" value="<?= $edit_fisioterapi['ID_CPPT_FISIO']  ?>">
                            <input type="text" name="KD_TRANSAKSI_FISIO" class="form-control" value="<?=$kode_transaksi?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal dan jam Terapi </label>
                            <?php 
                            $date=date('Y-m-d');
                            $jam=date('G:i');
                  
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="TANGGAL_FISIO" class="form-control" value="<?=$date?>" readonly>
                                </div>
                                <div class="col-md-6">
                                <input type="time" name="JAM_FISIO" class="form-control" id="jam_keperawatan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Anamnesa / Allow Anamnesa <code>*</code></label>
                                <textarea class="form-control" rows="2" name="ANAMNESA"><?= $edit_fisioterapi['ANAMNESA']  ?></textarea>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tekanan Darah</label>
                            <input type="text" name="TEKANAN_DARAH" class="form-control" value="<?= $edit_fisioterapi['TEKANAN_DARAH']  ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nadi</label>
                            <input type="text" name="NADI" class="form-control" value="<?= $edit_fisioterapi['NADI']  ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Suhu</label>
                            <input type="text" name="SUHU" class="form-control" value="<?= $edit_fisioterapi['SUHU']  ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Fisio</label>
                            <select name="JENIS_TERAPI[]" multiple id="" class="form-control select2bs4">
                          
                                <option value="" disabled>--Pilih--</option>
                                
                                
                                <option value="TENS" <?php if  (in_array('TENS',$jenis_fisio)){echo 'selected';}?>>TENS</option>
                                <option value="ES" <?php if (in_array('ES',$jenis_fisio)){echo 'selected';}?>>ES</option>
                                <option value="INFRARED" <?php if (in_array('INFRARED',$jenis_fisio)){echo 'selected';}?>>INFRARED</option>
                                <option value="MWD" <?php if (in_array('MWD',$jenis_fisio)){echo 'selected';}?>>MWD</option>
                                <option value="SWD" <?php if (in_array('SWD',$jenis_fisio)){echo 'selected';}?>>SWD</option>
                                <option value="ULTRASOND" <?php if (in_array('ULTRASOND',$jenis_fisio)){echo 'selected';}?>>ULTRASOND</option>
                                <option value="ICING" <?php if (in_array('ICING',$jenis_fisio)){echo 'selected';}?>>ICING</option>
                                <option value="KINESIOTAPING" <?php if (in_array('KINESIOTAPING',$jenis_fisio)){echo 'selected';}?>>KINESIOTAPING</option>
                                <option value="EXERCISE" <?php if (in_array('EXERCISE',$jenis_fisio)){echo 'selected';}?>>EXERCISE</option>
                                <option value="FASILITASI & STIMULASI" <?php if (in_array('FASILITASI & STIMULASI',$jenis_fisio)){echo 'selected';}?>>FASILITASI & STIMULASI</option>
                                <option value="ROM EXERCISE" <?php if (in_array('ROM EXERCISE',$jenis_fisio)){echo 'selected';}?>>ROM EXERCISE</option>
                                <option value="STRENGTHNING" <?php if (in_array('STRENGTHNING',$jenis_fisio)){echo 'selected';}?>>STRENGTHNING</option>
                                <option value="CHEST THERAPY" <?php if (in_array('CHEST THERAPY',$jenis_fisio)){echo 'selected';}?>>CHEST THERAPY</option>
                            </select>
                        </div>
                    </div>
     
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cara Pulang </label>
                            <select name="CARA_PULANG" id="" class="form-control" >
                                <option value=""  selected disabled>--Pilih--</option>
                                <option value="KONSULTASI" <?=$edit_fisioterapi['CARA_PULANG']=='KONSULTASI' ? 'selected' : ''?>>KONSULTASI</option>
                                <option value="RUJUK" <?=$edit_fisioterapi['CARA_PULANG']=='RUJUK' ? 'selected' : ''?>>RUJUK</option>
                            </select>
                           
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Dokter</label>
                            <select name="KODE_DOKTER" id="" class="form-control select2bs4">
                                <option value="" disabled>--Pilih--</option>
                                <option value="151" selected>dr. Bastianus Alfian, Sp.K.F.R</option>

                            </select>
                        </div>
                    </div> -->

                    <!-- include form -->
                </div>
            </div>
            <div class="card-body">
                <label>*Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar </label>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            </form>

    </div>


</section>



<script>
         // Mendapatkan elemen input waktu
         const inputWaktu = document.getElementById('jam_keperawatan');
  
  // Mengatur waktu awal
  updateTime();

  // Fungsi untuk memperbarui waktu pada input
  function updateTime() {
    const waktuSekarang = new Date();
    const jam = waktuSekarang.getHours();
    const menit = waktuSekarang.getMinutes();
    const detik = waktuSekarang.getSeconds();
    const waktuDefault = jam.toString().padStart(2, '0') + ':' + menit.toString().padStart(2, '0');
    inputWaktu.value = waktuDefault;
  }

  // Memperbarui waktu setiap menit
  setInterval(updateTime, 1000);
</script>


        <!-- identitas pasien -->
        <!-- button -->
      