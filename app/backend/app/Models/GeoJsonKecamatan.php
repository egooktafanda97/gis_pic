<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoJsonKecamatan extends Model
{
    use HasFactory;
    protected $table = 'geojson_kecamatan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        "kode_kecamatan",
        "nama_kecamatan",
        "polygon",
        "kelurahan",
        "propertis"
    ];

    public function InfoGrafis()
    {
        return $this->hasOne(\App\Models\InfoGrafis::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function kecamatan()
    {
        return $this->hasOne(\App\Models\Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
