<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Perawat/Petugas</a></li>
                    <li class="breadcrumb-item active">Tanda Tangan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
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

        

        <div class="card card-secondary">            
            <div class="card-header card-success">
                <h3 class="card-title">Edit Tanda Tangan</h3>
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
            <form action="<?php echo base_url('ttd/update_ttd'); ?>" method="post">
                <div class="card-body">
                <div class="col-md-12">
                <input type="hidden" name="ID_TTD" value="<?= $detail['ID_TTD'] ?>" />
                            <label class="" for="">Tanda Tangan:</label>
                            <br/>
                                <div id="signat" ></div>
                                <br/>
                                <button id="clear">Hapus Tanda Tangan</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                </div>
                <div class="card-footer text-left">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Simpan</button>
            
            </div>
            </form>
                <!-- include form -->
        </div>
    </div>
