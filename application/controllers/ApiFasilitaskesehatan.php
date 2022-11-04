<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiFasilitaskesehatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fasilitaskesehatan_model');
        $this->load->model('Jenisfasilitaskesehatan_model');
    }
    public function index()
    {
    }
    public function loadDataFasilitasKesehatan()
    {
        $get =  Penginapan_model::all();
        echo json_encode($get);
    }
}
