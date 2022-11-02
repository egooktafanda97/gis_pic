<?php
class My_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->uri->segment(1) != "Login" && $this->uri->segment(1) != "Core" && empty($this->session->userdata("login")))
            redirect("Login");
    }
}
