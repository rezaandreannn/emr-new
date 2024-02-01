<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienModel extends CI_Model
{

    //get data pasien rajal by dokter
    function get_pasien_rajal_by_kode_dokter($params)
    {
        $sql = "SELECT a.NOMOR,a.NO_MR,a.TANGGAL,c.Kode_Dokter, b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,
                e.FS_CARA_PULANG,e.FS_TERAPI,e.FS_KD_TRS,c.NO_REG, c.KODEREKANAN, e.HASIL_ECHO
                from DB_RSMM.dbo.ANTRIAN a
                LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
                LEFT JOIN DB_RSMM.dbo.PENDAFTARAN c ON a.NO_MR=c.NO_MR
                LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
                WHERE 
                a.TANGGAL=? AND DOKTER = ? AND c.TANGGAL = ? AND c.Kode_Dokter = ?
                ORDER BY a.NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get history pasien by no mr
    function get_history_by_mr($params="") {
        $sql = "SELECT A.TANGGAL,A.STATUS,A.NO_REG,A.KODE_RUANG,B.NAMA_PASIEN, B.ALAMAT, B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,L.FS_FORM,M.FS_KD_TRS
        FROM DB_RSMM.dbo.PENDAFTARAN A
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN B ON A.NO_MR=B.NO_MR 
        LEFT JOIN DB_RSMM.dbo.DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.REKANAN J ON A.KODEREKANAN=J.KODEREKANAN
        LEFT JOIN DB_RSMM.dbo.M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON A.NO_REG=M.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC
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

    // get history pasien by no mr
    function find_pasien_by_register($params="") {
        $sql = "SELECT No_MR
        FROM DB_RSMM.dbo.PENDAFTARAN 
        WHERE No_reg = ?
        ORDER BY TANGGAL DESC
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

    function get_biodata_pasien_by_mr($params) {
        $sql = "SELECT a.NAMA_PASIEN,a.NO_MR,a.HP2,a.HP1, a.ALAMAT, a.KOTA, a.PROVINSI,JENIS_KELAMIN,
        a.TGL_LAHIR,FS_ALERGI
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        WHERE a.NO_MR = ?";
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
