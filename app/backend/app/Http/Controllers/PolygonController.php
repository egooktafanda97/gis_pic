<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeoJsonKecamatan;
use App\Models\InfoGrafis;
use Illuminate\Support\Facades\DB;

class PolygonController extends Controller
{

    public function GeoJson()
    {
        $polygon = GeoJsonKecamatan::all();
        $poly = $this->BuidFormatGeoJson($polygon);

        return response()->json($poly);
    }

    public function BuidFormatGeoJson($data)
    {
        $res = $this->ObjGeoJsonList($data);

        $init = [
            "type" => "FeatureCollection",
            "features" => $res,
        ];
        return $init;
    }
    public function ObjGeoJsonList($data)
    {
        $res = [];
        foreach ($data as $value) {
            $geo = [
                "type" => "Feature",
                "properties" => [
                    "class" => $value['kode_kecamatan'],
                    "name"  => $value["nama_kecamatan"]
                ],
                "geometry" => [
                    "type" => "Polygon",
                    "coordinates" => json_decode($value['polygon'], true),
                    "properties" => json_decode($value['properties'], true)
                ]
            ];
            array_push($res, $geo);
        }
        return $res;
    }
    public function getDataKecmatanByKode(Request $request)
    {

        $d = DB::table("info_grafis")->where("info_grafis.kode_kecamatan", $request->kode)
            ->join('kecamatan', 'kecamatan.kode_kecamatan', '=', 'info_grafis.kode_kecamatan')
            ->get()
            ->groupBy('faktor');

        return response()->json($d);
    }
}
