<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info_grafis extends CI_Controller
{
    private $page = "InfoGrafis/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function getKecamatan()
    {
        $data = $this->db->get("kecamatan")->result_array();
        return $data;
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("InfoGrafis/index/");
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
            "title" => "Info Grafis Kecamatan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "style" => $this->page . "style",
            "kecamatan" => $this->getKecamatan(),
            "result" =>  $all_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("info_grafis.id", "DESC");
        $this->db->select("*, info_grafis.id as id");
        $this->db->join("kecamatan", "kecamatan.kode_kecamatan = info_grafis.kode_kecamatan", 'left');
        $result = $this->db->get_where("info_grafis")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("info_grafis")->num_rows();
    }

    public function created()
    {
        try {
            $post = $this->input->post();
            $main = [
                "kode_kecamatan" => $post['kode_kecamatan'],
                "tahun" => $post["tahun"],
                "tanggal" => $post["tanggal"],
                "faktor" => $post['faktor'],
                "sub_faktor" => $post['sub_faktor'],
                "nama" => $post['nama'],
                "keterangan" => $post['keterangan'],
            ];
            $save = $this->db->insert('info_grafis', $main);
            if ($save) {
                $this->session->set_flashdata('success', 'berhasil ditambahkan');
                redirect('Info_grafis');
            } else {
                $this->session->set_flashdata('error', 'gagal di inputkan');
                redirect('Info_grafis');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('Info_grafis');
        }
    }

    public function deleted($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('info_grafis');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('info_grafis');
    }

    public function getById($id)
    {

        $getData = $this->db->get_where('info_grafis', ['id' => $id])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {
        try {
            $post = $this->input->post();
            $main = [
                "kode_kecamatan" => $post['kode_kecamatan'],
                "tahun" => $post["tahun"],
                "tanggal" => $post["tanggal"],
                "faktor" => $post['faktor'],
                "sub_faktor" => $post['sub_faktor'],
                "nama" => $post['nama'],
                "keterangan" => $post['keterangan'],
            ];
            $this->db->where('id', $id);
            $save = $this->db->update('info_grafis', $main);
            if ($save) {
                $this->session->set_flashdata('success', 'berhasil di ubah');
                redirect('Info_grafis');
            } else {
                $this->session->set_flashdata('error', 'gagal di ubah');
                redirect('Info_grafis');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error', 'kesalahan');
            redirect('Info_grafis');
        }
    }
}
