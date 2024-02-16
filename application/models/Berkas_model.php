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
}
