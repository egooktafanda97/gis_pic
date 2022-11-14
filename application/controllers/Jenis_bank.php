<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_bank extends CI_Controller
{
    private $page = "Bank/Jenis_bank/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("jenis_bank/index/");
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
            "title" => "jenis Bank",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_jenis_bank", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("jenis_bank")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("jenis_bank")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_jenis_bank', 'nama_jenis_bank', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('jenis_bank');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenis_bank" => $post['nama_jenis_bank'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('jenis_bank', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('jenis_bank');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('jenis_bank');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('jenis_bank');
            }
        }
    }

    public function deleted($id_jenis_bank)
    {
        $this->db->where('id_jenis_bank', $id_jenis_bank);
        $this->db->delete('jenis_bank');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('jenis_bank');
    }

    public function getById($id_jenis_bank)
    {

        $getData = $this->db->get_where('jenis_bank', ['id_jenis_bank' => $id_jenis_bank])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_jenis_bank', 'nama_jenis_bank	', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('jenis_bank');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenis_bank" => $post['nama_jenis_bank'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_jenis_bank', $id);
                $save = $this->db->update('jenis_bank', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('jenis_bank');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('jenis_bank');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('jenis_bank');
            }
        }
    }

    public function detail($id_jenis_bank)
    {

        $dataId = [
            $this->db->get_where('jenis_bank', ['id_jenis_bank' => $id_jenis_bank])->row_array()


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
