<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_jalan_model extends CI_Model
{

    //get data dokter
    function get_dokter($params = "")
    {
        $sql = "SELECT KODE_DOKTER,NAMA_DOKTER FROM
    DB_RSMM.dbo.DOKTER
    WHERE JENIS_PROFESI = 'DOKTER UMUM' OR JENIS_PROFESI = 'DOKTER SPESIALIS' and KODE_DOKTER NOT IN('140s','TM140') 
    ORDER BY NAMA_DOKTER ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function insert_status_rj($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_STATUS(FS_KD_REG, FS_STATUS,FS_FORM,FS_JNS_ASESMEN, mdb, mdd)
    VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_status_rj($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_STATUS SET FS_STATUS = ?, mdb = ?, mdd = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function insert_vital_sign($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_VITAL_SIGN(FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD,FS_TB,FS_BB,FS_KD_MEDIS, mdb, mdd, FS_JAM_TRS)
    VALUEs (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_vital_sign($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_VITAL_SIGN SET FS_SUHU = ?, FS_NADI =?, FS_R=?, FS_TD=?, FS_TB=?, FS_BB=?, mdb=?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function insert_nyeri($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_NYERI(FS_KD_REG, FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, mdb, mdd, FS_NYERI)
    VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_nyeri($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_NYERI SET FS_NYERIP = ?, FS_NYERIQ = ?, FS_NYERIR = ?, FS_NYERIS = ?, FS_NYERIT = ?, mdb = ?, mdd = ?,FS_NYERI=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function insert_resiko_jatuh($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_JATUH(FS_KD_REG, FS_CARA_BERJALAN1, FS_CARA_BERJALAN2, FS_CARA_DUDUK,intervensi1,intervensi2, mdd, mdb)
    VALUES (?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_resiko_jatuh($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_JATUH SET FS_CARA_BERJALAN1 = ?, FS_CARA_BERJALAN2 = ?, FS_CARA_DUDUK = ?,intervensi1 = ?,intervensi2 = ?, mdd = ?, mdb=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function insert_asesmen_perawat($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
    FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_ANAMNESA,FS_PENGELIHATAN,
    FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_EDUKASI,FS_SKDP_FASKES,mdb,mdd)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_asesmen_perawat($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_ASES_PER2 SET FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?, FS_RIW_PENYAKIT_KEL=?, FS_RIW_PENYAKIT_KEL2=?,
    FS_STATUS_PSIK=?,FS_STATUS_PSIK2=?,FS_HUB_KELUARGA=?,FS_ST_FUNGSIONAL=?,FS_AGAMA=?,FS_NILAI_KHUSUS=?,FS_NILAI_KHUSUS2=?,FS_ANAMNESA=?,
    FS_PENGELIHATAN=?, FS_PENCIUMAN=?,FS_PENDENGARAN=?,FS_RIW_IMUNISASI=?,FS_RIW_IMUNISASI_KET=?,FS_RIW_TUMBUH=?,FS_RIW_TUMBUH_KET=?, FS_HIGH_RISK=?, 
    FS_EDUKASI=?,FS_SKDP_FASKES=?,mdb=?,mdd=?
    WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }

    function insert_alergi($params)
    {
        $sql = "UPDATE DB_RSMM.dbo.REGISTER_PASIEN SET FS_ALERGI = ?, FS_REAK_ALERGI = ?, FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?
            WHERE NO_MR = ?";
        return $this->db->query($sql, $params);
    }

    function insert_nutrisi($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI1, FS_NUTRISI2,FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
    VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_nutrisi($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_NUTRISI SET FS_NUTRISI1 = ?, FS_NUTRISI2 = ?,FS_NUTRISI_ANAK1=?,FS_NUTRISI_ANAK2=?,FS_NUTRISI_ANAK3=?,
    FS_NUTRISI_ANAK4=?,  mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function insert_masalah_kep($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_MASALAH_KEP(FS_KD_REG, FS_KD_MASALAH_KEP)
    VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_rencana_kep($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_REN_KEP(FS_KD_REG, FS_KD_REN_KEP)
    VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_riwayat_perawat($params)
    {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_PERAWAT_RAJAL(FS_KD_REG,FS_SUHU,FS_NADI,FS_R,FS_TD,FS_TB,FS_BB,FS_NYERIP,FS_NYERIQ,FS_NYERIR,FS_NYERIS,FS_NYERIT,FS_NYERI,FS_CARA_BERJALAN1,FS_CARA_BERJALAN2,FS_CARA_DUDUK,FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_ANAMNESA,FS_PENGLIHATAN,FS_PENCIUMAN,FS_PENDENGARAN,FS_EDUKASI,FS_ALERGI,FS_REAK_ALERGI,FS_RIW_PENYAKIT_DAHULU,FS_RIW_PENYAKIT_DAHULU2,FS_NUTRISI1,FS_NUTRISI2,FS_NUTRISI_ANAK1,FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4,MDB, MDD) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function delete_masalah_kep($params)
    {
        $sql = "DELETE PKU.dbo.TAC_RJ_MASALAH_KEP 
    WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rencana_kep($params)
    {
        $sql = "DELETE PKU.dbo.TAC_RJ_REN_KEP 
    WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function cek_status_asasmen($params)
    {
        return $this->db->query("SELECT * FROM TAC_RJ_STATUS WHERE FS_KD_REG='$params'");
    }

    function get_asesmen_perawat_by_no_reg($params)
    {
        $sql = "SELECT *
    FROM PKU.dbo.TAC_ASES_PER2
    WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_vital_sign_by_no_reg($params)
    {
        $sql = "SELECT a.*,c.NAMALENGKAP,b.user_name
    FROM PKU.dbo.TAC_RJ_VITAL_SIGN a
    LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
    LEFT JOIN DB_RSMM.dbo.TUSER c ON b.user_name=c.NAMAUSER
    WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_asesmen_nyeri_by_no_reg($params)
    {
        $sql = "SELECT *
    FROM PKU.dbo.TAC_RJ_NYERI
    WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_asesmen_jatuh_by_no_reg($params)
    {
        $sql = "SELECT *
    FROM PKU.dbo.TAC_RJ_JATUH
    WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_nutrisi_by_no_reg($params)
    {
        $sql = "SELECT *
    FROM PKU.dbo.TAC_RJ_NUTRISI
    WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function masalah_keperawatan_by_no_reg($params)
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_MASALAH_KEP WHERE FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function rencana_keperawatan_by_no_reg($params)
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_REN_KEP WHERE FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //pemeriksaan dokter
    function insert_pemeriksaan_rj_dokter($params = "")
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_MEDIS(FS_KD_KP,FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK,FS_KD_MEDIS,FS_CARA_PULANG,FS_DAFTAR_MASALAH,FS_PLANNING,FS_OBAT_PROLANIS,
    mdb, mdd,FS_JAM_TRS,FS_EKG,FS_USG,HASIL_ECHO,HASIL_EKG,HASIL_TREADMILL,FS_DIAGNOSA_SEKUNDER)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function get_last_inserted_id()
    {
        return $this->db->insert_id();
    }

    function update_resiko_tinggi($params = "")
    {
        $sql = "UPDATE DB_RSMM.dbo.REGISTER_PASIEN SET FS_HIGH_RISK = ?
        WHERE NO_MR = ?";
        return $this->db->query($sql, $params);
    }

    function update_status_pemeriksaan($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_STATUS SET FS_STATUS=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function cek_antrian_farmasi($params)
    {
        $sql = "SELECT MAX(FS_KD_ANTRIAN) 'ANTRIAN' FROM PKU.dbo.TAC_RJ_ANTRIAN_OBAT WHERE FD_TGL_ANTRIAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // antrian farmasi
    function insert_antrian_obat($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_ANTRIAN_OBAT( FS_KD_RJ_MEDIS, FS_KD_ANTRIAN,FD_TGL_ANTRIAN)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_lab($params)
    {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa4 (fn_no_urut, fs_kd_tarif, fs_kd_reg2) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_rad($params)
    {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa5 (fn_no_urut, fs_kd_tarif,fs_kd_reg2,fs_bagian) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    //insert surat skdp atau surat kontrol
    function insert_surat_skdp($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_SKDP(FS_KD_REG, FS_SKDP_1, FS_SKDP_2,FS_SKDP_KET,FS_SKDP_KONTROL,FS_NO_SKDP, mdb, mdd, mdd_time, FS_SKDP_FASKES, FS_PESAN, FS_RENCANA_KONTROL)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function get_no_skdp($params = "")
    {
        $sql = "SELECT MAX(FS_NO_SKDP) 'NOSKDP' FROM PKU.dbo.TAC_RJ_SKDP WHERE MONTH(mdd) = ? AND YEAR(mdd) = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_alasan_skdp($params = "")
    {
        $sql = "SELECT *  FROM PKU.dbo.TAC_COM_PARAMETER_SKDP_ALASAN";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_rencana_skdp($params)
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAMETER_SKDP_RENCANA WHERE FS_KD_TRS_SKDP_ALASAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_rencana_skdp2($params="")
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAMETER_SKDP_RENCANA";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_asesmen_perawat($params)
    {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_ASES_PER2
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function insert_rujuk_rs($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_RUJUKAN(FS_KD_REG,FS_TUJUAN_RUJUKAN,FS_TUJUAN_RUJUKAN2,FS_ALASAN_RUJUK, mdb, mdd_date, mdd_time)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_rujuk_ke_faskes_primer($params)
    {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_PRB(FS_KD_TRS,FS_KD_REG,FS_TGL_PRB,FS_TUJUAN, mdb, mdd_date, mdd_time)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function get_px_by_dokter_by_rm($params)
    {
        $sql = "SELECT a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, JENIS_KELAMIN, a.TGL_LAHIR, FS_ALERGI FROM DB_RSMM.dbo.REGISTER_PASIEN a WHERE a.NO_MR = ?";
    }

    function update_rujuk_ke_faskes_primer($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_PRB SET FS_TGL_PRB = ?, FS_TUJUAN = ?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }


    //asessmen dokter query
    function get_data_asesmen_dokter_by_noreg($params)
    {
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    //CETAK PROFIL SINGKAT
    function get_px_resume($params)
    {
        $sql = "SELECT TOP 10 A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN,B.ALAMAT, B.KOTA, B.PROVINSI, B.GOL_DARAH,B.STATUS_NIKAH,B.NAMA_PASANGAN,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN,B.WARGA_NEGARA,B.PEKERJAAN,B.AGAMA,B.NO_TELP, B.HP1,B.HP2,B.KODE_POS,B.EMAIL,B.NAMA_HUB,B.NO_IDENTITAS,B.HUB_PASIEN,B.TELP_RUMAH, B.FS_ALERGI,L.*, N.*,
        C.NAMA_DOKTER,C.SPESIALIS 
        FROM DB_RSMM.dbo.PENDAFTARAN A
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN B ON A.NO_MR=B.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER C ON A.KODE_DOKTER=C.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_VITAL_SIGN N ON A.NO_REG = N.FS_KD_REG 
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC";
    }

    function cek_status_asasmen_dokter($params)
    {
        return $this->db->query("SELECT * FROM TAC_RJ_MEDIS WHERE FS_KD_REG='$params'");
    }

    function update_pemeriksaan_rj_dokter($params = "")
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_MEDIS SET FS_DIAGNOSA = ?, FS_ANAMNESA = ?, FS_TINDAKAN =?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?,FS_DAFTAR_MASALAH=?,FS_PLANNING=?,FS_OBAT_PROLANIS=?,mdb=?, mdd=?, FS_EKG=?, FS_USG=?, HASIL_ECHO=?, HASIL_EKG=?, HASIL_TREADMILL=?, FS_DIAGNOSA_SEKUNDER=?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function insert_riwayat_pemeriksaan_dokter($params)
    {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_DOKTER_RAJAL(FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN,  FS_TERAPI, FS_CATATAN_FISIK, FS_CARA_PULANG, FS_DAFTAR_MASALAH,  FS_EKG,   FS_USG, MDB,   MDD) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function cek_skdp_pemeriksaan($params = "")
    {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_SKDP
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_skdp_pemeriksaan($params = "")
    {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_SKDP
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function delete_pemeriksaan_rad($params)
    {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa5 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }

    function delete_pemeriksaan_lab($params)
    {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa4 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }

    function update_surat_skdp($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_SKDP SET FS_SKDP_1 = ?, FS_SKDP_2 = ?,FS_SKDP_KET=?,FS_SKDP_KONTROL=?,FS_KD_REG=?,FS_SKDP_FASKES=?, FS_PESAN=?, FS_RENCANA_KONTROL=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function cek_rujukan_rs($params)
    {
        $sql = "SELECT * FROM
       PKU.dbo.TAC_RJ_RUJUKAN
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_surat_rujukan_rs($params)
    {
        $sql = "SELECT * FROM
       PKU.dbo.TAC_RJ_RUJUKAN
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_surat_prb($params)
    {
        $sql = "SELECT * FROM
       PKU.dbo.TAC_RJ_PRB
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_prb($params)
    {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_PRB
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function update_rujuk_rs($params)
    {
        $sql = "UPDATE PKU.dbo.TAC_RJ_RUJUKAN SET FS_TUJUAN_RUJUKAN = ?, FS_TUJUAN_RUJUKAN2 = ?,FS_ALASAN_RUJUK=?
         WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rujuk_rs($params = "")
    {
        $sql = "DELETE from PKU.dbo.TAC_RJ_RUJUKAN WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rujuk_ke_faskes_primer($params = "")
    {
        $sql = "DELETE FROM PKU.dbo.TAC_RJ_PRB WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_skdp($params = "")
    {
        $sql = "DELETE FROM PKU.dbo.TAC_RJ_SKDP WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function get_history_pasien_by_noreg($params = "")
    {
        $sql = "SELECT TOP 15 A.TANGGAL, A.KODE_RUANG,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT,
         B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,L.MAX_RG,M.FS_KD_MEDIS,M.FS_KD_TRS, M.HASIL_ECHO
        FROM DB_RSMM.dbo.PENDAFTARAN A
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
         LEFT JOIN DB_RSMM.dbo.M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN (SELECT NO_REG 'MAX_RG',NO_MR FROM DB_RSMM.dbo.PENDAFTARAN WHERE TANGGAL = ? AND (KODE_DOKTER = ?)  )L ON A.NO_MR = L.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON a.NO_REG=M.FS_KD_REG

        WHERE A.NO_MR = ? ORDER BY TANGGAL DESC 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get data hasil  lab pasien
    function get_data_laboratorium($params = "")
    {
        $sql = "SELECT A.*
        FROM DB_RSMM.dbo.TR_MASTER_LAB A
        WHERE  A.No_Reg = ?  
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    //get data berkas by no register
    function get_berkas_by_noreg($params = "")
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_RM_BERKAS WHERE FS_KD_REG = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get data resep yang diambil pasien
    function get_data_resep_pasien($params = "")
    {
        $sql = "SELECT *
        FROM DB_RSMM.dbo.TR_MASTER_RESEP 
        WHERE NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    //get data konsulan dokter
    function get_data_konsulan_dokter($params = "")
    {
        $sql = "SELECT a.FS_TUJUAN_RUJUKAN, c.NAMA_DOKTER FROM
        PKU.dbo.TAC_RJ_RUJUKAN a 
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON a.FS_TUJUAN_RUJUKAN=c.KODE_DOKTER 
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //cek visite dokter
    function get_data_visite_dokter($params = "")
    {
        $sql = "SELECT distinct I.NAMA_DOKTER,A.NO_REG
        FROM DB_RSMM.dbo.TR_BIAYARINCI A
        LEFT JOIN DB_RSMM.dbo.DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        WHERE A.NO_REG = ? AND I.JENIS_PROFESI='DOKTER SPESIALIS'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_radiologi_ranap($params="") {
        $sql = "SELECT * FROM PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_periksa_lab_by_noreg($params) {
        $sql = "SELECT FS_KD_REG2
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_periksa_radiologi_by_noreg($params) {
        $sql = "SELECT FS_KD_REG2
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
}
