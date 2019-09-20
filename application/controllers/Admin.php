<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Maaf! Silakan masuk terlebih dahulu.</span></div>');
            redirect('cp-admin/auth/login');
        }
    }

    public function dashboard()
    {
        $this->db->select('*');
        $this->db->from('wb_admin');
        $this->db->join('wb_role', 'wb_admin.role_id = wb_role.id');
        $role = $this->db->get()->row_array();

        $data = array(
            'role' => $role,
            'user' => $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array(),
            'check' => $this->db->get('wb_seo')->row_array(),
            'title' => 'Dashboard'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function seo()
    {
        $this->form_validation->set_rules('title', 'Title Website', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => '%s Tidak boleh lebih dari 60 karakter.'
        ));
        $this->form_validation->set_rules('description', 'Description', 'max_length[160]', array(
            'max_length' => '%s Tidak boleh lebih dari 160 karakter.'
        ));
        $this->form_validation->set_rules('crawl_landing', 'Crawl Landing Page', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('follow_landing', 'Follow Landing Page', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('crawl_admin', 'Crawl Admin Panel', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('follow_admin', 'Follow Admin Panel', 'required', array(
            'required' => '%s Harus dipilih',
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'user' => $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array(),
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'check' => $this->db->get('wb_seo')->row_array(),
                'title' => "SEO Management"
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/seo', $data);
            $this->load->view('template/footer');
        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $meta = $this->input->post('meta');
            $cl = $this->input->post('crawl_landing');
            $fl = $this->input->post('follow_landing');
            $ca = $this->input->post('crawl_admin');
            $fa = $this->input->post('follow_admin');

            $data = [
                'title' => $title,
                'description' => $description,
                'meta' => $meta,
                'crawl_landing' => $cl,
                'follow_landing' => $fl,
                'crawl_admin' => $ca,
                'follow_admin' => $fa,
                'created_at' => date('Y-m-d', time())
            ];

            $check = $this->db->get('wb_seo')->row_array();

            if (!$check) {
                $this->db->insert('wb_seo', $data);
            } else {
                $this->db->where('title', $title);
                $this->db->update('wb_seo', $data);
            }

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! SEO Website Telah di Simpan.</span></div>');
            redirect('cp-admin/seo-management');
        }
    }

    public function profile()
    {
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $this->form_validation->set_rules('name', 'Nama', 'required', array(
            'required' => '%s Harus diisi.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => '%s Harus diisi.',
            'valid_email' => 'Penulisan %s yang anda masukan salah'
        ));

        if ($password != NULL || $confirm != NULL) {
            $this->form_validation->set_rules('password', 'kata Sandi', 'required|min_length[6]|matches[confirm]', array(
                'required' => '%s Harus diisi.',
                'min_length' => '%s Minimal 6 karakter.',
                'matches' => '%s Yang anda masukan tidak sama.'
            ));
            $this->form_validation->set_rules('confirm', 'kata Sandi', 'required|min_length[6]|matches[password]', array(
                'required' => '%s Harus diisi.',
                'min_length' => '%s Minimal 6 karakter.'
            ));
        }

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'user' => $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array(),
                'check' => $this->db->get('wb_seo')->row_array(),
                'title' => 'Profile Pengguna'
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->session->userdata('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $oldpassword = $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array();

            if ($password != NULL || $confirm != NULL) {
                $pwd = md5($password);
            } else {
                $pwd = $oldpassword['password'];
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pwd
            ];

            $this->db->where('id', $id);
            $this->db->update('wb_admin', $data);

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Profil anda berhasil diupdate.</span></div>');
            redirect('cp-admin/profile');
        }
    }

    public function gallery()
    {
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'user' => $this->db->get_where('wb_admin', array('id' => $this->session->userdata('id')))->row_array(),
            'check' => $this->db->get('wb_seo')->row_array(),
            'title' => 'Album Kegiatan'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/album', $data);
        $this->load->view('template/footer');
    }
}
