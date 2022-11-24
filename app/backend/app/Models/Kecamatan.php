<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $primaryKey = 'kode_kecamatan';
    protected $fillable = [
        "kode_kecamatan",
        "nama_kecamatan",
        "batas_wilayah",
        "luas_wilayah",
        "geologi",
        "iklim",
        "jumlah_penduduk",
        "laju_pertumbuhan"
    ];
}
