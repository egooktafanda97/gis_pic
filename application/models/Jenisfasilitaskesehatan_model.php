<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Jenisfasilitaskesehatan_model extends Eloquent
{
    protected $table = 'jenis_fasilitas_kesehatan';
    public $timestamps = true;
    protected $primaryKey = 'id_jenis_fasilitas';
    protected $fillable = [
        "nama_jenis_fasilitas",
    ];
}
