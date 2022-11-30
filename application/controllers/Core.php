<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Core extends CI_Controller
{
    private $page = "Home/";
    public function __construct()
    {
        parent::__construct();
    }
    public function index($session = null)
    {

        if (empty($session))
            redirect("login");
        $setSession = json_decode(urldecode($session), true);
        if (empty($setSession["session"]["user"]) || empty($setSession["session"]["role"]))
            redirect("login");
        $data = [
            'user' => $setSession["session"]["user"],
            'role' => $setSession["session"]["role"]
        ];
        $this->session->set_userdata('login', $data);
        $data = [
            "title" => "Home",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "style" => $this->page . "style",
        ];
        $this->load->view('Router/route', $data);
    }
}
