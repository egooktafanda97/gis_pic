<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_kesehatan extends My_controller
{
    private $page = "fa_kesehatan/";
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
        $config['base_url'] = base_url("fasilitas_kesehatan/index/");
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
            "title" => "Fasilitas Kesehatan",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenis" => $jenis_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_fasilitas_kesehatan", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenis_fasilitas_kesehatan", "jenis_fasilitas_kesehatan.id_jenis_fasilitas = fasilitas_kesehatan.jenis_fasilitas_id");
        $result = $this->db->get_where("fasilitas_kesehatan")->result_array();
        return $result;
    }
    public function dataFasilitasKesehatan()
    {
        $this->db->order_by("id_fasilitas_kesehatan ", "DESC");
        $this->db->join("jenis_fasilitas_kesehatan", "jenis_fasilitas_kesehatan.id_jenis_fasilitas = fasilitas_kesehatan.jenis_fasilitas_id");
        $result = $this->db->get_where("fasilitas_kesehatan")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "fasilitas_kesehatan"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "fasilitas_kesehatan"
        ];
    }


    public function getJenis()
    {
        $this->db->order_by("id_jenis_fasilitas", "DESC");
        $result = $this->db->get_where("jenis_fasilitas_kesehatan")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("fasilitas_kesehatan")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('type_fasilitas', 'type_fasilitas', 'required');
        $this->form_validation->set_rules('jenis_fasilitas_id', 'jenis_fasilitas_id', 'required');
        $this->form_validation->set_rules('nama_fasilitas', 'nama_fasilitas', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_kamar', 'jumlah_kamar', 'required');
        $this->form_validation->set_rules('jumlah_pasien_rata', 'jumlah_pasien_rata', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal ditambahkan');
            redirect('fasilitas_kesehatan');
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
                    "type_fasilitas" => $post['type_fasilitas'],
                    "jenis_fasilitas_id" => $post['jenis_fasilitas_id'],
                    "nama_fasilitas" => $post['nama_fasilitas'],
                    "alamat" => $post['alamat'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_kamar" => $post['jumlah_kamar'],
                    "jumlah_pasien_rata" => $post['jumlah_pasien_rata'],
                    "nama_pemilik" => $post['nama_pemilik'],
                    "no_telp" => $post['no_telp'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('fasilitas_kesehatan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('fasilitas_kesehatan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('fasilitas_kesehatan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('fasilitas_kesehatan');
            }
        }
    }

    public function deleted($id_fasilitas_kesehatan)
    {
        $this->db->where('id_fasilitas_kesehatan ', $id_fasilitas_kesehatan);
        $this->db->delete('fasilitas_kesehatan ');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('fasilitas_kesehatan');
    }

    public function getById($id_fasilitas_kesehatan)
    {

        $getData = $this->db->get_where('fasilitas_kesehatan', ['id_fasilitas_kesehatan ' => $id_fasilitas_kesehatan])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('type_fasilitas', 'type_fasilitas', 'required');
        $this->form_validation->set_rules('jenis_fasilitas_id', 'jenis_fasilitas_id', 'required');
        $this->form_validation->set_rules('nama_fasilitas', 'nama_fasilitas', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_kamar', 'jumlah_kamar', 'required');
        $this->form_validation->set_rules('jumlah_pasien_rata', 'jumlah_pasien_rata', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('fasilitas_kesehatan');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "type_fasilitas" => $post['type_fasilitas'],
                    "jenis_fasilitas_id" => $post['jenis_fasilitas_id'],
                    "nama_fasilitas" => $post['nama_fasilitas'],
                    "alamat" => $post['alamat'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_kamar" => $post['jumlah_kamar'],
                    "jumlah_pasien_rata" => $post['jumlah_pasien_rata'],
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
                $this->db->where('id_fasilitas_kesehatan', $id);
                $save = $this->db->update('fasilitas_kesehatan', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('fasilitas_kesehatan');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('fasilitas_kesehatan');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('fasilitas_kesehatan');
            }
        }
    }

    public function detail($id_fasilitas_kesehatan)
    {

        $dataId =  $this->db->get_where('fasilitas_kesehatan', ['id_fasilitas_kesehatan' => $id_fasilitas_kesehatan])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail",
            'script' => $this->page . "script",
            'val' => $dataId
        );
        $this->load->view('Router/route', $data);
    }
}
