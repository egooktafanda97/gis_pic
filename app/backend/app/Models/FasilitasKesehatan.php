<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKesehatan extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_kesehatan';
    protected $primaryKey = 'id_fasilitas_kesehatan';
    public $timestamps = true;
    protected $appends = ['setting', 'ethnicity', "header"];
    protected $fillable = [
        "type_fasilitas",
        "jenis_fasilitas_id",
        "nama_fasilitas",
        "alamat",
        "perizinan",
        "jumlah_kamar",
        "jumlah_pasien_rata",
        "nama_pemilik",
        "no_telp",
        "alamat_website",
        "latitude",
        "longitude",
        "gambar",
    ];

    public function getSettingAttribute()
    {
        return Setting::where("table_config", $this->table)->get();
    }
    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nama"  => $this->getAttribute("nama_fasilitas"),
            "jenis" => $this->table
        ];
    }
}
