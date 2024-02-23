<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        table tr .text3 {
            font-size: 15px;
            border: none;
        }

        table tr .text5 {
            font-size: 15px;
            border: none;
        }

        table .test1 {
            border: 1px solid;
            text-align: left;
        }

        table,
        td,
        th {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <center>
        <table width="100%" style="border: none">
            <tr>
                <td class="text5"><img src="logo.png" alt="" width="90" height="90" /></td>
                <td class="text5">
                    <center>
                        <font size="4"><b>MAJELIS PEMBINA KESEHATAN UMUM</b></font><br />
                        <font size="4"><b>RSU MUHAMMADIYAH METRO </b></font><br />
                        <font size="1">JL Soekarno Hatta No. 42 Mulyojati 16B, Fax: (0725) 47760 Metro Barat - Kota Metro 34125</font><br />
                        <font size="1">Email : info.rsumm@gmail.com , Telp: (0721) 49490-7850378 , Website : www.rsumm.co.id</font>
                    </center>
                </td>
                <td class="text5"><img src="logo.png" alt="" width="90" height="90" /></td>
            </tr>
            <tr>
                <td colspan="3" style="border: none">
                    <hr />
                </td>
            </tr>
        </table>
        <table width="100%" style="border: none">
            <tr>
                <td class="text3"><b>LEMBAR VERIFIKASI</b></td>
            </tr>
        </table>
        <table width="100%" class="tabel">
            <tr>
                <td>1</td>
                <td>Nama RS</td>
                <td>: RSU Muhammadiyah Metro</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nomor Kode RS</td>
                <td>: 1872042</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kelas RS</td>
                <td>: C</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Nomor Rekam Medis</td>
                <td>: <?php echo $rs_pasien['NO_MR']; ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Nama Pasien</td>
                <td>: <?php echo $rs_pasien['NAMA_PASIEN']; ?></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Tanggal Lahir</td>
                <td>: <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Umur</td>
                <td>: 29 TAHUN 11 BULAN 9 HARI</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Berat Lahir</td>
                <td>:</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Jenis Kelamin</td>
                <td>: <?php echo $rs_pasien['JENIS_KELAMIN']; ?></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Jenis Perawatan</td>
                <td>: <?php if ($asal['KODE_RUANG'] == '') {
                            echo 'RAWAT JALAN';
                            echo " |  Poliklinik : " . $rs_pasien['SPESIALIS'];
                        } else {
                            echo 'RAWAT INAP';
                            echo " | Ruang :" . $asal['NAMA_RUANG'];
                        } ?></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Kelas Jaminan Perawatan</td>
                <td>:</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Tanggal Masuk</td>
                <td>: <?php echo date("d-m-Y", strtotime($asal['TANGGAL'])); ?></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Tanggal Keluar</td>
                <td>: <?php if ($asal['MEDIS'] == 'RAWAT JALAN') {
                            if ($asal['FS_CARA_PULANG'] == '3') {
                                echo '';
                            } else {
                                echo date("d-m-Y", strtotime($asal['TANGGAL']));
                            }
                        } else {
                            echo date("d-m-Y", strtotime($rs_pasien['TGL_KELUAR']));
                        } ?></td>
            </tr>
            <tr>
                <td>14</td>
                <td>Jumlah Hari Perawatan</td>
                <td>: <?php echo $inap['JUMLAH']; ?></td>
            </tr>
            <tr>
                <td>15</td>
                <td>Cara Pulang</td>
                <td>: </td>
            </tr>
        </table>
        <br />
        <table width="100%" class="tabel">
            <tr>
                <td rowspan="2" width="50" style="text-align: center">16</td>
                <td style="text-align: center">Diagnosa Utama</td>
                <td style="text-align: center">Kode ICD 10</td>
                <td style="text-align: center">Dokter</td>
                <td style="text-align: center">Tanda Tangan</td>
            </tr>
            <tr>
                <td> <?php
                        if ($asal['KODE_RUANG'] == '') {
                            echo $result['FS_DIAGNOSA'];
                        } else {
                            echo $rs_resume['FS_DIAG_UTAMA'];
                        } ?></td>
                </td>
                <td></td>
                <td><?php if ($result['FS_DIAGNOSA'] != null) {
                        echo $result['Nama_Dokter'];
                    } ?></td>
                <td><img src="barcode.png" alt="" width="40" height="40" /></td>
            </tr>
        </table>
        <br />
        <table width="100%" class="tabel">
            <tr>
                <td rowspan="2" width="50" style="text-align: center">17</td>
                <td style="text-align: center">Diagnosa Sekunder</td>
                <td style="text-align: center">Kode ICD 10</td>
                <td style="text-align: center">Dokter</td>
                <td style="text-align: center">Tanda Tangan</td>
            </tr>
            <?php

            if ($asal['KODE_RUANG'] == '') { ?>
                <tr>
                    <td><?php
                        if ($asal['KODE_RUANG'] == '') {
                            echo $result['FS_DIAGNOSA_SEKUNDER'];
                        } else {
                            echo '';
                        } ?></td>
                    <td></td>
                    <td><?php if ($result['FS_DIAGNOSA_SEKUNDER'] != null) {
                            echo $result['Nama_Dokter'];
                        } ?></td>
                    <td><img src="barcode.png" alt="" width="40" height="40" /></td>
                </tr>
                <?php } else {
                foreach ($rs_diag as $diag) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            <?php } ?>
        </table>
        <br />
        <table width="100%" class="tabel">
            <tr>
                <td rowspan="2" width="50" style="text-align: center">18</td>
                <td style="text-align: center">Tindakan</td>
                <td style="text-align: center">Kode ICD 9CM</td>
                <td colspan="2" style="text-align: center">Dokter</td>
                <td colspan="2" style="text-align: center">Pasien/Keluarga</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Nama</td>
                <td>TTD</td>
                <td>Nama</td>
                <td>TTD</td>
            </tr>
        </table>
        <br />
        <table width="100%" style="border: none">
            <tr>
                <td class="text5" width="300"></td>
                <td class="text5">Metro, .....................</td>
            </tr>
            <tr>
                <td class="text5" width="300">Dokter yang Merawat</td>
                <td class="text5" width="100">Petugas BPJS Center</td>
            </tr>
            <tr>
                <td width="300" class="text5"><img src="barcode.png" alt="" width="90" height="90" /></td>
                <td width="100" class="text5"></td>
            </tr>
            <tr>
                <td width="300" class="text5">(dr. Kumbang)</td>
                <td class="text5">(........................)</td>
            </tr>
        </table>
    </center>
</body>

</html>