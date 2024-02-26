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

    
    function insert_cppt_fisioterapi($params)
    {
        $sql = "INSERT INTO PKU.dbo.TR_CPPT_FISIOTERAPI(KD_TRANSAKSI_FISIO,NO_MR,TEKANAN_DARAH,NADI,SUHU,JENIS_FISIO,TANGGAL_FISIO,JAM_FISIO,CARA_PULANG, CREATE_AT,CREATE_BY,ANAMNESA)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
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
