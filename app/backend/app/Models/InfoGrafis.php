<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class InfoGrafis extends Model
{
    use HasFactory;
    protected $table = 'info_grafis';
    protected $primaryKey = 'id';
    protected $fillable = [
        "kode_kecamatan",
        "tahun",
        "tanggal",
        "alamat",
        "faktor",
        "sub_faktor",
        "nama",
        "keterangan",
    ];
    public function kecamatan()
    {
        return $this->hasOne(\App\Models\GeoJsonKecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
