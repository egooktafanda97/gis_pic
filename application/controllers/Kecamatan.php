<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    private $page = "Kecamatan/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['total_rows'] = $this->countAllData();
        $config['per_page'] = 10;
        $config['base_url'] = base_url("Kecamatan/index/");
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
            "title" => "Kecamatan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("kode_kecamatan ", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("kecamatan")->result_array();
        return $result;
    }
    public function dataKecamatan()
    {
        $this->db->order_by("kode_kecamatan ", "DESC");
        $result = $this->db->get_where("kecamatan")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "kecamatan"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "kecamatan"
        ];
    }

    public function dataKecamatanById($id)
    {
        $this->db->where("kecamatan.id_kecamatan", $id);
        $result = $this->db->get_where("kecamatan")->row_array();

        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("kecamatan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('nama_kecamatan', ' nama_kecamatan', 'required');
        $this->form_validation->set_rules('luas_wilayah', ' luas_wilayah', 'required');
        $this->form_validation->set_rules('batas_wilayah', ' batas_wilayah', 'required');
        $this->form_validation->set_rules('letak', ' letak', 'required');
        $this->form_validation->set_rules('geologi', ' geologi', 'required');
        $this->form_validation->set_rules('iklim', ' iklim', 'required');
        $this->form_validation->set_rules('jumlah_penduduk', ' jumlah_penduduk', 'required');
        $this->form_validation->set_rules('laju_pertumbuhan', ' laju_pertumbuhan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('Kecamatan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_kecamatan" => $post['nama_kecamatan'],
                    "luas_wilayah" => $post['luas_wilayah'],
                    "batas_wilayah" => $post['batas_wilayah'],
                    "letak" => $post['letak'],
                    "geologi" => $post['geologi'],
                    "iklim" => $post['iklim'],
                    "jumlah_penduduk" => $post['jumlah_penduduk'],
                    "laju_pertumbuhan" => $post['laju_pertumbuhan'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('kecamatan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('kecamatan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('kecamatan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('kecamatan');
            }
        }
    }

    public function deleted($kode_kecamatan)
    {
        $this->db->where('kode_kecamatan', $kode_kecamatan);
        $this->db->delete('kecamatan');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('kecamatan');
    }

    public function getById($kode_kecamatan)
    {

        $getData = $this->db->get_where('kecamatan', ['kode_kecamatan' => $kode_kecamatan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('nama_kecamatan', ' nama_kecamatan', 'required');
        $this->form_validation->set_rules('luas_wilayah', ' luas_wilayah', 'required');
        $this->form_validation->set_rules('batas_wilayah', ' batas_wilayah', 'required');
        $this->form_validation->set_rules('letak', ' letak', 'required');
        $this->form_validation->set_rules('geologi', ' geologi', 'required');
        $this->form_validation->set_rules('iklim', ' iklim', 'required');
        $this->form_validation->set_rules('jumlah_penduduk', ' jumlah_penduduk', 'required');
        $this->form_validation->set_rules('laju_pertumbuhan', ' laju_pertumbuhan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('kecamatan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "nama_kecamatan" => $post['nama_kecamatan'],
                    "luas_wilayah" => $post['luas_wilayah'],
                    "batas_wilayah" => $post['batas_wilayah'],
                    "letak" => $post['letak'],
                    "geologi" => $post['geologi'],
                    "iklim" => $post['iklim'],
                    "jumlah_penduduk" => $post['jumlah_penduduk'],
                    "laju_pertumbuhan" => $post['laju_pertumbuhan'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->db->where('kode_kecamatan', $id);
                $save = $this->db->update('kecamatan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('kecamatan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('kecamatan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('kecamatan');
            }
        }
    }
    public function detail($kode_kecamatan)
    {

        $dataId = [
            $this->db->get_where('kecamatan', ['kode_kecamatan' => $kode_kecamatan])->row_array()
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
