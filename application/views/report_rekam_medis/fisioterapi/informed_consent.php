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
				text-align: center;
				font-size: 15px;
				text-decoration: underline;
			}

			table tr .text3 {
				font-size: 15px;
			}
			table tr .text2 {
				font-size: 12px;
			}
			

			kop {
				text-align: center;
				margin: auto;
			}
		
		</style>
	</head>
	<body>
		<div class="letter">
			<table width="100%" class="kop">
				<tr>
					<td><img src="<?php base_url() ?>assets/images/logo.png" alt="" width="90" height="90" /></td>
					<td>
						<center>
							<font size="4"><b>MAJELIS PEMBINA KESEHATAN UMUM</b></font
							><br />
							<font size="4"><b>RSU MUHAMMADIYAH METRO </b></font><br />
							<font size="1"
								>JL Soekarno Hatta No. 42 Mulyojati 16B, Fax: (0725) 47760 Metro
								Barat - Kota Metro 34125</font
							><br />
							<font size="1"
								>Email : info.rsumm@gmail.com , Telp: (0721) 49490-7850378 ,
								Website : www.rsumm.co.id</font
							>
						</center>
					</td>
					<td ><img style="padding-left:30px" src="<?php base_url() ?>assets/images/larsibaru.png" alt="" width="90" height="90" /></td>
				</tr>
				<tr>
					<td colspan="3"><hr /></td>
				</tr>
			</table>

			<table width="100%" style="padding-bottom: 6px">
				<tr>
					<td class="text3" width="200">
						Informed consent pelayanan rehabilitasi medik (fisioterapi)
					</td>
				</tr>
				<tr>
					<td class="text3" width="200">Yang bertanda tangan dibawah ini :</td>
				</tr>
			</table>
			<table>
				<tr>
					<td  class="text3" style="padding-left: 12px">Nama Pasien</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$biodata['NAMA_PASIEN']?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Tanggal Lahir</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?= date('d-m-Y',  strtotime($biodata['TGL_LAHIR'])); ?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Umur/Jenis Kelamin</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px">18 tahun/ <?php if ($biodata['JENIS_KELAMIN'] == 'L') {
                                                      echo "Laki-Laki";
                                                    } else {
                                                      echo "Perempuan";
                                                    } ?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Alamat</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$biodata['ALAMAT']?></td>
				</tr>
			</table>
			<table width="100%" style="padding-bottom: 6px; padding-top: 2px">
				<tr>
					<td class="text3" width="200">
						Telah menerima dan memahami informasi yang diberikan mencakup :
					</td>
				</tr>
				<tr>
					<td class="text3" width="200" style="padding-left: 12px">
						a. Tata cara tindakan pelayanan rehabilitasi medik (fisioterapi)
					</td>
				</tr>
				<tr>
					<td class="text3" width="200" style="padding-left: 12px">
						b. Tujuan tindakan pelayanan rehabilitasi medik (fisioterapi) yang
						dilakukan
					</td>
				</tr>
				<tr>
					<td class="text3" width="200" style="padding-left: 12px">
						c. Alternative tindakan lain
					</td>
				</tr>
				<tr>
					<td class="text3" width="200" style="padding-left: 12px">
						d. Resiko dan kompilasi yang mungkin terjadi
					</td>
				</tr>
				<tr>
					<td class="text3" width="200" style="padding-left: 12px">
						e. Prognosis terhadap tindakan yang dilakukan
					</td>
				</tr>
			</table>
			<table width="100%" style="padding-top: 12px">
				<tr>
					<td class="text3" width="200">
						dengan ini menyatakan sesungguhnya memberikan PERSETUJUAN, untuk
						dilakukan tindakan fisioterapi :
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="padding-left: 12px" class="text3">Terhadap</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$informed_concent['IDENTIFIKASI']?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Nama</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$biodata['NAMA_PASIEN']?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Umur/Jenis Kelamin</td>
					<td>:</td> 
					<td class="text3" style="padding-left: 12px">39 tahun/<?php if ($biodata['JENIS_KELAMIN'] == 'L') {
                                                      echo "Laki-Laki";
                                                    } else {
                                                      echo "Perempuan";
                                                    } ?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Alamat</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$biodata['ALAMAT']?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">Ruangan/kamar</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$informed_concent['RUANGAN']?></td>
				</tr>
				<tr>
					<td class="text3" style="padding-left: 12px">No. Rekam Medis</td>
					<td>:</td>
					<td class="text3" style="padding-left: 12px"><?=$biodata['NO_MR']?></td>
				</tr>
			</table>

			<table width="100%" style="padding-top: 35px">
				<tr>
					<td width="300"></td>
					<td>Metro, <?= date('d-m-Y',  strtotime($informed_concent['CREATE_AT'])); ?> Jam: <?= date('G:i',  strtotime($informed_concent['JAM'])); ?> WIB</td>
				</tr>
				<tr>
					<td width="300">Fisioterapis</td>
					<td>Yang membuat pernyataan</td>
				</tr>
				<?php 
					$get_ttd = $this->Tanda_tangan_model->get_ttd(array($informed_concent['CREATE_BY']));
					$get_ttd_pasien = $this->Tanda_tangan_model->get_ttd_pasien(array($biodata['NO_MR']));
				?>
				<tr>
					<td><img src="<?php echo base_url($get_ttd['IMAGE'])?>" alt="" width="90" height="90" /></td>
					<td><img src="<?php echo base_url($get_ttd_pasien['IMAGE'])?>" alt="" width="90" height="90" /></td>
				</tr>
				<tr>
					<td width="300">(<?=$informed_concent['NamaLengkap']?>)</td>
					<td>(<?=$biodata['NAMA_PASIEN']?>)</td>
				</tr>
				<tr>
					<td width="300">Tanda Tangan dan nama jelas</td>
					<td>Tanda Tangan dan nama jelas</td>
				</tr>
			</table>
		</div>
	</body>
</html>
