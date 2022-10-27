<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sektor_industri extends CI_Controller
{
    private $page = "Industri/Sektor_industri/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = 'http://localhost/sig_pku/sektor_industri/index';
        $config['total_rows'] = $this->countAllData();
        $config['per_page'] = 1;

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
            "title" => "Sektor industri",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_sektor_industri", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("sektor_industri")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("sektor_industri")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_sektor_utama_industri', 'nama_sektor_utama_industri', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('sektor_industri');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_sektor_utama_industri" => $post['nama_sektor_utama_industri'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('sektor_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('sektor_industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('sektor_industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('sektor_industri');
            }
        }
    }

    public function deleted($id_sektor_industri)
    {
        $this->db->where('id_sektor_industri', $id_sektor_industri);
        $this->db->delete('sektor_industri');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('sektor_industri');
    }

    public function getById($id_sektor_industri)
    {

        $getData = $this->db->get_where('sektor_industri', ['id_sektor_industri' => $id_sektor_industri])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_sektor_utama_industri', 'nama_sektor_utama_industri	', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('sektor_industri');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_sektor_utama_industri	" => $post['nama_sektor_utama_industri'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_sektor_industri', $id);
                $save = $this->db->update('sektor_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('sektor_industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('sektor_industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('sektor_industri');
            }
        }
    }

    public function detail($id_sektor_industri)
    {

        $dataId = [
            $this->db->get_where('sektor_industri', ['id_sektor_industri' => $id_sektor_industri])->row_array()


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
