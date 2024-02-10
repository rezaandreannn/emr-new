<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratorium_model extends CI_Model
{
    function list_pemeriksaan_lab($params="") {
        $sql = "SELECT id,No_Kelompok, No_Jenis,JENIS
        FROM DB_RSMM.dbo.LAB_JENISPERIKSA  
        ORDER BY JENIS";
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

