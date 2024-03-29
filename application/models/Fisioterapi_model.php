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
                a.TANGGAL= ? AND c.TANGGAL = ? AND c.Kode_Dokter in ('028','151') AND c.Status='1'
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

        
        $sql = "SELECT * FROM PKU.dbo.TR_CPPT_FISIOTERAPI
                WHERE NO_MR=? ORDER BY ID_CPPT_FISIO DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get data medis fisio rajal by id (edit)
    function get_medis_fisioterapi_by_id($params="")
    {

        
        $sql = "SELECT * FROM PKU.dbo.TR_CPPT_FISIOTERAPI
                WHERE ID_CPPT_FISIO=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get data medis fisio rajal by dokter
    function get_medis_fisioterapi_by_kode_transaksi($params="")
    {

        
        $sql = "SELECT top 1 a.* from PKU.dbo.TR_CPPT_FISIOTERAPI a
                WHERE a.KD_TRANSAKSI_FISIO=? ORDER BY a.ID_CPPT_FISIO ASC";
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
    function get_dokter_by_mr_transaksi_fisio($params="")
    {

        
        $sql = "SELECT top 1 a.*, c.Nama_Dokter from PKU.dbo.TR_CPPT_FISIOTERAPI a
                LEFT JOIN DB_RSMM.dbo.DOKTER c ON a.Kode_Dokter=c.Kode_Dokter
                WHERE a.KD_TRANSAKSI_FISIO=? ORDER BY a.ID_CPPT_FISIO ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    //get data medis fisio rajal by dokter
    function get_medis_fisioterapi_by_kode_transaksi_max($params="")
    {

        
        $sql = "SELECT top 1 a.* from PKU.dbo.TR_CPPT_FISIOTERAPI a
                WHERE a.KD_TRANSAKSI_FISIO=? ORDER BY a.ID_CPPT_FISIO desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get data medis fisio rajal by dokter
    function get_medis_cppt_fisioterapi_by_kode_transaksi($params="")
    {

        
        $sql = "SELECT a.*, b.IMAGE from PKU.dbo.TR_CPPT_FISIOTERAPI a
                    LEFT JOIN PKU.dbo.TTD_PETUGAS_MASTER b on a.CREATE_BY=b.USERNAME
                WHERE a.KD_TRANSAKSI_FISIO=? ORDER BY a.ID_CPPT_FISIO desc";
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
    function get_medis_cppt_fisioterapi_by_kode_transaksi_cppt($params="")
    {

        
        $sql = "SELECT a.* from PKU.dbo.TR_CPPT_FISIOTERAPI a
                WHERE a.KD_TRANSAKSI_FISIO=? ORDER BY a.ID_CPPT_FISIO asc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function update_total_cppt_fisioterapi($params)
    {
        $sql = "UPDATE PKU.dbo.TRANSAKSI_FISIOTERAPI SET JUMLAH_TOTAL_FISIO = ?
        WHERE ID_TRANSAKSI = ?";
        return $this->db->query($sql, $params);

    }   
 

    function update_cppt_fisioterapi($params)
    {
        $sql = "UPDATE PKU.dbo.TR_CPPT_FISIOTERAPI SET KD_TRANSAKSI_FISIO = ?,NO_MR= ?,TEKANAN_DARAH = ?,NADI = ?,SUHU = ?,JENIS_FISIO = ?,TANGGAL_FISIO = ?,JAM_FISIO = ?,CARA_PULANG = ?,CREATE_AT = ?,CREATE_BY = ?,ANAMNESA = ?
         WHERE ID_CPPT_FISIO = ?";
        return $this->db->query($sql, $params);
    }

    //hitung fisio yang sudah dilakukan by mr
    function count_fisio_by_kode_transaksi($params="")
    {

        
        $sql = "SELECT *  FROM PKU.dbo.TR_CPPT_FISIOTERAPI WHERE KD_TRANSAKSI_FISIO=?";
        $query = $this->db->query($sql, $params)->num_rows();
        return $query;
    }

    //get data transaksi fisio rajal by dokter
    function get_transaksi_fisioterapi_by_mr($params="")
    {

        
        $sql = "SELECT * FROM PKU.dbo.TRANSAKSI_FISIOTERAPI
                WHERE NO_MR_PASIEN=? 
                ORDER BY ID_TRANSAKSI DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    //get data transaksi fisio rajal by kode transaksi
    function get_transaksi_fisioterapi_by_kode_transaksi($params="")
    {

        
        $sql = "SELECT * FROM PKU.dbo.TRANSAKSI_FISIOTERAPI
                WHERE KODE_TRANSAKSI_FISIO=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

       // get data INFORMED CONCENT
       function get_informed_concent_by_noreg($params = "")
       {
           $sql = "SELECT A.*
           FROM PKU.dbo.INFORMED_CONCENT_FISIOTERAPI A
           WHERE  A.KODE_REGISTER = ? ";
           $query = $this->db->query($sql, $params);
           if ($query->num_rows() > 0) {
               $result = $query->num_rows();
               $query->free_result();
               return $result;
           } else {
               return 0;
           }
       }

       function get_data_informed_concent_by_noreg($params = "")
       {
           $sql = "SELECT A.*, B.NamaLengkap
           FROM PKU.dbo.INFORMED_CONCENT_FISIOTERAPI A
           LEFT JOIN DB_RSMM.dbo.TUSER B on A.CREATE_BY = B.NamaUser
           WHERE  A.KODE_REGISTER = ? ";
           $query = $this->db->query($sql, $params);
           if ($query->num_rows() > 0) {
               $result = $query->row_array();
               $query->free_result();
               return $result;
           } else {
               return array();
           }
       }
    
    function insert_cppt_fisioterapi($params)
    {
        $sql = "INSERT INTO PKU.dbo.TR_CPPT_FISIOTERAPI(KD_TRANSAKSI_FISIO,NO_MR,TEKANAN_DARAH,NADI,SUHU,JENIS_FISIO,TANGGAL_FISIO,JAM_FISIO,CARA_PULANG, CREATE_AT,CREATE_BY,ANAMNESA)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_inform_concent_fisioterapi($params)
    {
        $sql = "INSERT INTO PKU.dbo.INFORMED_CONCENT_FISIOTERAPI(KODE_REGISTER,CREATE_AT,CREATE_BY,IDENTIFIKASI,RUANGAN, JAM)
    VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_transaksi_fisioterapi($params)
    {
        $sql = "INSERT INTO PKU.dbo.TRANSAKSI_FISIOTERAPI(KODE_TRANSAKSI_FISIO,NO_MR_PASIEN,JUMLAH_TOTAL_FISIO,CREATE_AT,CREATE_BY)
    VALUES (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function delete_cppt_fisio($params) {
        $sql = "DELETE FROM PKU.dbo.TR_CPPT_FISIOTERAPI WHERE ID_CPPT_FISIO = ?";
       return $this->db->query($sql, $params);
   }

    function delete_transaksi_fisio($params) {
        $sql = "DELETE FROM PKU.dbo.TRANSAKSI_FISIOTERAPI WHERE ID_TRANSAKSI = ?";
       return $this->db->query($sql, $params);
   }

   public function generate_kode_transaksi_fisio(){
    $date=date('y');
    $this->db->select('RIGHT(TRANSAKSI_FISIOTERAPI.KODE_TRANSAKSI_FISIO,5) as KODE_TRANSAKSI_FISIO', FALSE);
    $this->db->order_by('KODE_TRANSAKSI_FISIO','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('TRANSAKSI_FISIOTERAPI');
        if($query->num_rows() <> 0){      
             $data = $query->row();
             $kode = intval($data->KODE_TRANSAKSI_FISIO) + 1; 
        }
        else{      
             $kode = 1;  
        }
    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
    $kodetampil = "FISIO".'-'.$date.'-'.$batas;
    return $kodetampil;  
}

}
