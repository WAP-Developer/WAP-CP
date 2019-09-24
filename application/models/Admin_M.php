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

    public function getRoleMenu($id)
    {
        $query = $this->db->query("SELECT * FROM wb_menu_akses a, wb_menu b, wb_role d WHERE a.menu_id=b.id AND a.role_id=d.id AND a.role_id=$id")->result_array();
        return $query;
    }

    function fetchMenu($menuId)
    {
        $data = $this->db->query("SELECT * FROM wb_sub_menu WHERE menu_id=$menuId")->result();
        $output = '<option value="">---Pilih---</option>';

        foreach ($data as $d) {
            $output .= '<option value="' . $d->id . '">' . $d->sub_menu . '</option>';
        }

        return $output;
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

    public function insertRoleMenu($data)
    {
        $this->db->insert('wb_menu_akses', $data);
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

    public function updateSubMenu($id, $data)
    {
        $this->db->where('menu_id', $id);
        $this->db->update('wb_sub_menu', $data);
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

    public function deleteSubMenu($id)
    {
        $this->db->delete('wb_sub_menu', array('menu_id' => $id));
    }

    public function deleteMenuRole($id)
    {
        $this->db->delete('wb_menu_akses', array('id_akses' => $id));
    }
}
