<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{

    function list_nama_obat($params="") {
        $sql = "SELECT Nama_Obat
        FROM DB_RSMM.dbo.OBAT  ";
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