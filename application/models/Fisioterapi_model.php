<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fisioterapi_model extends CI_Model
{
    //get data pasien rajal by dokter
    function get_pasien_rajal_fisioterapi($params="")
    {

        
        $sql = "SELECT a.NOMOR,a.NO_MR,a.TANGGAL,c.Kode_Dokter, b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,c.NO_REG, c.KODEREKANAN
                from DB_RSMM.dbo.ANTRIAN a
                LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
                LEFT JOIN DB_RSMM.dbo.PENDAFTARAN c ON a.NO_MR=c.NO_MR
                WHERE 
                a.TANGGAL= ? AND c.TANGGAL = ? AND c.Kode_Dokter in ('028','151')
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

    //get data medis fisio rajal by dokter
    function get_medis_fisioterapi_by_mr($params="")
    {

        
        $sql = "SELECT * FROM PKU.dbo.CPPT_FISIOTERAPI
                WHERE NO_MR_PASIEN=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    
    function insert_cppt_fisioterapi($params)
    {
        $sql = "INSERT INTO PKU.dbo.CPPT_FISIOTERAPI(ANAMNESA,TEKANAN_DARAH,NADI,SUHU,URUTAN_FISIO,NO_MR_PASIEN,TANGGAL,JAM,STATUS)
    VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function delete_cppt_fisio($params) {
        $sql = "DELETE FROM PKU.dbo.CPPT_FISIOTERAPI WHERE ID_CPPT_FISIO = ?";
       return $this->db->query($sql, $params);
   }
}
