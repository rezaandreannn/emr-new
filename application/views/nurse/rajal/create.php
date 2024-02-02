<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
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
                <h3 class="card-title">Allowanamnesa dan Pemeriksaan Fisik</h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Anamnesa / Allow Anamnesa <code>*</code></label>
                            <textarea class="form-control" rows="3" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemeriksaan Fisik</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- include form -->
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Vital Sign</h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Suhu</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Respirasi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tekanan Darah</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nadi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Berat Badan</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tinggi Badan</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Assesmen Jatuh</h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Pasien berjalan tidak seimbang / sempoyongan
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Pasien berjalan menggunakan alat bantu
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Pada saat akan duduk pasien memegang benda untuk menopang
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Edukasi
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Pasang Stiker Resiko Jatuh (*resiko tinggi)
                                </label>
                            </div>
                        </div>
                    </div>
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="kesimpulan" readonly>
                    </div>

                </div>
            </div>
            <!-- include form -->
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Riwayat Kesehatan & Alergi</h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Penyakit Alergi</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Alergi</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Reaksi Alergi</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Riwayat Penyakit Alergi</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Status Psikologis, Sosial dan Fungsional </h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Psikologis</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hubungan Dengan Anggota Keluarga</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status fungssional</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penglihatan</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penciuman</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendengaran</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Skrining Nutrisi </h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="kesimpulan" readonly>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Spiritual dan Kultural pasien </h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="" id="" class="form-control">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nilai/Kepercayaan khusus</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header card-success">
                <h3 class="card-title">Keperawatan </h3>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Masalah Keperawatan</label>
                            <select name="" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rencana Keperawatan</label>
                            <select name="" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pasien terduga TB (Kode ICD 10 bila terdiagnosa TBC)</label>
                            <select name="" id="" class="form-control select2bs4">
                                <option value="">-- pilih --</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Expired Rujukan (jika pasien BPJS)</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                    </div>
                    <!-- include form -->
                </div>
            </div>
        </div>
        <!-- form -->
        <!-- button -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </div>
        <!-- button -->

    </div>
</section>

<!-- modal histori -->
<div class="modal fade" id="modal-histori">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Histori (<?= $biodata['NAMA_PASIEN'] ?>) - (<?= $biodata['NO_MR'] ?>)</h4>
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
                                <td><?= date('d-m-Y', strtotime($history['TANGGAL'])) ?></td>
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