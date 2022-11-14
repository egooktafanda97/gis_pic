<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiBank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bank_model');
        $this->load->model('Jenisbank_model');
    }
    public function index()
    {
    }
    public function loadDataBank()
    {
        $get =  Bank_model::all();
        echo json_encode($get);
    }
}
