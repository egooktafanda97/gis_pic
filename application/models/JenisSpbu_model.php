<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class JenisSpbu_model extends Eloquent
{
    protected $table = 'jenis_spbu';
    public $timestamps = true;
    protected $primaryKey = 'id_jenis_spbu';
    protected $fillable = [
        "nama_jenis_spbu",
    ];
}
