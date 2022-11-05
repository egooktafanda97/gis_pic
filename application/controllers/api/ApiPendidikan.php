<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiPendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendidikan_model');
        $this->load->model('Jenjangpend_model');
    }
    public function index()
    {
    }
    public function loadDataPendidikan()
    {
        $get =  Pendidikan_model::all();
        echo json_encode($get);
    }
}
