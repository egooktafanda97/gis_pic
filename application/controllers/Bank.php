<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends My_controller
{
    private $page = "Bank/";
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
        $config['base_url'] = base_url("Bank/index/");
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
            "title" => "Bank",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
            "jenis" => $jenis_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_bank", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join("jenis_bank", "jenis_bank.id_jenis_bank = bank.jenis_bank_id");
        $result = $this->db->get_where("bank")->result_array();
        return $result;
    }
    public function dataBank()
    {
        $this->db->order_by("id_bank ", "DESC");
        $this->db->join("jenis_bank", "jenis_bank.id_jenis_bank = bank.jenis_bank_id");
        $result = $this->db->get_where("bank")->result_array();

        $result = array_map(function ($result) {
            return $result += ["category" => "bank"];
        }, $result);

        return [
            "result" => $result,
            "package_data" => "bank"
        ];
    }


    public function getJenis()
    {
        $this->db->order_by("id_jenis_bank", "DESC");
        $result = $this->db->get_where("jenis_bank")->result_array();
        return $result;
    }

    public function countAllData()
    {
        return $this->db->get_where("bank")->num_rows();
    }

    public function created()
    {
        $this->form_validation->set_rules('jenis_bank_id', 'jenis_bank_id', 'required');
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required');
        $this->form_validation->set_rules('alamat_bank', 'alamat_bank', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_nasabah', 'jumlah_nasabah', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'gagal berr ditambahkan');
            redirect('bank');
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
                    "jenis_bank_id" => $post['jenis_bank_id'],
                    "nama_bank" => $post['nama_bank'],
                    "alamat_bank" => $post['alamat_bank'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_nasabah" => $post['jumlah_nasabah'],
                    "no_telp" => $post['no_telp'],
                    "alamat_website" => $post['alamat_website'],
                    "latitude" => $post['latitude'],
                    "longitude" => $post['longitude'],
                    "gambar" => $uploaded,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $save = $this->db->insert('bank', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil ditambahkan');
                    redirect('bank');
                } else {
                    $this->session->set_flashdata('error', 'gagal di inputkan');
                    redirect('bank');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'gagal ditambahkan');
                redirect('bank');
            }
        }
    }

    public function deleted($id_bank)
    {
        $this->db->where('id_bank ', $id_bank);
        $this->db->delete('bank ');

        $this->session->set_flashdata('success', 'data berhasil dihapus');
        redirect('bank');
    }

    public function getById($id_bank)
    {

        $getData = $this->db->get_where('bank', ['id_bank ' => $id_bank])->row_array();
        echo json_encode($getData);
    }

    public function update($id)
    {

        $this->form_validation->set_rules('jenis_bank_id', 'jenis_bank_id', 'required');
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required');
        $this->form_validation->set_rules('alamat_bank', 'alamat_bank', 'required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'required');
        $this->form_validation->set_rules('jumlah_nasabah', 'jumlah_nasabah', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat_website', 'alamat_website', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'data tidak di ubah');
            redirect('bank');
        } else {
            try {
                $post = $this->input->post();
                $data  = [
                    "jenis_bank_id" => $post['jenis_bank_id'],
                    "nama_bank" => $post['nama_bank'],
                    "alamat_bank" => $post['alamat_bank'],
                    "perizinan" => $post['perizinan'],
                    "jumlah_nasabah" => $post['jumlah_nasabah'],
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
                $this->db->where('id_bank', $id);
                $save = $this->db->update('bank', $data);
                if ($save) {
                    $this->session->set_flashdata('success', 'berhasil di ubah');
                    redirect('bank');
                } else {
                    $this->session->set_flashdata('error', 'gagal di ubah');
                    redirect('bank');
                }
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', 'kesalahan');
                redirect('bank');
            }
        }
    }

    public function detail($id_bank)
    {

        $dataId =  $this->db->get_where('bank', ['id_bank' => $id_bank])->row_array();
        $data = array(
            'title' => "Detail Data",
            'page' => $this->page . "detail",
            'script' => $this->page . "script",
            'val' => $dataId
        );
        $this->load->view('Router/route', $data);
    }
}
