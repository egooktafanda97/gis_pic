<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';
    protected $primaryKey = 'id_bank';
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

    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nama"  => $this->getAttribute("nama_bank"),
            "jenis" => $this->table
        ];
    }
}
