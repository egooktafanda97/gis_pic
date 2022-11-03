<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Jenispenginapan_model extends Eloquent
{
    protected $table = 'jenis_penginapan';
    public $timestamps = true;
    protected $primaryKey = 'id_jenis_penginapan';
    protected $fillable = [
        "nama_jenis_penginapan",
    ];
}
