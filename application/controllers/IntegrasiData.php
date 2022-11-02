<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IntegrasiData extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Industri_model');
        $this->load->model('Sektor_model');
        $this->load->model('SubSektor_model');
        $this->load->model('PicIndustri_model');
    }
    public function index()
    {
    }
    public function loadData()
    {
        $data = json_decode(file_get_contents(base_url("assets\website\apps\src\page\Gis\json\api_data.json")), true);

        $d = [];
        foreach ($data as $key => $value) {
            if (empty($value['sektor_utama_industri']) || empty($value['subsektor_industri'])) {
                continue;
            }
            $sektor___cek = Sektor_model::where("nama_sektor_utama_industri", $value['sektor_utama_industri']['nama_sektor_utama_industri'])->first();
            $id_sektor = 0;
            if ($sektor___cek) {
                $id_sektor = $sektor___cek->id_sektor_industri;
            } else {
                $dt = [
                    "nama_sektor_utama_industri" => $value['sektor_utama_industri']['nama_sektor_utama_industri'] ?? ""
                ];
                $ins = Sektor_model::create($dt);
                $id_sektor = $ins->id_sektor_industri;
            }


            $subsektor___cek = SubSektor_model::where("nama_subsektor_industri", $value['subsektor_industri']['nama_subsektor_industri'])->first();
            $id_subsektor = 0;
            if ($subsektor___cek) {
                $id_subsektor = $subsektor___cek->id_subsektor_industri;
            } else {
                $dt1 = [
                    "nama_subsektor_industri" => $value['subsektor_industri']['nama_subsektor_industri'] ?? ""
                ];
                $ins = SubSektor_model::create($dt1);
                $id_subsektor = $ins->id_subsektor_industri;
            }
            // PIC
            $pic___cek = PicIndustri_model::where("pic_category_name", $value['pic_category_name'] ?? "")->first();
            $id_pic = 0;
            if ($pic___cek) {
                $id_pic = $pic___cek->id_pic_industri;
            } else {
                $dt2 = [
                    "pic_category_name" => $value['pic_category_name'] ?? "",
                    "pic_industry_type_name" => $value['pic_industry_type_name'] ?? "",
                ];
                $ins = PicIndustri_model::create($dt2);
                $id_pic = $ins->id_pic_industri;
            }

            // $address = $this->mapApiAlamat($value['latitude'] . ',' . $value['longitude']);
            array_push($d, [
                "user_id"  => 1,
                "pic_industri_id" => $id_pic ?? "",
                "sektor_industri_id" => $id_sektor,
                "sub_sektor_industri" =>  $id_subsektor,
                "nama_industri" => $value["nama_industri"],
                "alamat_industri" => $value["alamat_usaha"],
                // "provinsi_id"  => $this->db->get_where("wilayah_provinsi", ["nama_provinsi" => $address['administrative_area_level_1'] ?? ""])->row_array()['id_provinsi'] ?? "",
                // "kabupaten_id" => $this->db->get_where("wilayah_kabupaten", ["nama_kabupaten" => $address['administrative_area_level_2'] ?? ""])->row_array()['id_kabupaten'] ?? "",
                // "kecamatan_id" => $this->db->get_where("wilayah_kecamatan", ["nama_kecamatan" => $address['administrative_area_level_3'] ?? ""])->row_array()['id_kecamatan'] ?? "",
                // "kelurahan_id" => $this->db->get_where("wilayah_desa", ["nama_desa" => $address['administrative_area_level_4'] ?? ""])->row_array()['id_desa'] ?? "",
                "latitude" => $value["latitude"],
                "longitude" => $value["longitude"],
                "gambar" => "default.jpg",
                "icon" => "industri.png",
                "created_at" => date("Y-m-d H:s:i"),
                "updated_at" =>  date("Y-m-d H:s:i"),
            ]);
        }
        $ins = Industri_model::insert($d);
    }
    public function mapApiAlamat($koordinat = null)
    {
        if ($koordinat == null)
            return false;
        $latlng = str_replace(" ", "", $koordinat);
        $geocode = @file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDyzYo4TzUruDNwTDHg8XPPlmoV6PPtxAE&&latlng=' . $latlng . '&sensor=false');
        if ($geocode == false)
            return [];
        $output = json_decode($geocode);
        $alamat = [];
        for ($j = 0; $j < count($output->results[0]->address_components); $j++) {
            // echo '<b>' . $output->results[0]->address_components[$j]->types[0] . ': </b>  ' . $output->results[0]->address_components[$j]->long_name . '<br/>';
            $alamat[$output->results[0]->address_components[$j]->types[0]] = $output->results[0]->address_components[$j]->long_name;
        }
        return $alamat;
    }
    public function getData()
    {
        $data = Industri_model::all();
        echo json_encode($data);
    }
    public function alamatGoogleMaps($lat, $lng)
    {
        $latlng = $lat . "," . $lng;
        echo json_encode($this->mapApiAlamat($latlng));
    }
}
