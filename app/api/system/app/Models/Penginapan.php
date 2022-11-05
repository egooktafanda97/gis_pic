<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;
    protected $table = 'penginapan';
    protected $primaryKey = 'id_penginapan';
    public $timestamps = true;
    protected $appends = ['setting', 'ethnicity', "header"];
    protected $fillable = [
        "jenis_penginapan_id",
        "kelas_inap_id",
        "nama_penginapan",
        "jumlah_kamar",
        "perizinan",
        "nama_pemilik",
        "alamat_penginapan",
        "no_telp",
        "alamat_web",
        "laritude",
        "logitude",
        "gambar"
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
            "nama"  => $this->getAttribute("nama_penginapan"),
            "jenis" => $this->table
        ];
    }
}
