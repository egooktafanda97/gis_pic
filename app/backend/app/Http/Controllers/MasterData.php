<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use App\Models\Pendidikan;
use App\Models\Setting;

class MasterData extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['data_main', 'geojson']]);
    }

    public function data_main($arg = null)
    {
        switch ($arg) {
            case 'value':
                # code...
                break;

            default:
                $concat = array_merge([
                    "industri" => $this->dataIndustri(),
                    "pendidikan" => $this->dataPendidikan(),
                    "bank" => [],
                    "penginapan" => [],
                    "tampat_ibadah" => []
                ]);

                return response()->json($this->BuidFormatGeoJson($concat));

                break;
        }
    }
    public function geojson($args = null)
    {
        switch ($args) {
            case 'value':
                # code...
                break;

            default:
                $concat = array_merge([
                    "industri" => $this->dataIndustri(),
                    "pendidikan" => $this->dataPendidikan(),
                ]);

                $getPropertis = Setting::where("config", "map")->get();

                return response()->json([
                    "geoJson" => $this->BuidFormatGeoJson($concat),
                    "setting" => $getPropertis
                ]);

                break;
        }
    }
    public function dataIndustri()
    {
        return Industri::with([
            "pic",
            "SektorUtama",
            "SubSektor",
        ])->get();
    }
    public function dataPendidikan()
    {
        return Pendidikan::with("jenjangPendidikan")->get();
    }
    public function BuidFormatGeoJson($data)
    {
        $d = [];
        foreach ($data as $v) {
            foreach ($v as $val) {
                $d[] = $val;
            }
        }
        $res = $this->ObjGeoJsonList($d);

        $init = [
            "type" => "FeatureCollection",
            "name" => "marker",
            "crs" => [
                "type" => "name",
                "properties" => ["name" => "urn:ogc:def:crs:OGC:1.3:CRS84"],
            ],
            "features" => $res,
        ];
        return $init;
    }
    public function ObjGeoJsonList($data)
    {
        $res = [];
        foreach ($data as $value) {
            if (!empty($value['latitude']) && !empty($value['longitude'])) {
                $geo = [
                    "type" => "Feature",
                    "properties" => [
                        "ethnicity" => $value['ethnicity'],
                        "data" => $this->dataLogicalDetail($value),
                        "items" => $value,
                    ],
                    "geometry" => [
                        "type" => "Point",
                        "properties" => [],
                        "coordinates" => [
                            floatval($value['longitude']),
                            floatval($value['latitude'])
                        ],
                    ],
                ];
                array_push($res, $geo);
            }
        }
        return $res;
    }
    public function dataLogicalDetail($data)
    {
        switch ($data['ethnicity']) {
            case 'industri':
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_industri'] ?? "",
                    ],
                    [
                        "label" => "Jenis",
                        "value" => $data['ethnicity'] ?? "",
                    ],
                    [
                        "label" => "Kategori " . $data['ethnicity'],
                        "value" => $data["pic"]['pic_category_name'] ?? "",
                    ],
                    [
                        "label" => "Tipe " . $data['ethnicity'],
                        "value" => $data["pic"]['pic_industry_type_name'] ?? "",
                    ],
                    [
                        "label" => "Sektor Utama " . $data['ethnicity'],
                        "value" => $data["sektor_utama"]['nama_sektor_utama_industri'] ?? "",
                    ],
                    [
                        "label" => "Sub Sektor " . $data['ethnicity'],
                        "value" => $data["sub_sektor"]['nama_subsektor_industri'] ?? "",
                    ],
                    [
                        "label" => "Nama Pemilik " . $data['ethnicity'],
                        "value" => $data['nama_pemilik_industri'] ?? "",
                    ],
                    [
                        "label" => "Perizinan " . $data['ethnicity'],
                        "value" => $data['perizinan_industri'] ?? "",
                    ],
                    [
                        "label" => "Besar Model",
                        "value" => $data['besar_modal_industri'] ?? "",
                    ],
                    [
                        "label" => "Alamat " . $data['ethnicity'],
                        "value" => $data['alamat_industri'] ?? "",
                    ],
                    [
                        "label" => "Kordinat",
                        "value" => $data['latitude'] . "," . $data['longitude'],
                    ],
                    [
                        "label" => "Telepon",
                        "value" => $data['telp_pemilik_industri'] ?? "",
                    ],
                ];
                break;
            case "pendidikan":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_pendidikan'] ?? "",
                    ],
                    [
                        "label" => "JENIS ",
                        "value" => $data['ethnicity'] ?? "",
                    ],
                    [
                        "label" => "SEKOLAH ",
                        "value" => $data['jenis_pendidikan'] ?? "",
                    ],
                    [
                        "label" => "JENJANG " . $data['ethnicity'],
                        "value" => $data["jenjang_pendidikan"]['nama_jenjang'] ?? "",
                    ],
                    [
                        "label" => "PERIZINAN " . $data['ethnicity'],
                        "value" => $data['perizinan_pendidikan'] ?? "",
                    ],
                    [
                        "label" => "JUMLAH TENAGA PENDIDIK",
                        "value" => $data['jumlah_tenaga_pendidik'] ?? "",
                    ],
                    [
                        "label" => "NAMA PIMPINAN",
                        "value" => $data['nama_pimpinan'] ?? "",
                    ],
                    [
                        "label" => "ALAMAT " . $data['ethnicity'],
                        "value" => $data['alamat_pendidikan'] ?? "",
                    ],
                    [
                        "label" => "WEBSITE " . $data['ethnicity'],
                        "value" => $data['website_pendidikan'] ?? "",
                    ],
                    [
                        "label" => "Kordinat",
                        "value" => $data['latitude'] . "," . $data['longitude'],
                    ],
                    [
                        "label" => "TELEPON",
                        "value" => $data['no_telp'] ?? "",
                    ],
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
