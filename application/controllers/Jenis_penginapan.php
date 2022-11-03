<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jenis_penginapan extends My_controller
{
    private $page = "Penginapan/jenis_penginapan/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("jenis_penginapan/index/");
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
            "title" => "Jenis Penginapan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_jenis_penginapan", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("jenis_penginapan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("jenis_penginapan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_jenis_penginapan', 'nama_jenis_penginapan', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('jenis_penginapan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenis_penginapan" => $post['nama_jenis_penginapan'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('jenis_penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('jenis_penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('jenis_penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('jenis_penginapan');
            }
        }
    }

    public function deleted($id_jenis_penginapan)
    {
        $this->db->where('id_jenis_penginapan', $id_jenis_penginapan);
        $this->db->delete('jenis_penginapan');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('jenis_penginapan');
    }

    public function getById($id_jenis_penginapan)
    {

        $getData = $this->db->get_where('jenis_penginapan', ['id_jenis_penginapan' => $id_jenis_penginapan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_jenis_penginapan', 'nama_jenis_penginapan	', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('jenis_penginapan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenis_penginapan	" => $post['nama_jenis_penginapan'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_jenis_penginapan', $id);
                $save = $this->db->update('jenis_penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('jenis_penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('jenis_penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('jenis_penginapan');
            }
        }
    }

    public function detail($id_jenis_penginapan)
    {

        $dataId = [
            $this->db->get_where('jenis_penginapan', ['id_jenis_penginapan' => $id_jenis_penginapan])->row_array()


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
