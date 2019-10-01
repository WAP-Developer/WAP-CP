<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function getAlbum()
    {
        $this->db->order_by('id', 'DESC');
        $album = $this->db->get('wb_album')->result_array();
        return $album;
    }

    public function getDetailAlbum($id)
    {
        $query = $this->db->query("SELECT * FROM wb_album a, wb_album_foto b WHERE a.id=b.album_id AND a.slug='$id' ORDER BY b.id_photo DESC")->result_array();
        return $query;
    }

    public function getOrgs()
    {
        $employes = $this->db->get('wb_employe')->result_array();
        return $employes;
    }

    public function getAchievement()
    {
        $achievement = $this->db->get('wb_achievement')->result_array();
        return $achievement;
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

    public function getAllNews()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('wb_news')->result_array();
    }

    public function getOneNews()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('wb_news', 1, 0)->row_array();
    }

    public function getFourNews()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('wb_news', 4, 1)->result_array();
    }

    public function getTwoNews()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('wb_news', 2, 5)->result_array();
    }

    public function getTwoCount()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('wb_news')->num_rows();
    }

    public function getDetailNews($slug)
    {
        return $this->db->query("SELECT a.id, b.name, a.title, a.news, a.update_at, a.photo FROM wb_news a, wb_admin b WHERE a.admin_id=b.id AND a.slug='$slug'")->row_array();
    }
}
