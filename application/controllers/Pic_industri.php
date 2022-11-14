<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pic_industri extends My_Controller
{
    private $page = "Industri/Pic_industri/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("Pic_industri/index/");
        $config['total_rows'] = $this->countAllData();
        $config['per_page'] = 10;


        // stylingPage
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $all_data = $this->getAllData($config['per_page'], $data['start']);
        $data = [
            "title" => "Pic industri",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_pic_industri", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("pic_industri")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("pic_industri")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('pic_category_name', 'pic_category_name', 'required');
        $this->form_validation->set_rules('pic_industry_type_name', 'pic_industry_type_name', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('pic_industri');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "pic_category_name" => $post['pic_category_name'],
                    "pic_industry_type_name" => $post['pic_industry_type_name'],

                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('pic_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('Pic_industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('pic_industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('Pic_industri');
            }
        }
    }

    public function deleted($id_pic_industri)
    {
        $this->db->where('id_pic_industri', $id_pic_industri);
        $this->db->delete('pic_industri');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('pic_industri');
    }

    public function getById($id_pic_industri)
    {

        $getData = $this->db->get_where('pic_industri', ['id_pic_industri' => $id_pic_industri])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('pic_category_name', 'pic_category_name', 'required');
        $this->form_validation->set_rules('pic_industry_type_name', 'pic_industry_type_name ', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('pic_industri');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "pic_category_name" => $post['pic_category_name'],
                    "pic_industry_type_name" => $post['pic_industry_type_name'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_pic_industri', $id);
                $save = $this->db->update('pic_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('Pic_industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('Pic_industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('Pic_industri');
            }
        }
    }

    public function detail($id_pic_industri)
    {

        $dataId = [
            $this->db->get_where('pic_industri', ['id_pic_industri' => $id_pic_industri])->row_array()


        ];
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail",
            'script' => $this->page . "script",
            'result' => $dataId
        );
        $this->load->view('Router/route', $data);
    }
}
