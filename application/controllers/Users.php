<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends My_Controller
{
    private $page = "User/";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        $data = [
            "title" => "Home",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
        ];
        $this->load->view('Router/route', $data);
    }
}
