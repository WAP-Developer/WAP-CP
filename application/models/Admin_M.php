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

    public function getSidebar($id)
    {
        $query = $this->db->query("SELECT * FROM wb_menu a, wb_menu_akses c WHERE a.id=c.menu_id AND c.role_id=$id")->result_array();
        return $query;
    }

    public function getSubSidebar($role, $id)
    {
        $query = $this->db->query("SELECT * FROM wb_menu a, wb_sub_menu b, wb_menu_akses c WHERE a.id=b.menu_id AND a.id=c.menu_id AND c.role_id=$role AND c.menu_id=$id")->result_array();
        return $query;
    }

    public function getAlbum()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('wb_album')->result_array();
        return $query;
    }

    public function getOneAlbum($id)
    {
        $user = $this->db->query("SELECT * FROM wb_album_foto a, wb_album b WHERE a.album_id=b.id AND a.album_id=$id ORDER BY a.id_photo DESC")->result_array();
        return $user;
    }

    public function getOrganization()
    {
        $org = $this->db->get('wb_employe')->result_array();
        return $org;
    }

    public function getAchievement()
    {
        $acv = $this->db->get('wb_achievement')->result_array();
        return $acv;
    }

    public function getMessage()
    {
        $message = $this->db->get('wb_message')->row_array();
        return $message;
    }

    public function getHistory()
    {
        $query = $this->db->get('wb_history')->result_array();
        return $query;
    }

    public function getVm()
    {
        $query = $this->db->get('wb_vm')->row_array();
        return $query;
    }

    public function getGroup()
    {
        $query = $this->db->get('wb_group')->result_array();
        return $query;
    }

    public function getNews($id)
    {
        $query = $this->db->get_where('wb_news', array('id' => $id))->row_array();
        return $query;
    }

    public function getAllNews()
    {
        $query = $this->db->query("SELECT a.id, b.name, a.title, a.update_at, a.slug FROM wb_news a, wb_admin b ORDER BY a.id DESC")->result_array();
        return $query;
    }

    public function getSelectedNews($id)
    {
        $query = $this->db->query("SELECT a.id, b.name, a.title, a.update_at, a.slug FROM wb_news a, wb_admin b WHERE a.admin_id=$id ORDER BY a.id DESC")->result_array();
        return $query;
    }

    public function getDepartement()
    {
        return $this->db->get('wb_departement')->result_array();
    }

    public function getSelectedJob($id)
    {
        return $this->db->query("SELECT a.*, b.departement FROM wb_job a, wb_departement b WHERE a.departement_id=b.id AND a.id=$id")->row_array();
    }

    public function getJob()
    {
        return $this->db->query("SELECT a.*, b.departement FROM wb_job a, wb_departement b WHERE a.departement_id=b.id ORDER BY a.id DESC")->result_array();
    }

    public function getFullJob()
    {
        return $this->db->query("SELECT * FROM wb_job WHERE status=1 ORDER BY job ASC")->result_array();
    }

    public function getEJob()
    {
        return $this->db->query("SELECT a.*, b.departement FROM wb_job a, wb_departement b WHERE a.departement_id=b.id AND a.status=1 ORDER BY a.id DESC")->result_array();
    }

    public function getUserApplied($id)
    {
        return $this->db->query("SELECT a.*, b.job FROM wb_applied a, wb_job b WHERE a.job_id = b.id AND a.job_id=$id")->result_array();
    }

    public function fetchUser($id)
    {
        $data = $this->db->query("SELECT a.*, b.job FROM wb_applied a, wb_job b WHERE a.job_id = b.id AND a.job_id=$id AND a.status=2")->result();

        $output = '';

        foreach ($data as $d) {
            $output .= $d->email . ', ';
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

    public function insertAlbum($data)
    {
        $this->db->insert('wb_album', $data);
    }

    public function insertGalleryPhoto($data)
    {
        $this->db->insert('wb_album_foto', $data);
    }

    public function insertEmploye($data)
    {
        $this->db->insert('wb_employe', $data);
    }

    public function insertAchievement($data)
    {
        $this->db->insert('wb_achievement', $data);
    }

    public function insertMessage($data)
    {
        $this->db->insert('wb_message', $data);
    }

    public function insertHistory($data)
    {
        $this->db->insert('wb_history', $data);
    }

    public function insertVm($data)
    {
        $this->db->insert('wb_vm', $data);
    }

    public function insertGroup($data)
    {
        $this->db->insert('wb_group', $data);
    }

    public function insertNews($data)
    {
        $this->db->insert('wb_news', $data);
    }

    public function insertDep($data)
    {
        $this->db->insert('wb_departement', $data);
    }

    public function insertJob($data)
    {
        $this->db->insert('wb_job', $data);
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
        $this->db->where('id_sub', $id);
        $this->db->update('wb_sub_menu', $data);
    }

    public function updateAlbum($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_album', $data);
    }

    public function updatePhoto($id, $data)
    {
        $this->db->where('id_photo', $id);
        $this->db->update('wb_album_foto', $data);
    }

    public function updateEmploye($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_employe', $data);
    }

    public function updateAchievement($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_achievement', $data);
    }

    public function updateMessage($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_message', $data);
    }

    public function updateHistory($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_history', $data);
    }

    public function updateVm($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_vm', $data);
    }

    public function updateGroup($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_group', $data);
    }

    public function updateNews($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_news', $data);
    }

    public function updateDep($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_departement', $data);
    }

    public function updateJob($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_job', $data);
    }

    public function updateStatus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wb_applied', $data);
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
        $this->db->delete('wb_sub_menu', array('id_sub' => $id));
    }

    public function deleteMenuRole($id)
    {
        $this->db->delete('wb_menu_akses', array('id_akses' => $id));
    }

    public function deleteAlbum($id)
    {
        $this->db->delete('wb_album', array('id' => $id));
    }

    public function deletePhoto($id)
    {
        $this->db->delete('wb_album_foto', array('id_photo' => $id));
    }

    public function deleteAlbumPhoto($id)
    {
        $this->db->delete('wb_album_foto', array('album_id' => $id));
    }

    public function deleteEmploye($id)
    {
        $this->db->delete('wb_employe', array('id' => $id));
    }

    public function deleteAchievement($id)
    {
        $this->db->delete('wb_achievement', array('id' => $id));
    }

    public function deleteHistory($id)
    {
        $this->db->delete('wb_history', array('id' => $id));
    }

    public function deleteGroup($id)
    {
        $this->db->delete('wb_group', array('id' => $id));
    }

    public function deleteNews($id)
    {
        $this->db->delete('wb_news', array('id' => $id));
    }

    public function deleteDep($id)
    {
        $this->db->delete('wb_departement', array('id' => $id));
    }

    public function deleteJob($id)
    {
        $this->db->delete('wb_job', array('id' => $id));
    }
}
