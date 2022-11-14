<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GeoJsonKecamatan;
use Illuminate\Support\Str;

class GeoJsonController extends Controller
{
    public function pekanbaru()
    {
        $data = json_decode(file_get_contents("http://localhost/sig_pku/app/public/json/pekanbaru.geojson"), true);
        $app = [];
        $no = 1;
        foreach ($data["features"] as  $v) {
            array_push($app, $v);
        }
        foreach ($app as $key => $value) {
            $checkKec = GeoJsonKecamatan::where("nama_kecamatan", $value["properties"]["Kecamatan"])->first();
            $generateCode = empty($checkKec) ? Str::random($length = 10) : $checkKec['kode_kecamatan'];
            $this->insertCoordinates(
                [
                    "kode_kecamatan"    =>  $generateCode,
                    "nama_kecamatan"    =>  $value["properties"]["Kecamatan"],
                    "kelurahan"         =>  $value["properties"]["Kelurahan"],
                    "polygon"           =>  json_encode($value["geometry"]["coordinates"], true),
                    "propertis"         =>  json_encode($value["properties"])
                ]
            );
        }
    }
    public function insertCoordinates($co)
    {
        $d = [
            "kode_kecamatan"    => $co['kode_kecamatan'],
            "nama_kecamatan"    => $co['nama_kecamatan'],
            "kelurahan" => $co['kelurahan'],
            "polygon"   => $co['polygon'],
            "propertis" => $co['propertis']
        ];
        GeoJsonKecamatan::create($d);
    }
}
