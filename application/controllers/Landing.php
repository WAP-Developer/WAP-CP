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
        $this->load->library('pagination');

        $config['base_url'] = base_url('news/');
        $config['total_rows'] = $this->db->get('wb_news')->num_rows();
        $config['per_page'] = 10;
        $from = $this->uri->segment(2);

        $this->pagination->initialize($config);

        $data = array(
            'title' => "Berita",
            'getAllNews' => $this->user->getAllNews($config['per_page'], $from),
            'getSevenNews' => $this->user->getSevenNews(),
            'getFourNews' => $this->user->getFourNews(),
            'getOneNews' => $this->user->getOneNews(),
            'getTwoNews' => $this->user->getTwoNews(),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/news', $data);
        $this->load->view('home/footer');
    }

    public function detail_news()
    {
        $slugNews = $this->uri->segment(3);
        $Title = $this->user->getDetailNews($slugNews);
        $data = array(
            'title' => $Title['title'],
            'getRecentNews' => $this->user->getRecentNews(),
            'getDetailNews' => $this->user->getDetailNews($slugNews),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/detail_news', $data);
        $this->load->view('home/footer');
    }

    public function allNews()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('news/all');
        $config['total_rows'] = $this->db->get('wb_news')->num_rows();
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data = array(
            'title' => "Seluruh Berita",
            'getAllNews' => $this->user->getAllNews($config['per_page'], $from),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/allnews');
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

        $dep = $this->input->get('dep');

        $data = array(
            'title' => "Karir",
            'jobCount' => $this->db->get('wb_job')->num_rows(),
            'getDepartement' => $this->user->getDepartement(),
            'check' => $this->db->get('wb_seo')->row_array()
        );

        if ($dep) {
            $count = $this->db->get_where('wb_job', array('departement_id' => $dep))->num_rows();
        } else {
            $count = $this->db->get('wb_job')->num_rows();
        }

        $config['base_url'] = base_url('job');
        $config['total_rows'] = $count;
        $config['per_page'] = 10;
        if ($this->uri->segment(2)) {
            $from = $this->uri->segment(2);
        } else {
            $from = 0;
        }

        if ($dep) {
            $data['getJob'] = $this->user->getJobDep($config['per_page'], $from, $dep);
        } else {
            $data['getJob'] = $this->user->getJob($config['per_page'], $from);
        }

        $this->load->library('pagination');

        $this->pagination->initialize($config);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/job', $data);
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

    public function applied_job($id)
    {
        $data = array(
            'title' => "Pengajuan Lamaran",
            'check' => $this->db->get('wb_seo')->row_array()
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar');
        $this->load->view('home/job_applied', $data);
        $this->load->view('home/footer');
    }
}
