<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Jakarta');
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
?>
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
        text-align: center;
        font-size: 15px;
        text-decoration: underline;
      }
      table tr .text2 {
        text-align: center;
      }
      table tr .text3 {
        font-size: 15px;
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
              <font size="2"><b>MAJELIS PEMBINA KESEHATAN UMUM</b></font
              ><br />
              <font size="2"><b>RSU MUHAMMADIYAH METRO </b></font><br />
              <font style="font-size: 8px;">JL Soekarno Hatta No. 42 Mulyojati 16B, Fax: (0725) 47760 Metro Barat - Kota Metro 34125</font><br />
              <font style="font-size: 8px;">Email : info.rsumm@gmail.com , Telp: (0721) 49490-7850378 , Website : www.rsumm.co.id</font>
            </center>
          </td>
          <td><img src="<?php base_url() ?>assets/images/larsibaru.png" width="50" height="50" /></td>
        </tr>
        <tr>
          <td colspan="3"><hr /></td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="text" style="font-size: 12px;">
          <?php 
                    $kers=new DateTime($skdp['FS_SKDP_KONTROL']);
                    $rujukannya=new DateTime($skdp['FS_SKDP_FASKES']);
                  if($skdp['FS_SKDP_FASKES']==''){?>
                    <u><b>SURAT KETERANGAN KONTROL KEMBALI KE RSUMM</b></u>
                  <?php }
                    else if($kers<$rujukannya){?>
                    <u><b>SURAT KETERANGAN KONTROL KEMBALI KE RSUMM</b></u>
                    <?php } else {?>
                        <u><b>SURAT KETERANGAN KONTROL KEMBALI KE RSUMM SETELAH DARI FASKES PRIMER</b></u>
                <?php } ?>
            
            <hr />
          </td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td width="100" style="font-size: 10px;">Nama</td>
          <td width="175" style="font-size: 10px;">: <?= $biodata['NAMA_PASIEN']; ?></td>
        </tr>
        <tr>
          <td width="100" style="font-size: 10px;">No RM</td>
          <td width="175" style="font-size: 10px;">: <?= $biodata['NO_MR']; ?></td>
        </tr>
        <tr>
          <td width="100" style="font-size: 10px;">Diagnosa</td>
          <td width="175" style="font-size: 10px;">: <?= $medis_by_noreg['FS_DIAGNOSA']; ?></td>
        </tr>
        <?php if ($medis_by_noreg['KODE_DOKTER']=='140'){?>
                        <tr>
                        <td width="100" style="font-size: 10px;">Diagnosa Sekunder</td>
                        <td width="175" style="font-size: 10px;">
                            : <?= strip_tags($medis_by_noreg['FS_DIAGNOSA_SEKUNDER']); ?>
                        </td>
        
                    </tr>
            <?php }?>
        <tr>
          <td width="100" style="font-size: 10px;">Terapi</td>
          <td width="175" style="font-size: 10px;">:</td>
        </tr>
        <tr>
          <td colspan="4"></td>
        </tr>
      </table>
      <table width="100%" style="border: 1px solid">
        <tr>
        <td style="font-size: 10px;"><?php echo str_replace("\n", "<br>", $medis_by_noreg['FS_TERAPI']); ?></td>
        </tr>
        
      </table>
      <table width="100%">
      <?php 
               if($skdp['FS_SKDP_FASKES']==''){?>    
             <tr>
             <td class="text3" style="font-size: 12px;"><br> 
                <?php if($skdp['FS_SKDP_KONTROL']==''){ ?>
                    <td class="text3" style="font-size: 12px;">Pasien dapat kontrol ke Rumah Sakit dengan catatan : <b> <?php  echo $skdp['FS_PESAN']."</b>";?> </b></td>
                 
                <?}
                else{ ?>
                 <td class="text3" style="font-size: 12px;"> <br>
                 Pasien dapat kontrol kembali ke Rumah Sakit  pada hari  <b>    <?= $dayList[date('D', strtotime($skdp['FS_SKDP_KONTROL']))] . ',' . date('d M Y', strtotime($skdp['FS_SKDP_KONTROL'])); ?> </b>,  <b><?= $skdp['FS_NM_SKDP_ALASAN']; ?></b>
                </td>
                
                 <br>
                  <?php
                
                  if($skdp['FS_PESAN']!=null|| $skdp['FS_PESAN']!=''){ echo "Catatan : ".$skdp['FS_PESAN'];}?>

                 <?php } ?>
                </tr>
                <tr>
                    <td class="text3" style="font-size: 12px;">Demikian hal ini kami sampaikan untuk dapat dipergunakan sebagaimana perlu, Terimakasih.</td>
                </tr>
                <?php }
                 else if($kers<$rujukannya){?>
                    <tr>
                        <td class="text3" style="font-size: 12px;"><br>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan:</td>

                    </tr>                
                    <tr>
                        <td class="text3" style="font-size: 12px;"><b><?= $skdp['FS_NM_SKDP_ALASAN']; ?></b></td>          
                    </tr>
                    <tr>
                        <td class="text3" style="font-size: 12px;">Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</td>    
                    </tr>
                    <tr>
                        <td class="text3" style="font-size: 12px;"><b><?= $skdp['FS_NM_SKDP_RENCANA']; ?> <?= $skdp['FS_SKDP_KET']; ?></b></td>          
                    </tr>

                    <tr>
                        <td class="text3" style="font-size: 12px;">Pasien dapat kontrol kembali pada <b> hari <?= $dayList[date('D', strtotime($skdp['FS_SKDP_KONTROL']))] . ', tanggal ' . date('d M Y', strtotime($skdp['FS_SKDP_KONTROL'])); ?></b> 
                          <?php
                   
                         if($skdp['FS_PESAN']!=null|| $skdp['FS_PESAN']!=''){ echo "<br> dengan <b>catatan : ".$skdp['FS_PESAN']."</b>";}?>
                        </td>

                    </tr>
                       <?php  if($skdp['FS_SKDP_FASKES']!=''){?>

                     <tr>
                    <td class="text3" style="font-size: 12px;">Adapun tanggal expired/batas masa surat rujuk faskes sampai  <b> hari <?= $dayList[date('D', strtotime($skdp['FS_SKDP_FASKES']))] . ', tanggal ' . date('d M Y', strtotime($skdp['FS_SKDP_FASKES'])); ?></b>.
                       
                 </td>

                    </tr>

                <?php }}             
                else {?>
            <tr>
                <td class="text3" style="font-size: 12px;"><br>
                    Pasien dapat kontrol kembali ke Rumah Sakit setelah dari Faskes Primer pada hari  <b>    <?= $dayList[date('D', strtotime($skdp['FS_SKDP_KONTROL']))] . ',' . date('d M Y', strtotime($skdp['FS_SKDP_KONTROL'])); ?>. </b> 
                    <br>

                     <?php
                   
                     if($skdp['FS_PESAN']!=null|| $skdp['FS_PESAN']!=''){ echo "Catatan : <b>".$skdp['FS_PESAN']."</b><br><br>";}?>
                
                 Demikian hal ini kami sampaikan untuk dapat dipergunakan sebagaimana perlu, Terimakasih. </td>
                
            </tr>
        <?php } ?>

 
      </table>
      <table width="100%" style="text-align:right">
        <tr>
          <td width="100"></td>
          <td class="ttd"><?= $alamat['pref_value'];?>, <?= $medis_by_noreg['mdd']; ?></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td><img src="barcode.png" alt="" width="70" height="70" /></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td><?= $medis_by_noreg['NAMA_DOKTER']; ?></td>
        </tr>
      </table>
    </center>
  </body>
</html>