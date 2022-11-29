<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spbu extends Model
{
    use HasFactory;
    protected $table = 'spbu';
    protected $primaryKey = 'id_spbu';
    public $timestamps = true;
    protected $appends = ['ethnicity', "header"];
    protected $fillable = [
        "jenis_bank_id",
        "nama_bank",
        "alamat_bank",
        "perizinan",
        "jumlah_nasabah",
        "no_telp",
        "alamat_website",
        "latitude",
        "longitude",
        "gambar",
    ];
    public function JenisSpbu()
    {
        return $this->belongsTo('App\Models\JenisSpbu', 'jenis_spbu_id', 'id_jenis_spbu');
    }
    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nomor"  => $this->getAttribute("nomor_spbu"),
            "jenis" => $this->table
        ];
    }
}
