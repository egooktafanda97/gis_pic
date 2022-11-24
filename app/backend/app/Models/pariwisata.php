<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pariwisata extends Model
{
    use HasFactory;
    protected $table = 'pariwisata';
    protected $primaryKey = 'id_pariwisata';
    public $timestamps = true;
    protected $appends = ['ethnicity', "header"];
    protected $fillable = [
        "id_pariwisata",
        "jenis_pariwisata_id",
        "kepemilikan",
        "nama_tempat_pariwisata",
        "alamat_tempat_pariwisata",
        "perizinan",
        "jumlah_pengunjung_rata",
        "nama_pemilik",
        "no_telp",
        "alamat_website",
        "latitude",
        "longitude",
        "gambar",
    ];

    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nama"  => $this->getAttribute("pariwisata"),
            "jenis" => $this->table
        ];
    }
}
