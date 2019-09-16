<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    public function news()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/news');
        $this->load->view('home/footer');
    }

    public function group()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/group');
        $this->load->view('home/footer');
    }

    public function job()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('home/jumbotron');
        $this->load->view('home/job');
        $this->load->view('home/footer');
    }
}
