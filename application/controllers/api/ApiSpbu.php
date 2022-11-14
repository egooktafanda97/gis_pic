<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiSpbu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Spbu_model');
        $this->load->model('Jenisspbu_model');
    }
    public function index()
    {
    }
    public function loadDataSpbu()
    {
        $get =  Spbu_model::all();
        echo json_encode($get);
    }
}
