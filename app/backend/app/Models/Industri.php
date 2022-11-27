<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

class Industri extends Model
{
    protected $table = 'industri';
    protected $primaryKey = 'id_industri';
    public $timestamps = true;
    protected $appends = ['ethnicity', "header"];
    protected $fillable = [
        "user_id",
        "pic_industri_id",
        "sektor_industri_id",
        "sub_sektor_industri_id",
        "nama_industri",
        "perizinan_industri",
        "besar_modal_industri",
        "nama_pemilik_industri",
        "telp_pemilik_industri",
        "deskripsi_industri",
        "alamat_industri",
        "provinsi_id",
        "kabupaten_id",
        "kecamatan_id",
        "kelurahan_id",
        "latitude",
        "longitude",
        "gambar",
        "marker_id",
        "created_at",
        "updated_at",
    ];

    public function pic()
    {
        return $this->belongsTo('App\Models\PicIndustri', 'pic_industri_id', 'id_pic_industri');
    }
    public function SektorUtama()
    {
        return $this->belongsTo('App\Models\SektorUtama', 'sektor_industri_id', 'id_sektor_industri');
    }
    public function SubSektor()
    {
        return $this->belongsTo('App\Models\SubSektor', 'sub_sektor_industri_id', 'id_subsektor_industri');
    }
    public function getEthnicityAttribute()
    {
        return $this->table;
    }
    public function getHeaderAttribute()
    {
        return [
            "nama"  => $this->getAttribute("nama_industri"),
            "jenis" => $this->table
        ];
    }
}
