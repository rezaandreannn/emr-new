<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permissions_model extends CI_Model
{
    // get navigation by user and parent nav
    function get_navigation_user_by_parent($params) {
        $sql = "SELECT * FROM PKU.dbo.tac_com_menu a
                INNER JOIN PKU.dbo.tac_com_role_menu b ON a.nav_id = b.nav_id
                INNER JOIN PKU.dbo.tac_com_role_user c ON b.role_id = c.role_id
                WHERE a.portal_id = ? AND c.role_id = ? AND c.user_id = ? AND parent_id = ? AND active_st = '1' AND display_st = '1'
                ORDER BY nav_no ASC";
        $query = $this->db->query($sql, $params);
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }



}
