<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tabeltest extends CI_Controller
{
    private $page = "TestCrud/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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

    public function created()
    {
        $this->form_validation->set_rules('nama', ' nama', 'required');
        $this->form_validation->set_rules('no_hp', ' no_hp', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('Tabeltest');
        } else {
            try {
                $post = $this->input->post();
                $data = [
                    "nama" => $post['nama'],
                    "no_hp" => $post['no_hp'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('tbl_test',$data);
                if($save){
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('Tabeltest');
                }else{
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('Tabeltest');
                }
       
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('Tabeltest');
            }
        }
    }
}
