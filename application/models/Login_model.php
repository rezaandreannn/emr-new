<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    // get user detail with auto role
    function get_user_detail_by_username_auto_role($params)
    {
        $sql = "SELECT TOP 1 a.*, c.role_id, c.role_nm, c.default_page,user_name
                FROM PKU.dbo.tac_com_user a
                LEFT JOIN PKU.dbo.tac_com_role_user b ON a.user_id = b.user_id
                LEFT JOIN PKU.dbo.tac_com_role c ON b.role_id = c.role_id
                WHERE user_name = ? AND c.portal_id = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }


    // get login auto role
    function get_user_login_auto_role($username, $password, $portal)
    {
        // load encrypt
        $this->load->library('encrypt');
        // process
        // get hash key
        $result = $this->get_user_detail_by_username_auto_role(array($username, $portal));
        if (!empty($result)) {
            $password_decode = $this->encrypt->decode($result['user_pass'], $result['user_key']);

            // get user
            if ($password_decode === $password) {
                // cek authority then return id
                return $result;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    // get user profil
    function get_user_profil($params)
    {
        $sql = "SELECT * FROM 
                    (
                            SELECT b.*,a.user_id,a.user_name, d.role_id, d.role_nm, d.role_parent,a.fs_kd_layanan
                            FROM PKU.dbo.tac_com_user a
                            INNER JOIN DB_RSMM.dbo.TUSER b ON a.user_name = b.NamaUser
                            INNER JOIN PKU.dbo.tac_com_role_user c ON a.user_id = c.user_id
                            INNER JOIN PKU.dbo.tac_com_role d ON c.role_id = d.role_id
                            WHERE a.user_id = ? AND c.role_id = ?
                            
                    ) result 
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

    function get_permission_by_id($id)
    {
        $sql = "SELECT a.*, b.*, d.role_nm, d.role_id 
            FROM users a 
            LEFT JOIN PKU.dbo.tac_com_user b ON a.user_id = b.user_id
            LEFT JOIN PKU.dbo.tac_com_role_user c ON b.user_id = c.user_id
            LEFT JOIN PKU.dbo.tac_com_role d ON c.role_id = d.role_id
            WHERE a.user_id = ?
            ORDER BY a.user_id ASC";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
