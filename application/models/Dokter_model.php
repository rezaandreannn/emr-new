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

    function list_nama_dokter_spesialis($params = "")
    {
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

    function dokter_praktek_hari_ini()
    {
        $sql = "SELECT
            ds.Kode_Dokter,
            d.Nama_Dokter,
            CASE
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Sunday' AND ds.Ahad = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Monday' AND ds.Senin = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Tuesday' AND ds.Selasa = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Wednesday' AND ds.Rabu = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Thursday' AND ds.Kamis = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Friday' AND ds.Jumat = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Saturday' AND ds.Sabtu = 1 THEN 1
                ELSE 0
            END AS Is_Praktek_Hari_Ini
        FROM
            DB_RSMM.dbo.DOKTER_SMSGATEWAY ds
        JOIN
            DB_RSMM.dbo.DOKTER d ON d.Kode_Dokter = ds.Kode_Dokter
        WHERE
            CASE
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Sunday' AND ds.Ahad = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Monday' AND ds.Senin = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Tuesday' AND ds.Selasa = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Wednesday' AND ds.Rabu = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Thursday' AND ds.Kamis = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Friday' AND ds.Jumat = 1 THEN 1
                WHEN DATENAME(WEEKDAY, GETDATE()) = 'Saturday' AND ds.Sabtu = 1 THEN 1
                ELSE 0
            END = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
