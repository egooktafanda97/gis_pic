<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkerSet extends Model
{
    use HasFactory;
    protected $table = 'marker_set';
    protected $primaryKey = 'id_marker';
    protected $fillable = [
        "id_marker",
        "name",
        "nama_kecamatan",
        "marker",
    ];
}
