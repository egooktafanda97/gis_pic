<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kelas_penginapan extends CI_Controller
{
    private $page = "Penginapan/kelas_penginapan/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("kelas_penginapan/index/");
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
            "title" => "Kelas Penginapan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_kelas_penginapan", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("kelas_penginapan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("kelas_penginapan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_kelas_penginapan', 'nama_kelas_penginapan', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('kelas_penginapan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_kelas_penginapan" => $post['nama_kelas_penginapan'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('kelas_penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('kelas_penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('kelas_penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('kelas_penginapan');
            }
        }
    }

    public function deleted($id_kelas_penginapan)
    {
        $this->db->where('id_kelas_penginapan', $id_kelas_penginapan);
        $this->db->delete('kelas_penginapan');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('kelas_penginapan');
    }

    public function getById($id_kelas_penginapan)
    {

        $getData = $this->db->get_where('kelas_penginapan', ['id_kelas_penginapan' => $id_kelas_penginapan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_kelas_penginapan', 'nama_kelas_penginapan	', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('kelas_penginapan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_kelas_penginapan	" => $post['nama_kelas_penginapan'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_kelas_penginapan', $id);
                $save = $this->db->update('kelas_penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('kelas_penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('kelas_penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('kelas_penginapan');
            }
        }
    }

    public function detail($id_kelas_penginapan)
    {

        $dataId = [
            $this->db->get_where('kelas_penginapan', ['id_kelas_penginapan' => $id_kelas_penginapan])->row_array()


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
