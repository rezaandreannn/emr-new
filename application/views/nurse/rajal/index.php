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
            <form method="GET" name="myForm" id="myForm" action="<?= base_url('prwt/rajal'); ?>" class="filter">
                <div class="card-header">
                    <div class="form-group row">
                        <label for="select-dokter" class="col-12 col-sm-2 col-form-label">Pilih Dokter</label>
                        <div class="col-12 col-sm-10 col-md-6">
                            <select name="dokter" id="dokter" class="form-control select2bs4" onchange="getKodeDokter(this)">
                                <option value="">-- pilih dokter --</option>
                                <?php
                                foreach ($dokters as $dokter) { ?>
                                    <option value="<?= $dokter['KODE_DOKTER'] ?>" <?php if ($this->input->get('dokter') == $dokter['KODE_DOKTER']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $dokter['NAMA_DOKTER'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
            </form>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No MR</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>Periksa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pasiens as $pasien) { 
                     $cek_lab_ranap =$this->Rawat_jalan_model->get_radiologi_ranap(array($pasien['NO_REG']));
                     $cek_lab=$this->Rawat_jalan_model->get_periksa_lab_by_noreg(array($pasien['NO_REG']));
                     $cek_rad=$this->Rawat_jalan_model->get_periksa_radiologi_by_noreg(array($pasien['NO_REG']));
                     ?>
                        <tr>
                            <td width="5%"><?= $pasien['NOMOR'] ?></td>
                            <td width="5%"><?= $pasien['NO_MR'] ?></td>
                            <td width="20%"><?= $pasien['NAMA_PASIEN'] ?></td>
                            <td width="25%"><?= $pasien['ALAMAT'] ?></td>
                            <td width="10%">
                                <?php if ($pasien['FS_STATUS'] == '') { ?>
                                    <div class="badge badge-warning text-white">Perawat</div>
                                <?php } elseif ($pasien['FS_STATUS'] == '1') { ?>
                                    <div class="badge badge-danger">Dokter</div>
                                    <?php } elseif ($pasien['FS_STATUS'] == '2') {
                                    if ($pasien['FS_TERAPI'] == '' or $pasien['FS_TERAPI'] == '<p>-</p>') { ?>
                                        <div class="badge badge-success">Selesai</div>
                                    <?php } else { ?>
                                        <div class="badge badge-info">Farmasi</div>
                                <?php }
                                } ?>
                            </td>
                            <?php
                            $button_title = 'Masuk';
                            $button_url = 'prwt/rajal/create/' . $pasien['NO_REG'] . '/' . $this->input->get('dokter');
                            if ($pasien['FS_STATUS'] != '') {
                                $button_title = 'Edit';
                                $button_url = 'prwt/rajal/edit/' . $pasien['NO_REG'] . '/' . $this->input->get('dokter');
                            }
                            ?>
                            <td width="55%"><a href="<?= base_url($button_url) ?>" class="btn btn-sm btn-primary"><?= $button_title ?></a>


                            <?php if($pasien['FS_TERAPI']!=''){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_resep/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"> Resep</i></a>
                                <?php }?>

                            <!-- <?php if ($cek_lab_ranap['FS_PLANNING_LAB'] != ''){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_resep/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"> Lab Ranap</i></a>
                            <?php } ?>

                            <?php if ($cek_lab_ranap['FS_PLANNING_RAD']!= ''){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_resep/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"> Radiologi Ranap</i></a>

                            <?php } ?> -->

                            <?php if ($cek_lab != ''){?>
                                <a href="<?= base_url('cetak_rm/rajal/lab/'. $pasien['NO_REG']. '/' . $pasien['FS_KD_TRS']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-download"> Lab</i></a>
                            <?php } ?>

                            <?php if ($cek_rad!= ''){?>
                                <a href="<?= base_url('cetak_rm/rajal/rad/'. $pasien['NO_REG']. '/' . $pasien['FS_KD_TRS']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-download"> Radiologi</i></a>

                            <?php } ?>

                            <?php if ($pasien['HASIL_ECHO']!= ''){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_resep/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"> Hasil Echo</i></a>

                            <?php } ?>
                            <!-- pasien kontrol -->
                            <?php if ($pasien['FS_CARA_PULANG']=='2'){?> 
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_skdp/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-info"><i class="fa fa-download"> SKDP</i></a>
                                <a href="<?= base_url('prwt/rajal/edit_skdp/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"> Edit SKDP</i></a>

                                <!-- pasien rujuk luar rs -->
                            <?php } else if($pasien['FS_CARA_PULANG']=='4'){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_rujuk_luar_rs/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-download"> Rujukan RS</i></a>
                                <!-- pasien dengan rujuk internal -->
                            <?php } else if($pasien['FS_CARA_PULANG']=='6'){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_rujuk_internal/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-download"> Rujukan Internal</i></a>
                                <!-- pasien dikembalikan ke faskes primer -->
                            <?php } else if($pasien['FS_CARA_PULANG']=='7'){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_rujukan_faskes/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-download"> Faskes</i></a>
                            <?php } else if($pasien['FS_CARA_PULANG']=='8'){?>
                                <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_rujuk_prb/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-download"> PRB</i></a>
                                <?php } ?>
                                

                            <?php if ($pasien['FS_STATUS']=='2'){?>
                                <?php if ($pasien['KODEREKANAN']=='032'){?>
                                    <a href="<?= base_url('berkas_rm/rawat_jalan/cetak_rujuk_prb/'. $pasien['NO_REG']) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"> Lembar Verif</i></a>

                            <?php }}?>

                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div><!-- /.container-fluid -->
</section>

<script type="text/javascript">
    function getKodeDokter(selected) {
        var kodeDokter = selected.value
        document.myForm.submit();

    };
</script>