<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lab</title>
  <style>
    table tr td {
      font-size: 13px;
    }

    table tr .text {
      text-align: center;
      font-size: 15px;
    }

    table tr .text2 {
      text-align: center;
    }

    table .ttd {
      padding-top: 100px;
    }
  </style>
</head>

<body>
  <center>
    <table width="100%">
      <tr>
      <td><img src="<?php base_url() ?>assets/images/logo.png" width="50" height="50" /></td>
        <td>
          <center>
            <font size="2"><b>MAJELIS PEMBINA KESEHATAN UMUM</b></font><br />
            <font size="2"><b>RSU MUHAMMADIYAH METRO </b></font><br />
            <font style="font-size: 8px;">JL Soekarno Hatta No. 42 Mulyojati 16B, Fax: (0725) 47760 Metro Barat - Kota Metro 34125</font><br />
            <font style="font-size: 8px;">Email : info.rsumm@gmail.com , Telp: (0721) 49490-7850378 , Website : www.rsumm.co.id</font>
          </center>
        </td>
        <td><img src="<?php base_url() ?>assets/images/larsibaru.png" width="50" height="50" /></td>
      </tr>
      <tr>
        <td colspan="3">
          <hr />
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td class="text">
          <b>PERMINTAAN PEMERIKSAAN PENUNJANGAN</b>
          <hr />
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="80" style="font-size: 11px;">Nama</td>
        <td width="300" style="font-size: 11px;">: <?= $biodata['NAMA_PASIEN'] ?></td>

      </tr>
      <tr>
        <td width="80" style="font-size: 11px;">No RM</td>
        <td width="300" style="font-size: 11px;">: <?= $biodata['NO_MR'] ?></td>
      </tr>
      <tr>
        <td width="80" style="font-size: 11px;">Tanggal Lahir</td>
        <td width="300" style="font-size: 11px;">: <?= date('d-m-Y',  strtotime($biodata['TGL_LAHIR'])); ?></td>

      </tr>
      <tr>
        <td width="80" style="font-size: 11px;">Bagian</td>
        <td width="300" style="font-size: 11px;">: <?= $biodata['SPESIALIS'] ?></td>
      </tr>
      <tr>
        <td width="80" style="font-size: 11px;">Jenis Kelamin</td>
        <td width="300" style="font-size: 11px;">: <?php if ($biodata['JENIS_KELAMIN'] == 'L') {
                                                      echo "Laki-Laki";
                                                    } else {
                                                      echo "Perempuan";
                                                    } ?></td>

      </tr>
      <tr>
        <td width="80" style="font-size: 11px;">Alamat</td>
        <td width="300" style="font-size: 11px;">: <?= $biodata['ALAMAT'] ?></td>
      </tr>

    </table>
    <table width="100%">
      <tr>
        <td colspan="3">
          <hr />
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td>
          <font size="2">Assalamu'alaikum Wr Wb</font>
        </td>
      </tr>
      <tr>
        <td>Pemeriksaan Penunjangan yang diminta</td>
        <td width="180">: <?php foreach ($pemeriksaan_radiologi as $rad) {
                            if ($rad['fs_bagian'] != '') {
                              $radiologi = " ( " . $rad['fs_bagian'] . " ) <br>";
                            } else {
                              $radiologi = "";
                            }
                            echo $rad['KET_TINDAKAN'] . $radiologi . ",";
                          } ?></td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="250"><b>KETERANGAN KLIKIK PENDERITA</b></td>
      </tr>
    </table>
    <table width="100%">

      <tr>
        <td width="165">Diagnosa</td>
        <td>: <?= $medis_by_noreg['FS_DIAGNOSA'] ?></td>
      </tr>
      <tr>
        <td width="165">Alergi</td>
        <td>: <?= $biodata['FS_ALERGI'] ?></td>
      </tr>
      <tr>
        <td width="165">High Risk</td>
        <td>: <?= $biodata['FS_HIGH_RISK'] ?></td>
      </tr>
      <tr>
        <td>
          <font size="2">Wassalamu'alaikum Wr Wb</font>
        </td>
      </tr>
    </table>
    <table width="100%" style="text-align: right;">
      <tr>
        <td width="430"></td>
        <td class="ttd"><?= $alamat['pref_value']; ?>, <?= $medis_by_noreg['mdd']; ?></td>
      </tr>
      <tr>
        <td width="430"></td>
        <td>
        
          <img src="<?php echo site_url('report_rm/rawat_jalan/berkas_rm_controller/qr_testing/' . $medis_by_noreg['NAMA_DOKTER']); ?>" alt="">
        </td>
      </tr>
      <tr>
        <td width="430"></td>
        <td><?= $medis_by_noreg['NAMA_DOKTER']; ?></td>
      </tr>
    </table>
  </center>
</body>

</html>