<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="#">Perawat/Petugas</a></li>
                    <li class="breadcrumb-item active">Tanda Tangan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
    <div class="card card-secondary" >
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
            <div class="text-left mb-2">
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-add-tranksasi">
                <i class="fas fa-plus"></i> TAMBAH TTD
            </button>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Petugas</th>
                        <th>Status</th>
                        <th>Tanda Tangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach($tanda_tangan as $ttd) {?>
                        <tr>
                        <td width="5%"><?=$no++?></td>
                        <td width="10%"><?=$ttd['NamaLengkap']?></td>
                        <td width="20%"><?=$ttd['STATUS']?> </td>
                        <td width="30%">
                      
                            <img src="<?php echo base_url($ttd['IMAGE'])?>" width="50" height="50" />

                        </td>
                 
                        <td width="45%">
                            <a href="<?php echo base_url('ttd/edit_ttd/'.$ttd['ID_TTD']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('ttd/delete_ttd/'.$ttd['ID_TTD']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- modal add ttd -->
<div class="modal fade" id="modal-add-tranksasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tanda Tangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
     
                <div class="card-body">
                    
                <div class="container">
                    <form method="POST" action="<?php echo base_url('ttd/add'); ?>">
  
                        <div class="col-md-12">
                            <label class="" for="">Tanda Tangan:</label>
                            <br/>
                                <div id="signat" ></div>
                                <br/>
                                <button id="clear">Hapus Tanda Tangan</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
  
                        <br/>
                        
                  
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
