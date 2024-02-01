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
                <h3 class="card-title">Alergi : (-)</h3>
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
            <?php $this->load->view('components/form_rajal'); ?>
            <!-- include form -->

        </div>
        <!-- form -->
    </div>
</section>

<!-- modal histori -->
<div class="modal fade" id="modal-histori">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Histori (Reza Andrean) - (214942)</h4>
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
                                <td><?= $history['TANGGAL'] ?></td>
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