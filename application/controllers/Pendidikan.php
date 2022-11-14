<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends My_Controller
{
    private $page = "Pendidikan/";
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
        $config['base_url'] = base_url("Pendidikan/index/");
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
        $jenjang_data = $this->getJenjangData();
        $data = [
            "title" => "Pendidikan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenjang" => $jenjang_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_pendidikan", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenjang_pendidikan", "jenjang_pendidikan.jenjang_pendidikan_id  = pendidikan.jenjang_pendidikan_id ");
        $result = $this->db->get_where("pendidikan")->result_array();
        return $result;
    }
    public function dataPendidikan()
    {
        $this->db->order_by("id_pendidikan", "DESC");
        $this->db->join("jenjang_pendidikan", "jenjang_pendidikan.jenjang_pendidikan_id  = pendidikan.jenjang_pendidikan_id ");
        $result = $this->db->get_where("pendidikan")->result_array();
        return $result;
    }

    public function dataPendidikanById($id)
    {
        $this->db->join("jenjang_pendidikan", "jenjang_pendidikan.jenjang_pendidikan_id = pendidikan.jenjang_pendidikan_id");
        $this->db->where("pendidikan.id_pendidikan", $id);
        $result = $this->db->get_where("pendidikan")->row_array();

        return $result;
    }

    public function getJenjangData()
    {
        $this->db->order_by("jenjang_pendidikan_id", "DESC");
        $result = $this->db->get_where("jenjang_pendidikan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("pendidikan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('jenis_pendidikan', ' jenis_pendidikan', 'required');
        $this->form_validation->set_rules('jenjang_pendidikan_id', ' jenjang_pendidikan_id', 'required');
        $this->form_validation->set_rules('nama_pendidikan', 'nama_pendidikan', 'required');
        $this->form_validation->set_rules('perizinan_pendidikan', ' perizinan_pendidikan', 'required');
        $this->form_validation->set_rules('jumlah_tenaga_pendidik', ' jumlah_tenaga_pendidik', 'required');
        $this->form_validation->set_rules('nama_pimpinan', ' nama_pimpinan', 'required');
        $this->form_validation->set_rules('alamat_pendidikan', ' alamat_pendidikan', 'required');
        $this->form_validation->set_rules('website_pendidikan', ' website_pendidikan', 'required');
        $this->form_validation->set_rules('latitude', ' latitude', 'required');
        $this->form_validation->set_rules('longitude', ' longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ni ditambahkan');
            redirect('Pendidikan');
        } else {
            try {
                $post = $this->input->post();
                // ////// fungsi upload gambar ///////
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded == false) {
                    $uploaded = "default.jpg";
                }

                $icon_uploaded = up("icon_map", "assets/img/icon_map/");
                if ($icon_uploaded == false) {
                    $icon_uploaded = "default.jpg";
                }
                // ==========================================
                $data  = [
                    "user_id" => auth()['user']['id'],
                    "jenis_pendidikan" => $post['jenis_pendidikan'],
                    "jenjang_pendidikan_id" => $post['jenjang_pendidikan_id'],
                    "nama_pendidikan" => $post['nama_pendidikan'],
                    "perizinan_pendidikan" => $post['perizinan_pendidikan'],
                    "jumlah_tenaga_pendidik" => $post['jumlah_tenaga_pendidik'],
                    "nama_pimpinan" => $post['nama_pimpinan'],
                    "alamat_pendidikan" => $post['alamat_pendidikan'],
                    "website_pendidikan" => $post['website_pendidikan'],
                    "provinsi_id" => $post['provinsi_id'] ?? "",
                    "kabupaten_id" => $post['kabupaten_id'] ?? "",
                    "kecamatan_id" => $post['kecamatan_id'] ?? "",
                    "kelurahan_id" => $post['kelurahan_id'] ?? "",
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('pendidikan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('pendidikan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('pendidikan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('pendidikan');
            }
        }
    }

    public function deleted($id_pendidikan)
    {
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->delete('pendidikan');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('pendidikan');
    }

    public function getById($id_pendidikan)
    {

        $getData = $this->db->get_where('pendidikan', ['id_pendidikan' => $id_pendidikan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_pendidikan', ' jenis_pendidikan', 'required');
        $this->form_validation->set_rules('jenjang_pendidikan_id', ' jenjang_pendidikan_id', 'required');
        $this->form_validation->set_rules('nama_pendidikan', 'nama_pendidikan', 'required');
        $this->form_validation->set_rules('perizinan_pendidikan', ' perizinan_pendidikan', 'required');
        $this->form_validation->set_rules('jumlah_tenaga_pendidik', ' jumlah_tenaga_pendidik', 'required');
        $this->form_validation->set_rules('nama_pimpinan', ' nama_pimpinan', 'required');
        $this->form_validation->set_rules('alamat_pendidikan', ' alamat_pendidikan', 'required');
        $this->form_validation->set_rules('website_pendidikan', ' website_pendidikan', 'required');
        $this->form_validation->set_rules('latitude', ' latitude', 'required');
        $this->form_validation->set_rules('longitude', ' longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak valid, gagal diubah');
            redirect('pendidikan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "user_id" => auth()['user']['id'],
                    "jenis_pendidikan" => $post['jenis_pendidikan'],
                    "jenjang_pendidikan_id" => $post['jenjang_pendidikan_id'],
                    "nama_pendidikan" => $post['nama_pendidikan'],
                    "perizinan_pendidikan" => $post['perizinan_pendidikan'],
                    "jumlah_tenaga_pendidik" => $post['jumlah_tenaga_pendidik'],
                    "nama_pimpinan" => $post['nama_pimpinan'],
                    "alamat_pendidikan" => $post['alamat_pendidikan'],
                    "website_pendidikan" => $post['website_pendidikan'],
                    "provinsi_id" => $post['provinsi_id'] ?? "",
                    "kabupaten_id" => $post['kabupaten_id'] ?? "",
                    "kecamatan_id" => $post['kecamatan_id'] ?? "",
                    "kelurahan_id" => $post['kelurahan_id'] ?? "",
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_pendidikan', $id);
                $save = $this->db->update('pendidikan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('pendidikan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('pendidikan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('pendidikan');
            }
        }
    }

    public function detail($id_pendidikan)
    {

        $dataId =  $this->db->get_where('pendidikan', ['id_pendidikan' => $id_pendidikan])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'pendidikan', "config_key" => "icon"])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataPendidikanById($id_pendidikan),
            "setting" => $getSetting
        );
        $this->load->view('Router/route', $data);
    }
    public function getAllDataPendidikan()
    {
        echo json_encode($this->dataPendidikan());
    }
}
