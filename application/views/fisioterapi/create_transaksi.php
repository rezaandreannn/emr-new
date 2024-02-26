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
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card bg-light d-flex flex-fill">
    <div class="card-body">
    <div class="text-left mb-2">
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-add-tranksasi">
                <i class="fas fa-plus"></i> TAMBAH TRANSAKSI
            </button>
     
    </div>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>No MR</th>
                        <th>Jumlah Max Fisioterapi</th>
                        <th>Fisioterapi yang sudah dilakukan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
              
                    $no=1; 
                    foreach($transaksis as $transaksi){
                          $cek_jumlah_fisio = $this->Fisioterapi_model->count_fisio_by_kode_transaksi(array($transaksi['KODE_TRANSAKSI_FISIO']));     
                          ?>     
                        <tr>
                            <td width="5%"><?=$no++?></td>
                            <td width="10%"><?=$transaksi['CREATE_AT']?></td>
                            <td width="10%"><?=$transaksi['KODE_TRANSAKSI_FISIO']?></td>
                            <td width="10%"><?=$transaksi['NO_MR_PASIEN']?></td>
                            <td width="10%"><?=$transaksi['JUMLAH_TOTAL_FISIO']?></td>
                            <td width="25%"><?=$cek_jumlah_fisio ?></td>
                            <td width="5%"><?php if($cek_jumlah_fisio>=$transaksi['JUMLAH_TOTAL_FISIO']){?>
                                <span class="badge badge-pill badge-success">selesai</span></td>
                                <?php }  else {?>
                                    <span class="badge badge-pill badge-warning">Belum selesai</span></td>
                                
                              <?php  }?>
                            
                            <td width="30%">
                            <?php if($cek_jumlah_fisio>=$transaksi['JUMLAH_TOTAL_FISIO']){?>
                           
                                <?php }  else {?>
                                    <a href="<?php echo base_url('fisioterapi/cppt/'.$biodata['NO_MR'].'/'.$transaksi['KODE_TRANSAKSI_FISIO']); ?>" class="btn btn-xs btn-info"><i class="fa fa-plus"> Tambah Cppt</i></a>
                                
                              <?php  }?>
                              
                              <a href="<?php echo base_url('fisioterapi/delete_transaksi/'.$transaksi['ID_TRANSAKSI'].'/'.$biodata['NO_MR']); ?>" class="btn btn-xs btn-secondary" ><i class="fa fa-print"> CPPT</i></a>
                              <a href="<?php echo base_url('fisioterapi/delete_transaksi/'.$transaksi['ID_TRANSAKSI'].'/'.$biodata['NO_MR']); ?>" class="btn btn-xs btn-secondary" ><i class="fa fa-print"> Bukti Pelayanan</i></a>
                                <button class="btn btn-xs btn-warning"><i class="fa fa-edit"  data-toggle="modal" data-target="#modal-edit-tranksasi<?=$transaksi['ID_TRANSAKSI']?>"> Edit</i></button>
                        
                            <a href="<?php echo base_url('fisioterapi/delete_transaksi/'.$transaksi['ID_TRANSAKSI'].'/'.$biodata['NO_MR']); ?>" class="btn btn-xs btn-danger" onclick="click_hapus(this)"><i class="fa fa-trash"> Hapus</i></a>
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
<div class="modal fade" id="modal-add-tranksasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak CPPT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('fisioterapi/store'); ?>" method="POST">
                <div class="card-body">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>No MR Pasien </label>
                            <input type="hidden" name="NO_MR_PASIEN" class="form-control" value="<?= $biodata['NO_MR'] ?>">
                            <input type="text" name="NO_MR_PASIEN" class="form-control" value="<?= $biodata['NO_MR'] ?>" readonly>      
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jumlah Maksimal Fisio </label>
                                <input type="number" name="JUMLAH_TOTAL_FISIO" class="form-control" placeholder="Di isi dengan angka">      
                            </div>
                        </div>
                
                </div>

            </div>
            <div class="card-footer text-left">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Simpan</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- modal cppt -->
<?php foreach ($transaksis as $transaksi){?>
    <div class="modal fade" id="modal-edit-tranksasi<?=$transaksi['ID_TRANSAKSI']?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cetak CPPT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="<?php echo base_url('fisioterapi/update_transaksi'); ?>" method="POST">
                    <div class="card-body">
                        
                    <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Transaksi </label>
                                <input type="text" name="NO_MR_PASIEN" class="form-control" value="<?=$transaksi['KODE_TRANSAKSI_FISIO']?>" readonly>      
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No MR Pasien </label>
                                <input type="text" name="NO_MR_PASIEN" class="form-control" value="<?= $biodata['NO_MR'] ?>" readonly>      
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jumlah Maksimal Fisio </label>
                                    <input type="number" name="JUMLAH_TOTAL_FISIO" class="form-control" value="<?=$transaksi['JUMLAH_TOTAL_FISIO']?>">      
                                </div>
                        </div>
                    
                    </div>
    
                </div>
                <div class="card-footer text-left">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Simpan</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<?php } ?>

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


        <!-- identitas pasien -->
        <!-- button -->
      