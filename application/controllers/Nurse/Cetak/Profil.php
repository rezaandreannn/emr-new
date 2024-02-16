<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Ringkas</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        table tr .text3 {
            font-size: 15px;
            border: none;
        }

        table tr .text1 {
            font-size: 12px;
            border: none;
        }

        table tr .text5 {
            font-size: 15px;
            border: none;
        }

        table,
        td,
        th {
            border: 1px solid;
            border-collapse: collapse;
            font-weight: normal;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <center>
        <table width="625" style="border: none">
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
        <table width="625" style="border: none">
            <tr>
                <td width="200" class="text1">Nama</td>
                <td width="350" class="text1">: <?= ucwords(strtolower($rs_pasien['NAMA_PASIEN'])); ?></td>
                <td width="200" class="text1">No MR</td>
                <td width="350" class="text1">: <?php echo $rs_pasien['NO_MR']; ?></td>
            </tr>
            <tr>
                <td width="200" class="text1">Tanggal Lahir</td>
                <td width="350" class="text1">: <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?> </td>
                <td width="200" class="text1">Alamat</td>
                <td width="350" class="text1">: <?php echo $rs_pasien['ALAMAT'] . "," . $rs_pasien['KOTA']; ?></td>
            </tr>
            <tr>
                <td colspan="4" class="text1">
                    <hr />
                </td>
            </tr>
        </table>
        <table width="625" style="border: none">
            <tr>
                <th class="text3" colspan="6" style="background-color: black; color: white">PROFIL RINGKAS MEDIS RAWAT JALAN</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Dokter</th>
                <th>Urain Klinis</th>
                <th>Diagnosa</th>
                <th>Rencana</th>
                <th>Terapi</th>
            </tr>
            <?php foreach ($rs_resume as $data) { ?>
                <tr>
                    <td width="80"><?= date('d-m-Y', strtotime($data['TANGGAL'])); ?></td>
                    <td width="120"><?= $data['NAMA_DOKTER']; ?> <br> ( <?= ucwords(strtolower($data['SPESIALIS'])); ?>) </td>
                    <td width="100">TD : <?php echo str_replace("-", " ", $data["FS_TD"]); ?> mmHg <br>
                        <?php
                        if ($data["KONJUNGTIVA"] != "") {
                            echo "Konjungtiva : " . $data["KONJUNGTIVA"] . "<br>";
                        } ?>
                        <?php
                        if ($data["THORAX"] != "") {
                            echo "Thorax : " . $data["THORAX"] . "<br>";
                        } ?>
                        <?php
                        if ($data["ABDOMEN"] != "") {
                            echo "Abdomen : " . $data["ABDOMEN"] . "<br>";
                        } ?>
                        Keluhan : <?= strip_tags($data["FS_ANAMNESA"]); ?></td>
                    <td width="100"> <?= strip_tags($data["FS_DIAGNOSA"]); ?></td>
                    <td width="100"> <?= strip_tags($data["FS_PLANNING"]); ?></td>
                    <td width="100"> <?php echo str_replace("\n", "<br>", $data["FS_TERAPI"]); ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>

</html>