<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreInfoGrafis;

class CoreInfoGrafisController extends Controller
{
    public function created()
    {
        CoreInfoGrafis::insert([
            [
                "faktor"        => "Ekonomi",
                "sub_faktor"    => json_encode(["pdrb_wilayah", "pelaku_usaha"])
            ],
            [
                "faktor"        => "demografi",
                "sub_faktor"    => json_encode(["kependudukan"])
            ],
            [
                "faktor"        => "infrastruktur",
                "sub_faktor"    => json_encode(["Jalan", "Listrik", "Air Bersih", "Drainase", "Lahan"])
            ],
            [
                "faktor"        => "lain nya",
                "sub_faktor"    => json_encode(["Fasilitas Eksisting"])
            ],
        ]);
    }
    public function get()
    {
        $d = CoreInfoGrafis::all();
        foreach ($d as  $value) {
            $value->sub_faktor = json_decode($value->sub_faktor);
        }
        return response()->json($d);
    }
}
