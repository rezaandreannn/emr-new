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
      table tr .text {
        text-align: right;
        font-size: 15px;
      }
      table tr .text5 {
        text-align: center;
        font-size: 15px;
      }
      table tr .text2 {
        text-align: center;
      }
      table tr .text10 {
        text-align: right;
      }
      table tr .img {
        padding-bottom: 100px;
      }

   
   .page {
  width: 100mm;
  min-height: 210mm;

}
    </style>
  </head>
  
  <body>
    <div class="page">
    <center>
      <table width="100%">
        <tr>
        <td class="text">
            Rekanan : <?= $rekanan['NAMAREKANAN']; ?>
         
          </td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="text">
            <b>No Antrian Obat : <?= $antrian['FS_KD_ANTRIAN']; ?></b>
         
          </td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="text5"><?= $medis_by_noreg['NAMA_DOKTER']; ?></td>
        </tr>
        <tr>
          <td class="text5">SIP : </td>
        </tr>
        <tr>
          <td colspan="4"><hr /></td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="text">
            <b><?= date('d-m-Y', strtotime($medis_by_noreg['mdd'])); ?></b>
          </td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td><?php echo str_replace("\n", "<br>", $medis_by_noreg['FS_TERAPI']); ?></td>
        </tr>
        

      </table>
      <table width="100%">
        <tr>
          <td colspan="4"><hr /></td>
        </tr>
        <tr>
          <td>No RM</td>
          <td>: <?= $biodata['NO_MR']; ?></td>
          <td>Tgl Lahir</td>
          <td>: <?= date('d-m-Y', strtotime($biodata['TGL_LAHIR'])); ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>: <?= $biodata['NAMA_PASIEN']; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: <?= $biodata['ALAMAT']; ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>: <?php if($biodata['JENIS_KELAMIN']=='P'){echo "Perempuan";}elseif($biodata['JENIS_KELAMIN']=='L'){echo "Laki-Laki";} ?></td>
        </tr>

        <tr>
          <td>Diagnosa</td>
          <td><?= strip_tags($medis_by_noreg['FS_DIAGNOSA']); ?></td>
          <td>Alergi</td>
          <td>: </td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          barcode</td>
        </tr>
      </table>
    </center>
    </div>

  </body>
</html>
