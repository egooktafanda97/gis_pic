<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use App\Models\Pendidikan;

class MasterData extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['data_main']]);
    }

    public function data_main($arg = null)
    {
        switch ($arg) {
            case 'value':
                # code...
                break;

            default:

                $concat = [
                    "industri" => $this->dataIndustri(),
                    "pendidikan" => $this->dataPendidikan(),
                ];

                return response()->json($concat);

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
}
