<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Industri extends CI_Controller
{
    private $page = "Industri/";
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
        $config['base_url'] = base_url("Industri/index/");
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
        $pic_data = $this->getPicIndustri();
        $sub_data = $this->getSubIndustri();
        $sektor_data = $this->getSektorIndustri();
        $marker_data = $this->getMarker();
        $data = [
            "title" => "Industri",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "pic" => $pic_data,
            "sub" => $sub_data,
            "mark" => $marker_data,
            "sektor" => $sektor_data
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_industri", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("pic_industri", "pic_industri.id_pic_industri = industri.pic_industri_id", 'left');
        $this->db->join("sektor_industri", "sektor_industri.id_sektor_industri = industri.sektor_industri_id", 'left');
        $this->db->join("sub_sektor_industri", "sub_sektor_industri.id_subsektor_industri  = industri.sub_sektor_industri_id", 'left');
        $result = $this->db->get_where("industri")->result_array();
        return $result;
    }
    public function dataIndustri()
    {
        $this->db->order_by("id_industri", "DESC");
        $this->db->join("pic_industri", "pic_industri.id_pic_industri = industri.pic_industri_id", 'left');
        $this->db->join("sektor_industri", "sektor_industri.id_sektor_industri = industri.sektor_industri_id", 'left');
        $this->db->join("marker_set", "marker_set.id_marker = industri.marker_id", 'left');
        $this->db->join("sub_sektor_industri", "sub_sektor_industri.id_subsektor_industri  = industri.sub_sektor_industri_id", 'left');
        $result = $this->db->get_where("industri")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "Industri"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "Industri"
        ];
    }

    public function dataIndustriById($id)
    {
        $this->db->join("pic_industri", "pic_industri.id_pic_industri = industri.pic_industri_id", 'left');
        $this->db->join("sektor_industri", "sektor_industri.id_sektor_industri = industri.sektor_industri_id", 'left');
        $this->db->join("sub_sektor_industri", "sub_sektor_industri.id_subsektor_industri  = industri.sub_sektor_industri_id", 'left');
        $this->db->join("marker_set", "marker_set.id_marker = industri.marker_id", 'left');
        $this->db->where("industri.id_industri", $id);
        $result = $this->db->get_where("industri")->row_array();

        return $result;
    }

    public function getPicIndustri()
    {
        $this->db->order_by("id_pic_industri", "DESC");
        $result = $this->db->get_where("pic_industri")->result_array();
        return $result;
    }

    public function getSubIndustri()
    {
        $this->db->order_by("id_subsektor_industri", "DESC");
        $result = $this->db->get_where("sub_sektor_industri")->result_array();
        return $result;
    }

    public function getSektorIndustri()
    {
        $this->db->order_by("id_sektor_industri", "DESC");
        $result = $this->db->get_where("sektor_industri")->result_array();
        return $result;
    }
    public function getMarker()
    {
        $this->db->order_by("id_marker", "DESC");
        $result = $this->db->get_where("marker_set")->result_array();
        return $result;
    }
    public function countAllData()
    {
        return $this->db->get_where("industri")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('pic_industri_id', ' pic_industri_id', 'required');
        $this->form_validation->set_rules('sektor_industri_id', ' sektor_industri_id', 'required');
        $this->form_validation->set_rules('sub_sektor_industri_id', ' sub_sektor_industri_id', 'required');
        $this->form_validation->set_rules('nama_industri', ' nama_industri', 'required');
        $this->form_validation->set_rules('perizinan_industri', ' perizinan_industri', 'required');
        $this->form_validation->set_rules('besar_modal_industri', ' besar_modal_industri', 'required');
        $this->form_validation->set_rules('nama_pemilik_industri', ' nama_pemilik_industri', 'required');
        $this->form_validation->set_rules('telp_pemilik_industri', ' telp_pemilik_industri', 'required');
        $this->form_validation->set_rules('alamat_industri', ' alamat_industri', 'required');
        $this->form_validation->set_rules('latitude', ' latitude', 'required');
        $this->form_validation->set_rules('longitude', ' longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('Industri');
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
                    "user_id" => auth()['user']['id'],
                    "pic_industri_id" => $post['pic_industri_id'],
                    "sektor_industri_id" => $post['sektor_industri_id'],
                    "sub_sektor_industri_id" => $post['sub_sektor_industri_id'],
                    "nama_industri" => $post['nama_industri'],
                    "perizinan_industri" => $post['perizinan_industri'],
                    "besar_modal_industri" => $post['besar_modal_industri'],
                    "nama_pemilik_industri" => $post['nama_pemilik_industri'],
                    "telp_pemilik_industri" => $post['telp_pemilik_industri'],
                    "deskripsi_industri" => $post['deskripsi_industri'],
                    "alamat_industri" => $post['alamat_industri'],
                    "provinsi_id" => $post['provinsi_id'] ?? "",
                    "kabupaten_id" => $post['kabupaten_id'] ?? "",
                    "kecamatan_id" => $post['kecamatan_id'] ?? "",
                    "kelurahan_id" => $post['kelurahan_id'] ?? "",
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "marker_id" =>  $post['marker_id'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('Industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('Industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('Industri');
            }
        }
    }

    public function deleted($id_industri)
    {
        $this->db->where('id_industri', $id_industri);
        $this->db->delete('industri');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('industri');
    }

    public function getById($id_industri)
    {

        $getData = $this->db->get_where('industri', ['id_industri' => $id_industri])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('pic_industri_id', ' pic_industri_id', 'required');
        $this->form_validation->set_rules('sektor_industri_id', ' sektor_industri_id', 'required');
        $this->form_validation->set_rules('sub_sektor_industri_id', ' sub_sektor_industri_id', 'required');
        $this->form_validation->set_rules('nama_industri', ' nama_industri', 'required');
        $this->form_validation->set_rules('perizinan_industri', ' perizinan_industri', 'required');
        $this->form_validation->set_rules('besar_modal_industri', ' besar_modal_industri', 'required');
        $this->form_validation->set_rules('nama_pemilik_industri', ' nama_pemilik_industri', 'required');
        $this->form_validation->set_rules('telp_pemilik_industri', ' telp_pemilik_industri', 'required');
        $this->form_validation->set_rules('alamat_industri', ' alamat_industri', 'required');
        $this->form_validation->set_rules('latitude', ' latitude', 'required');
        $this->form_validation->set_rules('longitude', ' longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('Industri');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "user_id" => auth()['user']['id'],
                    "pic_industri_id" => $post['pic_industri_id'],
                    "sektor_industri_id" => $post['sektor_industri_id'],
                    "sub_sektor_industri_id" => $post['sub_sektor_industri_id'],
                    "nama_industri" => $post['nama_industri'],
                    "perizinan_industri" => $post['perizinan_industri'],
                    "besar_modal_industri" => $post['besar_modal_industri'],
                    "nama_pemilik_industri" => $post['nama_pemilik_industri'],
                    "telp_pemilik_industri" => $post['telp_pemilik_industri'],
                    "deskripsi_industri" => $post['deskripsi_industri'],
                    "alamat_industri" => $post['alamat_industri'],
                    "provinsi_id" => $post['provinsi_id'] ?? "",
                    "kabupaten_id" => $post['kabupaten_id'] ?? "",
                    "kecamatan_id" => $post['kecamatan_id'] ?? "",
                    "kelurahan_id" => $post['kelurahan_id'] ?? "",
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "marker_id" => $post['marker_id'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_industri', $id);
                $save = $this->db->update('industri', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('Industri');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('Industri');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('Industri');
            }
        }
    }

    public function detail($id_industri)
    {

        $dataId =  $this->db->get_where('industri', ['id_industri' => $id_industri])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'industri', "config_key" => "icon"])->row_array();

        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataIndustriById($id_industri),
            "setting" => $getSetting
        );
        $this->load->view('Router/route', $data);
    }
    public function maps($id_industri)
    {

        $dataId =  $this->db->get_where('industri', ['id_industri' => $id_industri])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "maps",
            'script' => $this->page . "script",
            'val' => $dataId
        );
        $this->load->view('Router/route', $data);
    }
}
