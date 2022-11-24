<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserRole extends CI_Controller
{
    private $page = "UserRole/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            "title" => "User",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "style" => $this->page . "style",
            "users" => $this->db->get_where("users")->result_array()
        ];
        $this->load->view('Router/route', $data);
    }
    public function created()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('penginapan');
        } else {
            try {
                $post = $this->input->post();

                $data = [
                    "nama" => $post['nama'],
                    "account_type" => "admin",
                    "username" => $post['username'],
                    "password" => password_hash($post['password'], PASSWORD_DEFAULT),
                    "role" => "ADMIN"
                ];
                $save = $this->db->insert('users', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('UserRole');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('UserRole');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('UserRole');
            }
        }
    }
}
