<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Apipenginapan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penginapan_model');
        $this->load->model('Jenispenginapan_model');
        $this->load->model('Kelaspenginapan_model');
    }
    public function index()
    {
    }
    public function loadDataPenginapan()
    {
        $get =  Penginapan_model::all();
        echo json_encode($get);
    }
}
