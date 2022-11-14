<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pariwisata extends My_controller
{
    private $page = "Pariwisata/";
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
        $config['base_url'] = base_url("Pariwisata/index/");
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
            "title" => "Pariwisata",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenis" => $jenis_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_pariwisata", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenis_pariwisata", "jenis_pariwisata.id_jenis_pariwisata = pariwisata.jenis_pariwisata_id");
        $result = $this->db->get_where("pariwisata")->result_array();
        return $result;
    }
    public function dataPariwisata()
    {
        $this->db->order_by("id_pariwisata ", "DESC");
        $this->db->join("jenis_pariwisata", "jenis_pariwisata.id_jenis_pariwisata = pariwisata.jenis_pariwisata_id");
        $result = $this->db->get_where("pariwisata")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "pariwisata"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "pariwisata"
        ];
    }

    public function dataPariwisataById($id)
    {
        $this->db->join("jenis_pariwisata", "jenis_pariwisata.id_jenis_pariwisata = pariwisata.jenis_pariwisata_id");
        $this->db->where("pariwisata.id_pariwisata", $id);
        $result = $this->db->get_where("pariwisata")->row_array();

        return $result;
    }


    public function getJenis()
    {
        $this->db->order_by("id_jenis_pariwisata", "DESC");
        $result = $this->db->get_where("jenis_pariwisata")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("pariwisata")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('jenis_pariwisata_id', 'jenis_pariwisata_id', 'required');
        $this->form_validation->set_rules('kepemilikan', 'kepemilikan', 'required');
        $this->form_validation->set_rules('nama_tempat_pariwisata', 'nama_tempat_pariwisata', 'required');
        $this->form_validation->set_rules('alamat_tempat_pariwisata', 'alamat_tempat_pariwisata', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_pengunjung_rata', 'jumlah_pengunjung_rata', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal berr ditambahkan');
            redirect('pariwisata');
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
                    "jenis_pariwisata_id" => $post['jenis_pariwisata_id'],
                    "kepemilikan" => $post['kepemilikan'],
                    "nama_tempat_pariwisata" => $post['nama_tempat_pariwisata'],
                    "alamat_tempat_pariwisata" => $post['alamat_tempat_pariwisata'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_pengunjung_rata" => $post['jumlah_pengunjung_rata'],
                    "nama_pemilik" => $post['nama_pemilik'],
                    "no_telp" => $post['no_telp'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('pariwisata', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('pariwisata');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('pariwisata');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('pariwisata');
            }
        }
    }

    public function deleted($id_pariwisata)
    {
        $this->db->where('id_pariwisata ', $id_pariwisata);
        $this->db->delete('pariwisata ');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('pariwisata');
    }

    public function getById($id_pariwisata)
    {

        $getData = $this->db->get_where('pariwisata', ['id_pariwisata ' => $id_pariwisata])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_pariwisata_id', 'jenis_pariwisata_id', 'required');
        $this->form_validation->set_rules('kepemilikan', 'kepemilikan', 'required');
        $this->form_validation->set_rules('nama_tempat_pariwisata', 'nama_tempat_pariwisata', 'required');
        $this->form_validation->set_rules('alamat_tempat_pariwisata', 'alamat_tempat_pariwisata', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_pengunjung_rata', 'jumlah_pengunjung_rata', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('pariwisata');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "jenis_pariwisata_id" => $post['jenis_pariwisata_id'],
                    "kepemilikan" => $post['kepemilikan'],
                    "nama_tempat_pariwisata" => $post['nama_tempat_pariwisata'],
                    "alamat_tempat_pariwisata" => $post['alamat_tempat_pariwisata'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_pengunjung_rata" => $post['jumlah_pengunjung_rata'],
                    "nama_pemilik" => $post['nama_pemilik'],
                    "no_telp" => $post['no_telp'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $uploaded = up("gambar", "assets/img/foto/");
                if ($uploaded != false) {
                    $data += ["gambar" => $uploaded];
                }
                $this->db->where('id_pariwisata', $id);
                $save = $this->db->update('pariwisata', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('pariwisata');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('pariwisata');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('pariwisata');
            }
        }
    }

    public function detail($id_pariwisata)
    {

        $dataId =  $this->db->get_where('pariwisata', ['id_pariwisata' => $id_pariwisata])->row_array();
        $getSetting = $this->db->get_where("setting", ["table_config" => 'pariwisata', "config_key" => "icon"])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail/index",
            "style" => $this->page . "detail/style",
            'script' => $this->page . "detail/script",
            'val' => $this->dataPariwisataById($id_pariwisata),
            "setting" => $getSetting
        );
        $this->load->view('Router/route', $data);
    }
}
