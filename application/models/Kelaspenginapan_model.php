<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Kelaspenginapan_model extends Eloquent
{
    protected $table = 'kelas_penginapan';
    public $timestamps = true;
    protected $primaryKey = 'id_kelas_penginapan';
    protected $fillable = [
        "nama_nama_penginapan",
    ];
}
