<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    private $page = "Pengaturan/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            "title" => "Pendidikan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "style" => $this->page . "style",
        ];
        $this->load->view('Router/route', $data);
    }
}
