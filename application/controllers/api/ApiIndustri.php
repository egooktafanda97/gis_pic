<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiIndustri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Industri_model');
        $this->load->model('Sektor_model');
        $this->load->model('SubSektor_model');
        $this->load->model('PicIndustri_model');
    }
    public function index()
    {
    }
    public function loadDataIndustri()
    {
        $get =  Industri_model::all();
        echo json_encode($get);
    }
}
