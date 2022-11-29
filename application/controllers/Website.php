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
    public function kecamatan($kode_kecamatan)
    {
        $data = [
            "data_kecamatan" => $this->db->get_where("kecamatan", ["kode_kecamatan" => $kode_kecamatan])->row_array()
        ];
        $this->load->view('web/kecamatan', $data);
    }
    public function master_data()
    {
        $this->load->view('web/master_data');
    }
}
