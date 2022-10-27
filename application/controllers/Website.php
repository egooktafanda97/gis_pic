<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('web/index');
    }
    public function home()
    {
        $this->load->view('web/index');
    }
    public function gis()
    {
        $this->load->view('web/index');
    }
}
