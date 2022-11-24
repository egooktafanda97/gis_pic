<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use App\Models\Pendidikan;
use App\Models\TempatIbadah;
use App\Models\Penginapan;
use App\Models\FasilitasKesehatan;
use App\Models\pariwisata;
use App\Models\Bank;
use App\Models\Setting;
use App\Models\Kecamatan;
use App\Models\MarkerSet;

class MasterData extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['data_main', 'geojson', 'dataKecamatan']]);
    }

    public function dataKecamatan($kode)
    {
        $data = Kecamatan::where("kode_kecamatan", $kode)->first();
        return response()->json($data);
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
                    // "pendidikan" => $this->dataPendidikan(),
                    // "tempat_ibadah" => TempatIbadah::all(),
                    // "penginapan" => Penginapan::all(),
                    // "fasilitas_kesehatan" => FasilitasKesehatan::all(),
                    // "pariwisata" => pariwisata::all(),
                    // "bank" => Bank::all()
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
                    "tempat_ibadah" => TempatIbadah::all(),
                    "penginapan" => Penginapan::with(['jenis_penginapan', 'kelas_penginapan'])->get(),
                    "fasilitas_kesehatan" => FasilitasKesehatan::all(),
                    "pariwisata" => pariwisata::all(),
                    "bank" => Bank::all()
                ]);

                $getMarkerIcon = MarkerSet::all();

                return response()->json([
                    "geoJson" => $this->BuidFormatGeoJson($concat),
                    "item" => $concat,
                    "marker" =>  $getMarkerIcon
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
                        "marker_id" => $value['marker_id'],
                        "items" => $value,
                        "data" => $this->dataLogicalDetail($value),
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

            case "tempat_ibadah":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_tempat_ibadah'] ?? "",
                    ],
                    [
                        "label" => "JENIS " . $data['ethnicity'],
                        "value" => $data['jenis_tempat_ibadah'] ?? "",
                    ],
                    [
                        "label" => "LUAS " . $data['ethnicity'],
                        "value" => $data['luas_tempat_ibadah'] ?? "",
                    ],
                    [
                        "label" => "PERIZINAN " . $data['ethnicity'],
                        "value" => $data['perizinan'] ?? "",
                    ],
                    [
                        "label" => "ALAMAT " . $data['ethnicity'],
                        "value" => $data['alamat'] ?? "",
                    ],
                    [
                        "label" => "NAMA PENANGGUNG JAWAB ",
                        "value" => $data['nama_penanggung_jawab'] ?? "",
                    ],
                    [
                        "label" => "NOMOR TELEPON",
                        "value" => $data['no_telp'] ?? "",
                    ],
                    [
                        "label" => "ALAMAT WEBSITE",
                        "value" => $data['alamat_website'] ?? "",
                    ],
                ];
                break;
            case "penginapan":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_penginapan'] ?? "",
                    ],
                    [
                        "label" => "JENIS " . $data['ethnicity'],
                        "value" => $data['jenis_penginapan']['nama_jenis_penginapan'] ?? "",
                    ],
                    [
                        "label" => "KELAS " . $data['ethnicity'],
                        "value" => $data['kelas_penginapan']['nama_kelas_penginapan'] ?? "",
                    ],
                ];
                break;
            case "fasilitas_kesehatan":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_pendidikan'] ?? "",
                    ],
                ];
                break;
            case "pariwisata":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_pendidikan'] ?? "",
                    ],
                ];
                break;
            case "bank":
                return [
                    [
                        "label" => "NAMA " . $data['ethnicity'],
                        "value" => $data['nama_pendidikan'] ?? "",
                    ],
                ];
                break;
                // case "":
                //     return [
                //         [
                //             "label" => "NAMA " . $data['ethnicity'],
                //             "value" => $data['nama_pendidikan'] ?? "",
                //         ],
                //     ];
                //     break;
            default:
                # code...
                break;
        }
    }
}
