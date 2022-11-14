<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penginapan extends My_controller
{
    private $page = "Penginapan/";
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
        $config['base_url'] = base_url("Penginapan/index/");
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
        $kelas_data = $this->getKelas();
        $data = [
            "title" => "Penginapan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenis" => $jenis_data,
            "kelas" => $kelas_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_penginapan ", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenis_penginapan", "jenis_penginapan.id_jenis_penginapan = penginapan.jenis_penginapan_id");
        $this->db->join("kelas_penginapan", "kelas_penginapan.id_kelas_penginapan = penginapan.kelas_inap_id");
        $result = $this->db->get_where("penginapan")->result_array();
        return $result;
    }
    public function dataPenginapan()
    {
        $this->db->order_by("id_penginapan ", "DESC");
        $this->db->join("jenis_penginapan", "jenis_penginapan.id_jenis_penginapan = penginapan.jenis_penginapan_id");
        $this->db->join("kelas_penginapan", "kelas_penginapan.id_kelas_penginapan = penginapan.kelas_inap_id");
        $result = $this->db->get_where("penginapan")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "penginapan"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "penginapan"
        ];
    }
    public function dataPenginapanById($id)
    {
        $this->db->join("jenis_penginapan", "jenis_penginapan.id_jenis_penginapan = penginapan.jenis_penginapan_id");
        $this->db->join("kelas_penginapan", "kelas_penginapan.id_kelas_penginapan = penginapan.kelas_inap_id");
        $this->db->where("penginapan.id_penginapan", $id);
        $result = $this->db->get_where("penginapan")->row_array();

        return $result;
    }

    public function getJenis()
    {
        $this->db->order_by("id_jenis_penginapan", "DESC");
        $result = $this->db->get_where("jenis_penginapan")->result_array();
        return $result;
    }

    public function getKelas()
    {
        $this->db->order_by("id_kelas_penginapan", "DESC");
        $result = $this->db->get_where("kelas_penginapan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("penginapan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('jenis_penginapan_id', 'jenis_penginapan_id', 'required');
        $this->form_validation->set_rules('kelas_inap_id', 'kelas_inap_id', 'required');
        $this->form_validation->set_rules('nama_penginapan', 'nama_penginapan', 'required');
        $this->form_validation->set_rules('jumlah_kamar', 'jumlah_kamar', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required');
        $this->form_validation->set_rules('alamat_penginapan', 'alamat_penginapan', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_web', 'alamat_web', 'required');
        $this->form_validation->set_rules('latitude', 't', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('penginapan');
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
                    "jenis_penginapan_id" => $post['jenis_penginapan_id'],
                    "kelas_inap_id" => $post['kelas_inap_id'],
                    "nama_penginapan" => $post['nama_penginapan'],
                    "jumlah_kamar" => $post['jumlah_kamar'],
                    "perizinan" => $post['perizinan'],
                    "nama_pemilik" => $post['nama_pemilik'],
                    "alamat_penginapan" => $post['alamat_penginapan'],
                    "no_telp" => $post['no_telp'],
                    "alamat_web" => $post['alamat_web'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('penginapan');
            }
        }
    }

    public function deleted($id_penginapan)
    {
        $this->db->where('id_penginapan ', $id_penginapan);
        $this->db->delete('penginapan ');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('penginapan');
    }

    public function getById($id_penginapan)
    {

        $getData = $this->db->get_where('penginapan', ['id_penginapan ' => $id_penginapan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_penginapan_id', ' jenis_penginapan_id', 'required');
        $this->form_validation->set_rules('kelas_inap_id', ' kelas_inap_id', 'required');
        $this->form_validation->set_rules('nama_penginapan', ' nama_penginapan', 'required');
        $this->form_validation->set_rules('jumlah_kamar', ' jumlah_kamar', 'required');
        $this->form_validation->set_rules('perizinan', ' perizinan', 'required');
        $this->form_validation->set_rules('nama_pemilik', ' nama_pemilik', 'required');
        $this->form_validation->set_rules('alamat_penginapan', ' alamat_penginapan', 'required');
        $this->form_validation->set_rules('no_telp', ' no_telp', 'required');
        $this->form_validation->set_rules('alamat_web', ' alamat_web', 'required');
        $this->form_validation->set_rules('latitude', ' latitude', 'required');
        $this->form_validation->set_rules('longitude', ' longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('penginapan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "jenis_penginapan_id" => $post['jenis_penginapan_id'],
                    "kelas_inap_id" => $post['kelas_inap_id'],
                    "nama_penginapan" => $post['nama_penginapan'],
                    "jumlah_kamar" => $post['jumlah_kamar'],
                    "perizinan" => $post['perizinan'],
                    "nama_pemilik" => $post['nama_pemilik'],
                    "alamat_penginapan" => $post['alamat_penginapan'],
                    "no_telp" => $post['no_telp'],
                    "alamat_web" => $post['alamat_web'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_penginapan', $id);
                $save = $this->db->update('penginapan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('penginapan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('penginapan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('penginapan');
            }
        }
    }

    public function detail($id_penginapan)
    {

        $dataId =  $this->db->get_where('penginapan', ['id_penginapan' => $id_penginapan])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'penginapan', "config_key" => "icon"])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataPenginapanById($id_penginapan),
            "setting" => $getSetting
        );
        $this->load->view('Router/route', $data);
    }
}
