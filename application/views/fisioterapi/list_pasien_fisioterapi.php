<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Fisioterapi</a></li>
                    <li class="breadcrumb-item active">Terapis</li>
                    <li class="breadcrumb-item active">Cppt</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
    <div class="card card-secondary" >
                <div class="card-header card-success">
                    <h3 class="card-title">CPPT Fisioterapi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('fisioterapi/cari_pasien'); ?>" class="form-horizontal" method="post">
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                    <select name="pasien" id="" class="form-control select2bs4"> 
                                        <option value="" selected    disabled>-- Pilih Pasien --</option>
                                        <?php foreach($pasiens as $pasien){?>
                                            <option value="<?=$pasien['NO_MR']?>"><?=$pasien['NAMA_PASIEN']?></option>

                                        <?php } ?>
                                    </select>
                                 </div>
                            </div>
                        </div>
                   
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cari Pasien</button>
                </div>
                </form>
            </div>
    </div>
</section>