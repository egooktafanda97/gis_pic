<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    protected $table = 'industri';
    public $timestamps = true;
    protected $fillable = [
        "user_id",
        "pic_industri_id",
        "sektor_industri_id",
        "sub_sektor_industri",
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
        "icon",
        "created_at",
        "updated_at"
    ];
}
