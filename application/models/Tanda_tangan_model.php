<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanda_tangan_model extends CI_Model
{
    function insert_ttd($params)
    {
        $sql = "INSERT INTO PKU.dbo.TTD_PETUGAS_MASTER(USERNAME,STATUS,IMAGE)
        VALUES (?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_ttd_pasien($params)
    {
        $sql = "INSERT INTO PKU.dbo.TTD_PASIEN_MASTER(NO_MR_PASIEN,CREATE_AT,IMAGE)
        VALUES (?,?,?)";
        return $this->db->query($sql, $params);
    }


 function get_data_ttd($params="")
 {
     $sql = "SELECT a.*, b.NamaUser, b.NamaLengkap
             FROM PKU.dbo.TTD_PETUGAS_MASTER a
             LEFT JOIN DB_RSMM.dbo.TUSER b ON a.username = b.NamaUser";
     $query = $this->db->query($sql, $params);
     if ($query->num_rows() > 0) {
         $result = $query->result_array();
         $query->free_result();
         return $result;
     } else {
         return array();
     }
 }

 function get_detail($params="")
 {
     $sql = "SELECT a.*
             FROM PKU.dbo.TTD_PETUGAS_MASTER a
             where a.ID_TTD=?";
     $query = $this->db->query($sql, $params);
     if ($query->num_rows() > 0) {
         $result = $query->row_array();
         $query->free_result();
         return $result;
     } else {
         return array();
     }
 }

 function cek_ttd_petugas($params="")
 {
     $sql = "SELECT a.*
             FROM PKU.dbo.TTD_PETUGAS_MASTER a
             where a.USERNAME=?";
     $query = $this->db->query($sql, $params);
     if ($query->num_rows() > 0) {
         $result = $query->num_rows();
         $query->free_result();
         return $result;
     } else {
        return 0;
     }
 }

 function cek_ttd_pasien($params="")
 {
     $sql = "SELECT a.*
             FROM PKU.dbo.TTD_PASIEN_MASTER a
             where a.NO_MR_PASIEN=?";
     $query = $this->db->query($sql, $params);
     if ($query->num_rows() > 0) {
         $result = $query->num_rows();
         $query->free_result();
         return $result;
     } else {
        return 0;
     }
 }

     //get ttd petugas
     function get_ttd($params="")
     {
 
         
         $sql = "SELECT a.* from PKU.dbo.TTD_PETUGAS_MASTER a
                 WHERE a.USERNAME=? ";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->result_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }

     function get_ttd_dokter($params="")
     {
 
         
         $sql = "SELECT a.* from PKU.dbo.TTD_PETUGAS_MASTER a
                 WHERE a.USERNAME=? AND STATUS='Dokter'";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->result_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }

 function edit_ttd($params)
 {
     $sql = "UPDATE PKU.dbo.TTD_PETUGAS_MASTER SET USERNAME = ?, STATUS = ?, IMAGE = ? 
     WHERE ID_TTD = ?";
     return $this->db->query($sql, $params);
 }

 function delete_ttd($params) {
    $sql = "DELETE FROM PKU.dbo.TTD_PETUGAS_MASTER WHERE ID_TTD = ?";
   return $this->db->query($sql, $params);
}
}

