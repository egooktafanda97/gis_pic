<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tempat_ibadah extends My_Controller
{
    private $page = "Tempat_ibadah/";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');
        // library pagination
        $config['base_url'] = base_url("Tempat_ibadah/index/");
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
            "title" => "Tempat Ibadah",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_tempat_ibadah", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("tempat_ibadah")->result_array();
        return $result;
    }
    public function dataTempatIbadahById($id)
    {
        $this->db->where("tempat_ibadah.id_tempat_ibadah", $id);
        $result = $this->db->get_where("tempat_ibadah")->row_array();

        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("tempat_ibadah")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('jenis_tempat_ibadah', 'jenis_tempat_ibadah', 'required');
        $this->form_validation->set_rules('nama_tempat_ibadah', 'nama_tempat_ibadah', 'required');
        $this->form_validation->set_rules('luas_tempat_ibadah', 'luas_tempat_ibadah', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nama_penanggung_jawab', 'nama_penanggung_jawab', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('tempat_ibadah');
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
                    "jenis_tempat_ibadah" => $post['jenis_tempat_ibadah'],
                    "nama_tempat_ibadah" => $post['nama_tempat_ibadah'],
                    "luas_tempat_ibadah" => $post['luas_tempat_ibadah'],
                    "perizinan" => $post['perizinan'],
                    "alamat" => $post['alamat'],
                    "nama_penanggung_jawab" => $post['nama_penanggung_jawab'],
                    "no_telp" => $post['no_telp'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "alamat_website" => $post['alamat_website'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('tempat_ibadah', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('tempat_ibadah');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('tempat_ibadah');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('tempat_ibadah');
            }
        }
    }

    public function deleted($id_tempat_ibadah)
    {
        $this->db->where('id_tempat_ibadah', $id_tempat_ibadah);
        $this->db->delete('tempat_ibadah');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('tempat_ibadah');
    }

    public function getById($id_tempat_ibadah)
    {

        $getData = $this->db->get_where('tempat_ibadah', ['id_tempat_ibadah' => $id_tempat_ibadah])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_tempat_ibadah', 'jenis_tempat_ibadah', 'required');
        $this->form_validation->set_rules('nama_tempat_ibadah', 'nama_tempat_ibadah', 'required');
        $this->form_validation->set_rules('luas_tempat_ibadah', 'luas_tempat_ibadah', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nama_penanggung_jawab', 'nama_penanggung_jawab', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('jenis_tempat_ibadah', 'jenis_tempat_ibadah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('tempat_ibadah');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "jenis_tempat_ibadah" => $post['jenis_tempat_ibadah'],
                    "nama_tempat_ibadah" => $post['nama_tempat_ibadah'],
                    "luas_tempat_ibadah" => $post['luas_tempat_ibadah'],
                    "perizinan" => $post['perizinan'],
                    "alamat" => $post['alamat'],
                    "nama_penanggung_jawab" => $post['nama_penanggung_jawab'],
                    "no_telp" => $post['no_telp'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "alamat_website" => $post['alamat_website'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_tempat_ibadah', $id);
                $save = $this->db->update('tempat_ibadah', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('tempat_ibadah');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('tempat_ibadah');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('tempat_ibadah');
            }
        }
    }

    public function detail($id_tempat_ibadah)
    {

        $dataId =  $this->db->get_where('tempat_ibadah', ['id_tempat_ibadah' => $id_tempat_ibadah])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'tempat_ibadah', "config_key" => "icon"])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataTempatIbadahById($id_tempat_ibadah),
            "setting" => $getSetting
        );



        $this->load->view('Router/route', $data);
    }
}
