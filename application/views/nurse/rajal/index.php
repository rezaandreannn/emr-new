<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Perawat</a></li>
                    <li class="breadcrumb-item active">Rawat Jalan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form method="GET" name="myForm" id="myForm" action="<?= base_url('prwt/rajal');?>" class="filter"  >
            <div class="card-header">
                <div class="form-group row" style="width: 60%;">
                    <label for="select-dokter" class="col-6 col-sm-2 col-form-label">Pilih Dokter</label>
                    <div class="col-10 col-sm-8 col-md-6">
                        <select name="dokter" id="dokter" class="form-control select2bs4" onchange="getKodeDokter(this)">
                        <option value="" >-- pilih dokter --</option>
                        <?php 
                            foreach ($dokters as $dokter) { ?>
                            <option value="<?= $dokter['KODE_DOKTER']?>" ><?= $dokter['NAMA_DOKTER']?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>No MR</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 	
                            foreach ($pasiens as $pasien) { ?>
                            
                        <tr>
<<<<<<< HEAD
                            <td width="5%">1</td>
                            <td width="10%">000000</td>
                            <td width="20%">Alexander</td>
                            <td width="40%">Jl. imam bonjol</td>
                            <td width="10%">Perawat</td>
                            <td><a href="<?= base_url('prwt/rajal/create') ?>" class="badge badge-info">Entry</a></td>
=======
                            <td width="5%"><?= $pasien['NOMOR']?></td>
                            <td width="10%"><?= $pasien['NO_MR']?></td>
                            <td width="20%"><?= $pasien['NAMA_PASIEN']?></td>
                            <td width="30%"><?= $pasien['ALAMAT']?></td>
                            <td width="10%">
                                <?php if ($pasien['FS_STATUS']==''){ ?>
                                    <a class="badge badge-warning text-white">Periksa Perawat</a>
                                    <?php } elseif($pasien['FS_STATUS']=='1') {?>
                                        <a class="badge badge-danger">Periksa Dokter</a>
                                        <?php } elseif($pasien['FS_STATUS']=='2'){
                                            if($pasien['FS_TERAPI']=='' or $pasien['FS_TERAPI']=='<p>-</p>'){?>
                                                <a class="badge badge-success">selesai</a>
                                                <?php } else{?>
                                                    <a class="badge badge-primary">farmasi</a>
                                                <?php }}?></td>
                            <td width="45%"><a href="" class="badge badge-info">Entry</a></td>
>>>>>>> dba928297553000181946228870d26a0a4757ae0
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<script type="text/javascript"> 

function getKodeDokter(selected){
    var kodeDokter = selected.value
    document.myForm.submit();

};



        
        // $("#dokter").change(function(){
        //   // alert("pilih tahun");
        
        // var dokter = $("#dokter").val();
      
        // alert(dokter);
        
        // $(".filter").submit();
        //                 });
                        
        // $("#dokter").change(function(){
        //   // alert("pilih tahun");
        
        // var dokter = $("#dokter").val();
      
       
        
        // $(".filter").submit();
        //                 });

</script>