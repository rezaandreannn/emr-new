<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat_model extends CI_Model
{
    function list_masalah_keperawatan() {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_DAFTAR_DIAG";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function rencana_keperawatan() {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAM_REN_KEP";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_icd() {
        $sql = "  SELECT * FROM DB_RSMM.dbo.ICD10 where KET like '%TUBERCULOSIS%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
}

