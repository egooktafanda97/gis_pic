<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikan';
    protected $primaryKey = 'id_pendidikan';
    protected $appends = ['ethnicity', "header"];
    protected $fillable = [
        "id_pendidikan",
        "user_id",
        "jenis_pendidikan",
        "jenjang_pendidikan_id",
        "nama_pendidikan",
        "perizinan_pendidikan",
        "jumlah_tenaga_pendidik",
        "nama_pimpinan",
        "alamat_pendidikan",
        "provinsi_id",
        "kabupaten_id",
        "kecamatan_id",
        "kelurahan_id",
        "website_pendidikan",
        "latitude",
        "longitude",
        "gambar",
    ];

    public function jenjangPendidikan()
    {
        return $this->belongsTo('App\Models\jenjangPendidikan', 'jenjang_pendidikan_id', 'jenjang_pendidikan_id');
    }
    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nama"  => $this->getAttribute("nama_pendidikan"),
            "jenis" => $this->table
        ];
    }
}
