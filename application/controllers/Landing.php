<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
    }

    public function index()
    {
        $data = array(
            'title' => "",
            'getMessages' => $this->user->getMessage(),
            'getHistories' => $this->user->getHistory(),
            'getVM' => $this->user->getVm(),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/index', $data);
        $this->load->view('home/footer');
    }

    public function news()
    {
        $data = array(
            'title' => "Berita",
            'getAllNews' => $this->user->getAllNews(),
            'getFourNews' => $this->user->getFourNews(),
            'getOneNews' => $this->user->getOneNews(),
            'getTwoNews' => $this->user->getTwoNews(),
            'getTwoCount' => $this->user->getTwoCount(),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/news', $data);
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
            'getGroups' => $this->user->getGroup(),
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/group', $data);
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
            'getAlbums' => $this->user->getAlbum(),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/gallery', $data);
        $this->load->view('home/footer');
    }

    public function gallery_detail()
    {
        $idGallery = $this->uri->segment(3);
        $data = array(
            'getDetailAlbums' => $this->user->getDetailAlbum($idGallery),
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
            'getAcvs' => $this->user->getAchievement(),
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
            'getOrgs' => $this->user->getOrgs(),
            'title' => "Organisasi",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/organization', $data);
        $this->load->view('home/footer');
    }

    public function detail_news()
    {
        $slugNews = $this->uri->segment(3);
        $Title = $this->user->getDetailNews($slugNews);
        $data = array(
            'title' => $Title['title'],
            'getDetailNews' => $this->user->getDetailNews($slugNews),
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/detail_news', $data);
        $this->load->view('home/footer');
    }
}
