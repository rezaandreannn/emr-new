<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis_model extends CI_Model
{

    function get_medis_by_noreg($params="") { 
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND a.FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_order_lab_by_noreg($params) {
        $sql = "SELECT b.JENIS
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN DB_RSMM.dbo.LAB_JENISPERIKSA b ON a.FS_KD_TARIF=b.no_jenis
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_by_dokter_by_noreg($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS,a.FS_ALERGI
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_alamat() {
        $sql = "SELECT pref_value FROM PKU.dbo.tac_com_preferences WHERE pref_group = 'header' AND pref_nm='alamat'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_order_radiologi_by_noreg($params) {
        $sql = "SELECT KET_TINDAKAN, fs_bagian
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN DB_RSMM.dbo.M_RINCI_HEADER b ON a.FS_KD_TARIF=b.NO_RINCI
        WHERE FS_KD_REG2 = ?";
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

