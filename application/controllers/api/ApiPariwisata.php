<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiPariwisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pariwisata_model');
        $this->load->model('Jenispariwisata_model');
    }
    public function index()
    {
    }
    public function loadDataFasilitasKesehatan()
    {
        $get =  Pariwisata_model::all();
        echo json_encode($get);
    }
}
