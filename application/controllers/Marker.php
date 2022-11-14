<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Marker extends My_controller
{
    private $page = "Marker/";
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
        $data = [
            "title" => "Pariwisata",
            "page" => $this->page . "index",
            "script" => $this->page . "script",
            "result" =>  $all_data,
        ];
        $this->load->view('Router/route', $data);
    }

    public function countAllData()
    {
        return $this->db->get_where("marker_set")->num_rows();
    }

    public function getAllData($limit, $start)
    {
        $this->db->order_by("id_marker", "DESC");
        $this->db->limit($limit, $start);
        $result = $this->db->get_where("marker_set")->result_array();
        return $result;
    }
}
