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
                    <li class="breadcrumb-item active">Form Informed Concent</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light d-flex flex-fill">
    <div class="card-body">
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
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No MR</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                $no=1; 
                foreach ($pasiens as $pasien){ 
                $cek_informed = $this->Fisioterapi_model->get_informed_concent_by_noreg(array($pasien['NO_REG']));  
                ?>   
                    <tr>
                        <td width="5%"><?=$no++?></td>
                        <td width="10%"><?=$pasien['NO_MR']?></td>
                        <td width="15%"><?=$pasien['NAMA_PASIEN']?></td>
                        <td width="20%"><?=$pasien['ALAMAT']?></td>
                        <td width="25%">
                            <a class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-add-informed-concent<?=$pasien['NO_REG']?>"><i class="fas fa-plus"> Informed Concent</i></a>
                            <?php if ($cek_informed >='1'){?>
                            <a href="<?php echo base_url('fisioterapi/cetak_informed_concent/'.$pasien['NO_REG']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-download"> Surat Informed</i></a>
                            <?php } ?>
                        
                        </td>
                        
                    
                    </tr>
                    
               <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- modal cppt -->
<div class="modal fade" id="modal-add-informed-concent<?=$pasien['NO_REG']?>">">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Surat Informed Concent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('fisioterapi/store_informed_concent'); ?>" method="POST">
                <div class="card-body">
                    
                <div class="container">
                                <p><b>Dengan ini menyatakan sesungguhnya memberikan PERSETUJUAN, untuk dilakukan tindakan fisioterapi : </b></p>
                            </div>
                        <div class="col-md-12">
                   
                            <div class="form-group">
                                <label>Terhadap</label>
                                <input type="hidden" name="KODE_REGISTER" value="<?=$pasien['NO_REG']?>">
                                <select name="IDENTIFIKASI" class="form-control">
                                    <option value="" disabled selected>--pilih--</option>
                                    <option value="Diri sendiri">Diri sendiri</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                </select>     
                            </div>
                        </div>

                        <div class="col-md-12">
                   
                            <div class="form-group">
                                <label>Ruangan/kamar</label>
                              <input type="text" name="RUANGAN" class="form-control">    
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