<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => "",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    public function news()
    {
        $data = array(
            'title' => "Berita",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/news');
        $this->load->view('home/footer');
    }

    public function news_page($id)
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/news_page');
        $this->load->view('home/footer');
    }

    public function group()
    {
        $data = array(
            'title' => "JBI Group",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/group');
        $this->load->view('home/footer');
    }

    public function job()
    {
        $data = array(
            'title' => "Karir",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/job');
        $this->load->view('home/footer');
    }

    public function gallery()
    {
        $data = array(
            'title' => "Galeri",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/gallery');
        $this->load->view('home/footer');
    }

    public function gallery_detail($id)
    {
        $data = array(
            'title' => "Detail Album",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/gallery_detail');
        $this->load->view('home/footer');
    }

    public function achievement()
    {
        $data = array(
            'title' => "Piagam",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/achievement');
        $this->load->view('home/footer');
    }

    public function organization()
    {
        $data = array(
            'title' => "Organisasi",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/organization');
        $this->load->view('home/footer');
    }
}
