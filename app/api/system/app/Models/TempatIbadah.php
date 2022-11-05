<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    use HasFactory;
    protected $table = 'tempat_ibadah';
    protected $primaryKey = 'id_tempat_ibadah';
    public $timestamps = true;
    protected $appends = ['setting', 'ethnicity', "header"];
    protected $fillable = [
        "jenis_tempat_ibadah",
        "nama_tempat_ibadah",
        "luas_tempat_ibadah",
        "perizinan",
        "alamat",
        "nama_penanggung_jawab",
        "no_telp",
        "latitude",
        "longitude",
        "alamat_website",
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
            "nama"  => $this->getAttribute("nama_tempat_ibadah"),
            "jenis" => $this->table
        ];
    }
}
