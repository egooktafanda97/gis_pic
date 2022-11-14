<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenjang_pendidikan extends My_Controller
{
    private $page = "pendidikan/Jenjang_pendidikan/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = 'http://localhost/sig_pku/Jenjang_pendidikan/index';
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
            "title" => "Jenjang Pendidikan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("jenjang_pendidikan_id", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("jenjang_pendidikan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("jenjang_pendidikan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_jenjang', 'nama_jenjang', 'required');
        $this->form_validation->set_rules('ketrangan', 'ketrangan', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('jenjang_pendidikan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenjang" => $post['nama_jenjang'],
                    "ketrangan" => $post['ketrangan'],

                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('jenjang_pendidikan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('jenjang_pendidikan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('jenjang_pendidikan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('jenjang_pendidikan');
            }
        }
    }

    public function deleted($jenjang_pendidikan_id)
    {
        $this->db->where('jenjang_pendidikan', $jenjang_pendidikan_id);
        $this->db->delete('jenjang_pendidikan');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('jenjang_pendidikan');
    }

    public function getById($jenjang_pendidikan_id)
    {

        $getData = $this->db->get_where('jenjang_pendidikan', ['jenjang_pendidikan_id' => $jenjang_pendidikan_id])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_jenjang', 'nama_jenjang', 'required');
        $this->form_validation->set_rules('ketrangan', 'ketrangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('jenjang_pendidikan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_jenjang" => $post['nama_jenjang'],
                    "ketrangan" => $post['ketrangan'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('jenjang_pendidikan_id', $id);
                $save = $this->db->update('jenjang_pendidikan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('jenjang_pendidikan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('jenjang_pendidikan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('jenjang_pendidikan');
            }
        }
    }
}
