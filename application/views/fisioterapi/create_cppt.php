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
                        <a href="<?php echo base_url('fisioterapi/transaksi_fisio/'.$biodata['NO_MR'])?>"class="btn btn-sm btn-info"><i class="fas fa-arrow-left"> Kembali</i></a>
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
        <div class="container">
        <?php if ($this->session->flashdata('warning')) : ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('warning'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
        </div>
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
            <form action="<?php echo base_url('fisioterapi/store_cppt'); ?>" method="POST">
            <input type="hidden" name="NO_MR" class="form-control" value="<?= $biodata['NO_MR'] ?>">  
            <div class="row">
            <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Transaksi </label>
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
                                <textarea class="form-control" rows="2" name="ANAMNESA" value="<?= set_value('FS_ANAMNESA'); ?>" placeholder="Masukan ..."></textarea>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tekanan Darah</label>
                            <input type="text" name="TEKANAN_DARAH" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nadi</label>
                            <input type="text" name="NADI" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Suhu</label>
                            <input type="text" name="SUHU" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Fisio</label>
                            <select name="JENIS_TERAPI[]" multiple id="" class="form-control select2bs4">
                                <option value="" disabled>--Pilih--</option>
                                <option value="TENS">TENS</option>
                                <option value="ES">ES</option>
                                <option value="INFRARED">INFRARED</option>
                                <option value="MWD">MWD</option>
                                <option value="SWD">SWD</option>
                                <option value="ULTRASOND">ULTRASOND</option>
                                <option value="ICING">ICING</option>
                                <option value="KINESIOTAPING">KINESIOTAPING</option>
                                <option value="EXERCISE">EXERCISE</option>
                                <option value="FASILITASI & STIMULASI">FASILITASI & STIMULASI</option>
                                <option value="ROM EXERCISE">ROM EXERCISE</option>
                                <option value="STRENGTHNING">STRENGTHNING</option>
                                <option value="CHEST THERAPY">CHEST THERAPY</option>
                            </select>
                        </div>
                    </div>
     
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cara Pulang </label>
                            <select name="CARA_PULANG" id="" class="form-control" >
                                <option value=""  selected disabled>--Pilih--</option>
                                <option value="KONSULTASI">KONSULTASI</option>
                                <option value="RUJUK">RUJUK</option>
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


    
    <div class="card bg-light d-flex flex-fill">
    <div class="card-body">

        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal & jam</th>
                        <th>Anamnesa & Pemeriksaan</th>
                        <th>Diagnosa</th>
                        <th>Terapi</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $date=date('Y-m-d');
                    $no=1; 
                    foreach($fisioterapis as $fisio){?>          
                        <tr>
                            <td width="5%"><?=$no++?></td>
                            <td width="10%"><?= date('d-m-Y', strtotime($fisio['TANGGAL_FISIO'])) ?>/ <?= date('G:i', strtotime($fisio['JAM_FISIO'])) ?></td>
                            <td width="20%"><?=$fisio['ANAMNESA']?></td>
                            <td width="20%"><?=$fisio['DIAGNOSA']?></td>
                            <td width="20%"><?=$fisio['JENIS_FISIO']?></td>
                            <td width="15%">
                            <?php if ($fisio['KODE_DOKTER']!=''){
                                    echo $dokter['Nama_Dokter'];
                                    }else {
                                        echo '';
                                    } ?>
                            </td>
                            
                            <td width="30%">
                            <?php if ($date==$fisio['TANGGAL_FISIO']){?>

                                <a href="<?php echo base_url('fisioterapi/edit_cppt/'.$biodata['NO_MR'].'/'.$fisio['KD_TRANSAKSI_FISIO'].'/'.$fisio['ID_CPPT_FISIO']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"> Edit</i></a>
                            
                                <a href="<?php echo base_url('fisioterapi/delete_cppt/'.$biodata['NO_MR'].'/'.$fisio['KD_TRANSAKSI_FISIO'].'/'.$fisio['ID_CPPT_FISIO']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"> Hapus</i></a>
                            <?php } else{

                            } ?>    
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>


</section>

<!-- modal cppt -->
<div class="modal fade" id="modal-cppt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak CPPT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Awal Fisioterapi </label>
                                <input type="date" name="TANGGAL_AWAL" class="form-control">      
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Akhir Fisioterapi </label>
                                <input type="date" name="TANGGAL_AKHIR" class="form-control">      
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-left">
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal bukti-pelayanan -->
<div class="modal fade" id="modal-bukti-pelayanan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak Bukti Pelayanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Awal Fisioterapi </label>
                                <input type="date" name="TANGGAL_AWAL" class="form-control">      
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Akhir Fisioterapi </label>
                                <input type="date" name="TANGGAL_AKHIR" class="form-control">      
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-left">
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

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
      