<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_jalan_model extends CI_Model
{

//get data dokter
function get_dokter($params="") {
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


function insert_status_rj($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_STATUS(FS_KD_REG, FS_STATUS,FS_FORM,FS_JNS_ASESMEN, mdb, mdd)
    VALUES(?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}

function insert_vital_sign($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_VITAL_SIGN(FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD,FS_TB,FS_BB,FS_KD_MEDIS, mdb, mdd, FS_JAM_TRS)
    VALUEs (?,?,?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}

function insert_nyeri($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_NYERI(FS_KD_REG, FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, mdb, mdd, FS_NYERI)
    VALUES (?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}

function insert_resiko_jatuh($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_JATUH(FS_KD_REG, FS_CARA_BERJALAN1, FS_CARA_BERJALAN2, FS_CARA_DUDUK,intervensi1,intervensi2, mdd, mdb)
    VALUES (?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
} 

function insert_asesmen_perawat($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
    FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_ANAMNESA,FS_PENGELIHATAN,
    FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_EDUKASI,FS_SKDP_FASKES,mdb,mdd)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}

function insert_alergi($params) {
    $sql = "UPDATE DB_RSMM.dbo.REGISTER_PASIEN SET FS_ALERGI = ?, FS_REAK_ALERGI = ?, FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?
            WHERE NO_MR = ?";
    return $this->db->query($sql, $params);
}

function insert_nutrisi($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI1, FS_NUTRISI2,FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
    VALUES (?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}

function insert_masalah_kep($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_MASALAH_KEP(FS_KD_REG, FS_KD_MASALAH_KEP)
    VALUES (?,?)";
    return $this->db->query($sql, $params);
}

function insert_rencana_kep($params) {
    $sql = "INSERT INTO PKU.dbo.TAC_RJ_REN_KEP(FS_KD_REG, FS_KD_REN_KEP)
    VALUES (?,?)";
    return $this->db->query($sql, $params);
}

function cek_status_asasmen($params)
{
return $this->db->query("SELECT * FROM TAC_RJ_STATUS WHERE FS_KD_REG='$params'");
}

function get_asesmen_perawat_by_no_reg($params) {
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

function get_vital_sign_by_no_reg($params) {
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

function get_asesmen_nyeri_by_no_reg($params) {
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

function get_asesmen_jatuh_by_no_reg($params) {
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

function get_nutrisi_by_no_reg($params) {
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

function masalah_keperawatan_by_no_reg($params) {
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

function rencana_keperawatan_by_no_reg($params) {
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
}
