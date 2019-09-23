<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{

    // GET Data
    public function getActiveUser()
    {
        $user = $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array();
        return $user;
    }

    public function getSeo()
    {
        $seo = $this->db->get('wb_seo')->row_array();
        return $seo;
    }

    public function getCurrentRole()
    {
        $this->db->select('*');
        $this->db->from('wb_admin');
        $this->db->join('wb_role', 'wb_admin.role_id = wb_role.id');
        $role = $this->db->get()->row_array();
        return $role;
    }

    public function getOldPassword()
    {
        $old = $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array();
        return $old;
    }

    public function getRoles()
    {
        $getRole = $this->db->get('wb_role')->result_array();
        return $getRole;
    }

    public function getMenu()
    {
        $menu = $this->db->get('wb_menu')->result_array();
        return $menu;
    }
    public function getSubMenu()
    {
        $this->db->select('*');
        $this->db->from('wb_sub_menu');
        $this->db->join('wb_menu', 'wb_menu.id = wb_sub_menu.menu_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    // Insert Data
    public function insertSeo($data)
    {
        $this->db->insert('wb_seo', $data);
    }

    public function insertRole($data)
    {
        $this->db->insert('wb_role', $data);
    }

    public function insertMenu($data)
    {
        $this->db->insert('wb_menu', $data);
    }
    public function insertSubMenu($data)
    {
        $this->db->insert('wb_sub_menu', $data);
    }

    // Update Data
    public function updateSeo($where, $data)
    {
        $this->db->where('title', $where);
        $this->db->update('wb_seo', $data);
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_admin', $data);
    }

    public function updateRole($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_role', $data);
    }

    public function updateMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_menu', $data);
    }

    // Delete Data

    public function deleteRole($id)
    {
        $this->db->delete('wb_role', array('id' => $id));
    }

    public function deleteMenu($id)
    {
        $this->db->delete('wb_menu', array('id' => $id));
    }
}
