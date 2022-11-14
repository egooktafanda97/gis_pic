<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sub_sektor extends CI_Controller
{
    private $page = "Industri/Sub_sektor/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("Sub_sektor/index/");
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
            "title" => "Sub sektor",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_subsektor_industri", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("sub_sektor_industri")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("sub_sektor_industri")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_subsektor_industri', 'nama_subsektor_industri', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('sub_sektor');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_subsektor_industri" => $post['nama_subsektor_industri'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('sub_sektor_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('sub_sektor');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('sub_sektor');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('sub_sektor');
            }
        }
    }

    public function deleted($id_subsektor_industri)
    {
        $this->db->where('id_subsektor_industri', $id_subsektor_industri);
        $this->db->delete('sub_sektor_industri');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('sub_sektor');
    }

    public function getById($id_subsektor_industri)
    {

        $getData = $this->db->get_where('sub_sektor_industri', ['id_subsektor_industri' => $id_subsektor_industri])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_subsektor_industri', 'nama_subsektor_industri', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('sub_sektor');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_subsektor_industri" => $post['nama_subsektor_industri'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_subsektor_industri', $id);
                $save = $this->db->update('sub_sektor_industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('sub_sektor');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('sub_sektor');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('sub_sektor');
            }
        }
    }

    public function detail($id_subsektor_industri)
    {

        $dataId = [
            $this->db->get_where('sub_sektor_industri', ['id_subsektor_industri' => $id_subsektor_industri])->row_array()


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
