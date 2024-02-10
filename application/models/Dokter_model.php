<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
    function get_dokter($params = "")
    {
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

    function list_nama_dokter_spesialis($params="") {
        $sql = "SELECT KODE_DOKTER, NAMA_DOKTER
        FROM DB_RSMM.dbo.DOKTER WHERE Jenis_Profesi='DOKTER SPESIALIS'";
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
