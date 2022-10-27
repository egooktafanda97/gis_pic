<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Map_config extends CI_Controller
{
    private $page = "Map_config/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = 'http://localhost/sig_pku/map_config/index';
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
            "title" => "Map setting",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_config", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where(" map_config")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where(" map_config")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('config_key', 'config_key', 'required');
        $this->form_validation->set_rules('config_value', 'config_value', 'required');
        $this->form_validation->set_rules('table_config', 'table_config', 'required');
        $this->form_validation->set_rules('forenkey_id', 'forenkey_id', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('map_config');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "config_key" => $post['config_key'],
                    "config_value" => $post['config_value'],
                    "table_config" => $post['table_config'],
                    "forenkey_id" => $post['forenkey_id'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert(' map_config', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('map_config');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('map_config');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('map_config');
            }
        }
    }

    public function deleted($id_config)
    {
        $this->db->where('id_config', $id_config);
        $this->db->delete('map_config');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('map_config');
    }

    public function getById($id_config)
    {

        $getData = $this->db->get_where('map_config', ['id_config' => $id_config])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('config_key', 'config_key', 'required');
        $this->form_validation->set_rules('config_value', 'config_value', 'required');
        $this->form_validation->set_rules('table_config', 'table_config', 'required');
        $this->form_validation->set_rules('forenkey_id', 'forenkey_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('map_config');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "config_key" => $post['config_key'],
                    "config_value" => $post['config_value'],
                    "table_config" => $post['table_config'],
                    "forenkey_id" => $post['forenkey_id'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('id_config', $id);
                $save = $this->db->update('map_config', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('map_config');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('map_config');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('map_config');
            }
        }
    }

    public function detail($id_config)
    {

        $dataId = [
            $this->db->get_where('map_config', ['id_config' => $id_config])->row_array()
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
