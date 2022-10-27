<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Industri;

class IndustriController extends Controller
{
    public function getdataIndustri()
    {
        return response()->json(Industri::all());
    }
}
