<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class JenisBank_model extends Eloquent
{
    protected $table = 'jenis_bank';
    public $timestamps = true;
    protected $primaryKey = 'id_jenis_bank';
    protected $fillable = [
        "nama_jenis_bank",
    ];
}
