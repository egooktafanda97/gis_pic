<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class JenisPariwisata_model extends Eloquent
{
    protected $table = 'jenis_pariwisata';
    public $timestamps = true;
    protected $primaryKey = 'id_jenis_pariwisata';
    protected $fillable = [
        "nama_jenis_pariwisata",
    ];
}
