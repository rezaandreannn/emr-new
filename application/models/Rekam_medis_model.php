<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis_model extends CI_Model
{

    function get_medis_by_noreg($params = "")
    {
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND a.FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_order_lab_by_noreg($params)
    {
        $sql = "SELECT b.JENIS
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN DB_RSMM.dbo.LAB_JENISPERIKSA b ON a.FS_KD_TARIF=b.no_jenis
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_by_dokter_by_noreg($params)
    {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS,a.FS_ALERGI
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
    function get_alamat()
    {
        $sql = "SELECT pref_value FROM PKU.dbo.tac_com_preferences WHERE pref_group = 'header' AND pref_nm='alamat'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_order_radiologi_by_noreg($params)
    {
        $sql = "SELECT KET_TINDAKAN, fs_bagian
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN DB_RSMM.dbo.M_RINCI_HEADER b ON a.FS_KD_TARIF=b.NO_RINCI
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_by_rekanan($params)
    {
        $sql = "SELECT b.NO_REG,b.KODEREKANAN,a.KODEREKANAN,a.NAMAREKANAN
        FROM  DB_RSMM.dbo.PENDAFTARAN b 
        LEFT JOIN DB_RSMM.dbo.REKANAN a ON a.KODEREKANAN=b.KODEREKANAN
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

    function get_antrian_obat_by_kode_transaksi($params)
    {
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_ANTRIAN_OBAT WHERE FS_KD_RJ_MEDIS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_skdp_by_rg($params)
    {
        $sql = "SELECT a.*,b.FS_NM_SKDP_ALASAN,c.FS_NM_SKDP_RENCANA
        FROM PKU.dbo.TAC_RJ_SKDP a
        LEFT JOIN PKU.dbo.TAC_COM_PARAMETER_SKDP_ALASAN b ON a.FS_SKDP_1=b.FS_KD_TRS
        LEFT JOIN PKU.dbo.TAC_COM_PARAMETER_SKDP_RENCANA c ON a.FS_SKDP_2=c.FS_KD_TRS
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    //Cetak Lembar Verif
    function get_px_by_dokter_by_rg2($params)
    {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
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

    function get_data_terapi_by_rg($params)
    {
        $sql = "SELECT SUM(A.Jumlah) 'JML_OBAT',C.NAMA_OBAT,D.SATUAN,A.Dosis 
         FROM DB_RSMM.dbo.TR_DETAIL_RESEP A, DB_RSMM.dbo.OBAT C, DB_RSMM.dbo.SATUAN_OBAT D, DB_RSMM.dbo.TR_MASTER_RESEP B 
         WHERE A.NO_RESEP=B.NO_RESEP AND A.KODE_OBAT=C.KODE_OBAT AND C.ID_SATUAN=D.ID_SATUAN AND B.NO_REG = ?
         GROUP BY C.NAMA_OBAT,D.SATUAN,A.Dosis ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_px_history_verif($params)
    {
        $sql = "SELECT a.NO_MR,a.TANGGAL,a.NO_REG,a.MEDIS,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG,g.FS_CARA_PULANG,
                 d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG
                 FROM DB_RSMM.dbo.PENDAFTARAN a
                 INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN c ON a.NO_MR=c.NO_MR
                 LEFT JOIN DB_RSMM.dbo.DOKTER d ON a.KODE_DOKTER = d.KODE_DOKTER
                 LEFT JOIN DB_RSMM.dbo.M_RUANG e ON a.KODE_RUANG = e.KODE_RUANG
                 LEFT JOIN DB_RSMM.dbo.DOKTER f ON a.KODE_DOKTER = f.KODE_DOKTER
                 LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON a.NO_REG=g.FS_KD_REG
                 LEFT JOIN PKU.dbo.TAC_RJ_STATUS i ON a.NO_REG=i.FS_KD_REG
                 WHERE a.NO_REG = ?
                 GROUP BY  a.NO_MR,a.TANGGAL,a.NO_REG,a.MEDIS,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG
                 ,d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG
                 ORDER BY a.TANGGAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_lama_inap($params)
    {
        $sql = "SELECT * from DB_RSMM.dbo.TR_KAMAR
         WHERE NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_data_medis_by_rg23($params = "")
    {
        $sql = "SELECT top 1 a.*, c.NAMA_DOKTER,b.user_name,KODE_DOKTER
         FROM PKU.dbo.TAC_RJ_MEDIS a 
         LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
         LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.Kode_Dokter
         WHERE a.FS_KD_REG = ?  order by a.FS_KD_TRS desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    //Batas Lembar Verif
}
