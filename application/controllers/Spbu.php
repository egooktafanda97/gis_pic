<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Spbu extends CI_Controller
{
    private $page = "Spbu/";
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
        $config['base_url'] = base_url("Spbu/index/");
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
        $jenis_data = $this->getJenis();
        $data = [
            "title" => "Spbu",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenis" => $jenis_data,
        ];
        $this->load->view('Router/route', $data);
    }
    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_spbu", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenis_spbu", "jenis_spbu.id_jenis_spbu = spbu.jenis_spbu_id", 'left');
        $result = $this->db->get_where("spbu")->result_array();
        return $result;
    }
    public function dataSpbu()
    {
        $this->db->order_by("id_spbu ", "DESC");
        $this->db->join("jenis_spbu", "jenis_spbu.id_jenis_spbu = spbu.jenis_spbu_id", 'left');
        $result = $this->db->get_where("spbu")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "spbu"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "spbu"
        ];
    }
    public function dataSpbuById($id)
    {
        $this->db->join("jenis_spbu", "jenis_spbu.id_jenis_spbu = spbu.jenis_spbu_id", 'left');
        $this->db->where("spbu.id_spbu", $id);
        $result = $this->db->get_where("spbu")->row_array();

        return $result;
    }
    public function getJenis()
    {
        $this->db->order_by("id_jenis_spbu", "DESC");
        $result = $this->db->get_where("jenis_spbu")->result_array();
        return $result;
    }
    public function countAllData()
    {
        return $this->db->get_where("spbu")->num_rows();
    }
    public function created()
    {
        $this->form_validation->set_rules('jenis_spbu_id', 'jenis_spbu_id', 'required');
        $this->form_validation->set_rules('nomor_spbu', 'nomor_spbu', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_jenis_bbm', 'jumlah_jenis_bbm', 'required');
        $this->form_validation->set_rules('jumlah_kendaraan', 'jumlah_kendaraan', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal berr ditambahkan');
            redirect('spbu');
        } else {
            try {
                $post = $this->input->post();
                // ////// fungsi upload gambar ///////
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded == false) {
                    $uploaded = "default.jpg";
                }
                // ==========================================
                $data  = [
                    "jenis_spbu_id" => $post['jenis_spbu_id'],
                    "nomor_spbu" => $post['nomor_spbu'],
                    "alamat" => $post['alamat'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_jenis_bbm" => $post['jumlah_jenis_bbm'],
                    "jumlah_kendaraan" => $post['jumlah_kendaraan'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('spbu', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('spbu');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('spbu');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('spbu');
            }
        }
    }
    public function deleted($id_spbu)
    {
        $this->db->where('id_spbu ', $id_spbu);
        $this->db->delete('spbu ');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('spbu');
    }
    public function getById($id_spbu)
    {

        $getData = $this->db->get_where('spbu', ['id_spbu ' => $id_spbu])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_spbu_id', 'jenis_spbu_id', 'required');
        $this->form_validation->set_rules('nomor_spbu', 'nomor_spbu', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_jenis_bbm', 'jumlah_jenis_bbm', 'required');
        $this->form_validation->set_rules('jumlah_kendaraan', 'jumlah_kendaraan', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('spbu');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "jenis_spbu_id" => $post['jenis_spbu_id'],
                    "nomor_spbu" => $post['nomor_spbu'],
                    "alamat" => $post['alamat'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_jenis_bbm" => $post['jumlah_jenis_bbm'],
                    "jumlah_kendaraan" => $post['jumlah_kendaraan'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_spbu', $id);
                $save = $this->db->update('spbu', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('spbu');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('spbu');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('spbu');
            }
        }
    }
    public function detail($id_spbu)
    {

        $dataId =  $this->db->get_where('spbu', ['id_spbu' => $id_spbu])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'spbu', "config_key" => "icon"])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataSpbuById($id_spbu),
            "setting" => $getSetting
        );
        $this->load->view('Router/route', $data);
    }
}
