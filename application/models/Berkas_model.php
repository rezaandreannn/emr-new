<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_model extends CI_Model
{
    function get_px_by_dokter_wait($params)
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
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_px_by_rm($params)
    {
        $sql = "SELECT NO_MR,NAMA_PASIEN,ALAMAT,TGL_LAHIR,JENIS_KELAMIN
                FROM  DB_RSMM.dbo.REGISTER_PASIEN
                WHERE NO_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_px_history2($params)
    {
        $sql = "SELECT a.NO_MR,a.TANGGAL,a.NO_REG,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG, a.MEDIS,
                d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG, a.KODEREKANAN
                FROM DB_RSMM.dbo.PENDAFTARAN a
                INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN c ON a.NO_MR=c.NO_MR
                LEFT JOIN DB_RSMM.dbo.DOKTER d ON a.KODE_DOKTER = d.KODE_DOKTER
                LEFT JOIN DB_RSMM.dbo.M_RUANG e ON a.KODE_RUANG = e.KODE_RUANG
                LEFT JOIN DB_RSMM.dbo.DOKTER f ON a.KODE_DOKTER = f.KODE_DOKTER
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON a.NO_REG=g.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_STATUS i ON a.NO_REG=i.FS_KD_REG
                WHERE a.NO_MR = ?
                GROUP BY  a.NO_MR,a.TANGGAL,a.NO_REG,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG, a.MEDIS
                ,d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG, a.KODEREKANAN
                ORDER BY a.TANGGAL DESC";
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
