<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserRole extends CI_Controller
{
    private $page = "UserRole/";

    public function index()
    {
        $data = [
            "title" => "User",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
        ];
        $this->load->view('Router/route', $data);
    }
}
