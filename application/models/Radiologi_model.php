<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Radiologi_model extends CI_Model
{

    function list_pemeriksaan_rad($params="") {
        $sql = "SELECT NO_RINCI,KET_TINDAKAN 
        FROM DB_RSMM.dbo.M_RINCI_HEADER
        -- LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA5 b ON a.NO_RINCI=b.FS_KD_TARIF
        WHERE NO_RINCI LIKE 'B%'";
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