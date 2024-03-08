<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    //get data pasien rajal by dokter
    function get_pasien_rajal_by_kode_dokter($params)
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

    function get_pasien_dokter_by_kode_dokter($params)
    {
        $sql = "SELECT a.NOMOR,a.NO_MR,a.TANGGAL,c.Kode_Dokter, b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,
        e.FS_CARA_PULANG,e.FS_TERAPI,e.FS_KD_TRS,c.NO_REG, c.KODEREKANAN,c.KODE_DOKTER, e.HASIL_ECHO
        from DB_RSMM.dbo.ANTRIAN a
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        WHERE 
        a.TANGGAL=? AND DOKTER = ? AND c.TANGGAL = ? AND c.Kode_Dokter = ?
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

    // get history pasien by no mr
    function get_history_by_mr($params = "")
    {
        $sql = "SELECT A.TANGGAL,A.STATUS,A.NO_REG,A.KODE_RUANG,B.NAMA_PASIEN, B.ALAMAT, B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,L.FS_FORM,M.FS_KD_TRS
        FROM DB_RSMM.dbo.PENDAFTARAN A
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN B ON A.NO_MR=B.NO_MR 
        LEFT JOIN DB_RSMM.dbo.DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.REKANAN J ON A.KODEREKANAN=J.KODEREKANAN
        LEFT JOIN DB_RSMM.dbo.M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON A.NO_REG=M.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get history pasien by no mr
    function find_pasien_by_register($params = "")
    {
        $sql = "SELECT No_MR
        FROM DB_RSMM.dbo.PENDAFTARAN 
        WHERE No_reg = ?
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_biodata_pasien_by_mr($params)
    {

        $sql = "SELECT top 1 a.NAMA_PASIEN,a.NO_MR,a.HP2,a.HP1, a.ALAMAT, a.KOTA, a.PROVINSI,JENIS_KELAMIN,
        a.TGL_LAHIR,FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2, b.No_MR, b.No_Reg
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR = b.No_MR 
        WHERE a.NO_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_biodata_pasien_by_mr_datenow($params)
    {

     
        $sql = "SELECT top 1 a.NAMA_PASIEN,a.NO_MR,a.HP2,a.HP1, a.ALAMAT, a.KOTA, a.PROVINSI,JENIS_KELAMIN,
        a.TGL_LAHIR,FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2, b.No_MR, b.No_Reg
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR = b.No_MR 
        WHERE a.NO_MR = ? and b.Tanggal=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_biodata_pasien_by_noreg_dokter($params)
    {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR,a.HP2,a.HP1, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_riwayat_kesehatan_pasien_by_no_reg($params)
    {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN,a.NO_MR,a.ALAMAT, a.JENIS_KELAMIN, c.NAMA_DOKTER, E.NAMAREKANAN,
        a.TGL_LAHIR,FS_ALERGI,a.FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_vital_sign_by_noreg($params)
    {
        $sql = "SELECT a.*,c.NAMALENGKAP,b.user_name
        FROM PKU.dbo.TAC_RJ_VITAL_SIGN a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER c ON b.user_name=c.NAMAUSER
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_nyeri_by_noreg($params)
    {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_NYERI
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_nutrisi_by_noreg($params)
    {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_NUTRISI
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_alergi_by_rg($params)
    {
        $sql = "SELECT *
        FROM DB_RSMM.dbo.REGISTER_PASIEN
        WHERE No_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    // -- MY QUERIES -- //
    function get_pasien_by_dokter_dan_tgl_kunjungan($params)
    {
        $sql = "SELECT 
        a.Nomor as no_antrian,
        a.No_MR as no_mr,
        p.Kode_Dokter as kode_dokter,
        rp.Nama_Pasien  as nama_pasien,
        rp.HP2 as nik,
        CASE 
            WHEN rp.No_Telp IS NULL OR rp.No_Telp = '' THEN rp.HP1 
            ELSE rp.No_Telp 
        END AS no_hp,
          rp.Alamat as alamat,
          rp.Provinsi as provinsi
    FROM 
        DB_RSMM.dbo.ANTRIAN a 
    LEFT JOIN
        DB_RSMM.dbo.REGISTER_PASIEN rp ON a.No_MR = rp.No_MR 
    LEFT JOIN 
        DB_RSMM.dbo.PENDAFTARAN p ON p.No_MR = a.No_MR 
    LEFT JOIN
        PKU.dbo.TAC_RJ_STATUS trs ON trs.FS_KD_REG = p.No_Reg 
    WHERE 
        a.Tanggal = ? AND 
        Dokter = ? AND 
        p.Tanggal = ? AND 
        p.Kode_Dokter = ? AND 
        trs.FS_STATUS != 0
    ORDER BY 
        a.Nomor";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return [];
        }
    }
    // -- MY QUERIES -- //
}
